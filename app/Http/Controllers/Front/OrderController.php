<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCoupon;
use App\Models\PickupCouponCustomer;
use App\Models\PickupOrders;
use App\Models\PickupOrdersProduct;
use App\Models\PointUser;
use App\Models\Product;
use App\Models\ProductStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //# 주문/결제
	public function getOrderIndex(Request $request)
	{
        $view = view('front.order.order');
        $view->page = 'order';

        $shopAuth = new ShopAuth($request);
        $view->customer = Customer::find($shopAuth->user()->id);

        $product = $request->input('product', null);
        $view->productAll = json_encode($request['product']);

        $productSum = 0;
        if(!empty($product)){
            foreach ($product as $k=>$v){
                $item = explode(',',$v);
                $product[$k] = Product::find($item[0] ?? 0);
                $product[$k]->count = $item[1] ?? 0;
                $price_sum = ($product[$k]->price ?? 0) * ($item[1] ?? 0);
                $product[$k]->price_sum = number_format($price_sum);
                $productSum = $productSum + $price_sum;

                $view->product[$k] = $product[$k];
            }
            $view->couponList = PickupCouponCustomer::leftjoin('pickup_coupon', 'pickup_coupon.id', 'pickup_coupon_customer.pickup_coupon_id')
                ->select('pickup_coupon.*', 'pickup_coupon_customer.*')->where('customer_id',$shopAuth->user()->id)
                ->where([['status', 'N'],['price_min', '<=',$productSum],['price', '<=',$productSum],['end_at','>',now()]])->get();
            $view->productSum = number_format($productSum);
        }

        return $view;
	}

    //# 주문/결제
    public function postOrder(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);

                $res = $request->all();
                if($res['product_all'] == null) return response()->json(['code'=>400, 'msg'=>'상품을 선택해주세요.']);
                if($res['user_name'] == null || $res['user_phone_1'] == null || $res['user_phone_2'] == null || $res['user_phone_3'] == null) return response()->json(['code'=>400, 'msg'=>'주문자 정보를 확인해주세요.']);
                if($res['agree'] == 'undefined') return response()->json(['code'=>400, 'msg'=>'필수항목을 체크해주세요.']);

                //# 주문 등록
                $order = new PickupOrders();
                $order->customer_id = $shopAuth->user()->id;
                $order->order_name = $res['user_name'];
                $order->order_phone = $res['user_phone_1'].$res['user_phone_2'].$res['user_phone_3'];
                if(!empty($res['user_email_1']) && !empty($res['user_email_2'])) $order->order_email = $res['user_email_1'].'@'.$res['user_email_2'];
                $order->pickup_until_at = Carbon::now()->addDay();
                $order->status = 'pay';
                $pickup_num = sprintf('%05d', mt_rand(00000, 99999));
                if(PickupOrders::where('pickup_num',$pickup_num)->count() > 0) $pickup_num = sprintf('%05d', mt_rand(00000, 99999));
                $order->pickup_num = $pickup_num;
                $order->save();
                $order->order_id = Carbon::now()->format('ymdHi').substr(sprintf('%05d', $order->id),-5);

                //# 상품 등록
                $productSum = 0;
                $product = json_decode($res['product_all']);
                if(!empty($product)){
                    foreach ($product as $k=>$v){
                        //# $item[0] : 상품 ID  /  $item[1] : 상품 개수
                        $item = explode(',',$v);
                        $product[$k] = Product::find($item[0]);
                        if(!empty($product[$k])){
                            $productSum = $productSum + ($product[$k]->price * $item[1]);
                            $productStockList = ProductStock::select('product_stock.*',DB::raw('(inserted_amount - sale_amount) as stock'))->
                            where('product_id', $product[$k]->id)->where('slot_status','DP-COMPLETE')->where('use_status','use')->whereColumn('inserted_amount', '>', 'sale_amount')->orderBy('stock','desc')->get();
                            foreach ($productStockList as $kk => $vv){
                                if($item[1] == 0) break;
                                $stockCnt = ($item[1] >= $vv->stock)? $vv->stock : $item[1];
                                $item[1] = $item[1] - $stockCnt;
                                $orderProduct = new PickupOrdersProduct();
                                $orderProduct->pickup_orders_id = $order->id;
                                $orderProduct->product_id = $product[$k]->id;
                                $orderProduct->device_id = $vv->device_id;
                                $orderProduct->panel = $vv->panel;
                                $orderProduct->product_stock_id = $vv->product_stock_id;
                                $orderProduct->count = $stockCnt;
                                $orderProduct->price = $product[$k]->price * $stockCnt;
                                $orderProduct->save();
                            }
                        }
                    }
                }

                //# 쿠폰 처리
                $couponPrice = 0;
                if(!empty($res['coupon'])){
                    $couponPrice = PickupCoupon::find($res['coupon'])->price;
                    $coupon = PickupCouponCustomer::where([['pickup_coupon_id',$res['coupon']],['customer_id', $shopAuth->user()->id]])->first();
                    $coupon->status = 'Y';
                    $coupon->save();
                    $order->pickup_coupon_id = $res['coupon'];
                }

                //# 포인트 처리
                $pointPrice = 0;
                if(!empty($res['user_point'])){
                    $pointPrice = $res['user_point'];
                    $pointUser = new PointUser();
                    $pointUser->orders_id = $order->id;
                    $pointUser->customer_id = $shopAuth->user()->id;
                    $pointUser->order_type = 'pickup';
                    $pointUser->type = 'use';
                    $pointUser->point = $res['user_point'];
                    $pointUser->save();
                    $shopAuth->user()->point = $shopAuth->user()->point - $res['user_point'];
                    $shopAuth->user()->save();
                    $order->use_point = $res['user_point'];
                }

                //# 금액 처리
                $productSum = $productSum - $couponPrice - $pointPrice;
                if($productSum == str_replace(',','',$res['price'])){
                    $order->price = $productSum;
                    $order->save();
                    return response()->json(['code'=>200, 'msg'=>'주문 등록', 'order_id'=>$order->id]);
                }else{
                    DB::rollBack();
                    return response()->json(['code'=>400, 'msg'=>'금액 처리 중 오류가 발생하였습니다.']);
                }
            }catch(\Exception $ex){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심상품 처리 중 실패하였습니다.']);
            }catch(\Throwable $throwable){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심상품 처리 중 실패하였습니다.']);
            }
        });
    }

    //# 주문/결제 완료
    public function getOrderResult($id)
    {
        $view = view('front.order.result');
        $view->page = 'order';
        $view->orderResult = PickupOrders::find($id);
        $view->orderProductList = PickupOrdersProduct::where('pickup_orders_id', $id)->get();
        return $view;
    }

    //# 픽업 리스트
    public function getOrderPickupList(Request $request)
    {
        $view = view('front.order.pickup');
        $view->page = 'pickup';

        $shopAuth = new ShopAuth($request);
        $orderList = PickupOrders::where([['customer_id', $shopAuth->user()->id],['pickup_until_at','>',now()]])->orderBy('created_at','desc')->get();
        foreach ($orderList as $k=>$v){
            $v->productList = PickupOrdersProduct::where('pickup_orders_id',$v->id)->get();
            $v->until_second = (Carbon::createFromDate($v->pickup_until_at) > Carbon::now())? Carbon::createFromDate($v->pickup_until_at)->diffInSeconds(Carbon::now()) : 0;
        }
        $view->orderList = $orderList;
        return $view;
    }


}
