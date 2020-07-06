<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCouponCustomer;
use App\Models\PickupOrders;
use App\Models\Product;
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
                dd($res);
                if($res['product_id'] == 'undefined') return response()->json(['code'=>400, 'msg'=>'필수값을 확인해주세요.']);
                if($res['user_name'] == null || $res['user_phone_1'] == null || $res['user_phone_2'] == null || $res['user_phone_3'] == null) return response()->json(['code'=>400, 'msg'=>'주문자 정보를 확인해주세요.']);
                if($res['pay_method'] == 'undefined') return response()->json(['code'=>400, 'msg'=>'결제수단을 선택해주세요.']);
                if($res['agree'] == 'undefined') return response()->json(['code'=>400, 'msg'=>'필수값을 확인해주세요.']);

                $order = new PickupOrders();
                $order->customer_id = $shopAuth->user()->id;
                $order->order_name = $res['user_name'];
                $order->order_phone = $res['user_phone_1'].$res['user_phone_2'].$res['user_phone_3'];
                $order->order_email = $res['user_email_1'].'@'.$res['user_email_2'];
                $order->price = $res['user_email_1'];
            }catch(\Exception $ex){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심상품 처리 중 실패하였습니다.']);
            }catch(\Throwable $throwable){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심상품 처리 중 실패하였습니다.']);
            }
        });
    }
}
