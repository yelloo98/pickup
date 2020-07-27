<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use App\Models\PickupOrdersProduct;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * 장바구니
     */
	public function getIndex(Request $request)
	{
        $view = view('front.cart.cart');
        $view->page = 'cart';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $productStore = PickupCart::leftjoin('product','product.id','pickup_cart.product_id')
            ->select('pickup_cart.product_id','product.store_id')->where('pickup_cart.customer_id',$shopAuth->user()->id)->groupBy('store_id')->get();
        foreach ($productStore as $item){
            $item->cartList = PickupCart::leftjoin('product','product.id','pickup_cart.product_id')
                ->select('pickup_cart.*', 'product.price', DB::raw('pickup_cart.count * product.price as price_sum'))
                ->where([['pickup_cart.customer_id',$shopAuth->user()->id],['store_id', $item->store_id]])->orderBy('pickup_cart.created_at', 'desc')->get();
            foreach ($item->cartList as $v){
                $productStock = ProductStock::where([['product_id', $v->product_id],['device_id', $v->device_id],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
                    ->select('device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as product_res'))->first();
                $orderCnt = PickupOrdersProduct::where([['product_id', $v->product_id],['device_id', $v->device_id],['status','pay']])->sum('count');
                $v->product_res = (!empty($productStock) && $productStock->product_res > $orderCnt)? $productStock->product_res - $orderCnt : 0;
            }
        }
        $view->productStore = $productStore;
        return $view;
	}

	/**
    * 장바구니 선택
    */
    public function getCartSel(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                $productList = ProductStock::where([['product_id', $res['product_id']],['device_id', $res['device_id']],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
                    ->select('product_id','device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as product_res'))->first();
                $orderCnt = PickupOrdersProduct::where([['product_id', $res['product_id']],['device_id', $res['device_id']],['status','pay']])->sum('count');
                if(!empty($productList) && $productList->product_res > $orderCnt){
                    $productCnt = $productList->product_res - $orderCnt;
                    return response()->json(['code' => 200, 'msg' => '장바구니 정보', 'cnt' => $productCnt ?? 0, 'name' => $productList->product->origin_product->name ?? '', 'price' => number_format($productList->product->price) ?? '']);
                }else{
                    return response()->json(['code' => 400, 'msg' => '해당 상품의 재고가 없습니다']);
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

    /**
     * 장바구니 등록/삭제
     */
    public function getCartAdd(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                if($res['status'] == 'delete_all') {
                    //# 장바구니 전체 삭제
                    PickupCart::where('customer_id', $shopAuth->user()->id)->delete();
                    return response()->json(['code' => 301, 'msg' => '장바구니 전체 삭제']);
                }elseif($res['status'] == 'delete') {
                    //# 장바구니 삭제
                    PickupCart::where([['product_id', $res['product_id']], ['device_id', $res['device_id']], ['customer_id', $shopAuth->user()->id]])->delete();
                    return response()->json(['code' => 300, 'msg' => '장바구니 삭제', 'product_id'=>$res['product_id']]);
                }else{
                    //# 장바구니 추가
                    $cart = PickupCart::where([['product_id', $res['product_id']], ['device_id', $res['device_id']], ['customer_id', $shopAuth->user()->id]])->first();
                    if(!empty($cart)){
                        $cart->count = $cart->count + $res['cnt'];
                    }else{
                        $cart = new PickupCart();
                        $cart->product_id = $res['product_id'];
                        $cart->device_id = $res['device_id'];
                        $cart->customer_id = $shopAuth->user()->id;
                        $cart->count = $res['cnt'];
                    }
                    $cart->save();
                    return response()->json(['code' => 200, 'msg' => '장바구니 추가']);
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

    /**
     * 구매하기 버튼 클릭
     */
    public function postCartPay(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $res = $request->all();

                $shopAuth = new ShopAuth($request);
                $url_parameter = '/front/order?';
                $product = json_decode($res['product']);
                if(empty($product)) return response()->json(['code' => 300, 'msg' =>'상품을 선택해주세요.']);
                foreach ($product as $k=>$v){
                    $productList = ProductStock::where([['product_id', $v[0]],['device_id', $v[1]],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
                        ->select('product_id','device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as product_res'))->first();
                    $orderCnt = PickupOrdersProduct::where([['product_id', $v[0]],['device_id', $v[1]],['status','pay']])->sum('count');
                    $productCnt = (!empty($productList) && $productList->product_res > $orderCnt)? $productList->product_res - $orderCnt : 0;
                    $productName = $productList->product->origin_product->name;
                    if($productCnt >= $v[2]){
                        //# 재고가 있을 경우
                        $url_parameter = $url_parameter . '&product['.$k.']='.$v[0].','.$v[1].','.$v[2];
                        if($res['type'] == 'cart'){
                            $cart = PickupCart::where([['customer_id',$shopAuth->user()->id],['product_id',$v[0]],['device_id',$v[1]]])->first();
                            $cart->count = $v[2];
                            $cart->save();
                        }
                    }elseif($productCnt < $v[2] && $productCnt > 0){
                        //# 재고가 부족할 경우
                        return response()->json(['code' => 300, 'msg' => $productName . ' 상품의 재고는 ' . $productCnt . '개까지만 선택 가능합니다.']);
                    }else{
                        //# 재고가 품절일 경우
                        return response()->json(['code' => 300, 'msg' => $productName . ' 상품은 품절되었습니다.']);
                    }
                }

                return response()->json(['code' => 200, 'msg' => '구매 화면으로 이동합니다.', 'url' => $url_parameter]);
            }catch(\Exception $ex){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'구매 처리 중 실패하였습니다.']);
            }catch(\Throwable $throwable){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'구매 처리 중 실패하였습니다.']);
            }
        });
    }
}
