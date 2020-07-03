<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //# 장바구니
	public function getIndex(Request $request)
	{
        $view = view('front.cart.cart');
        $view->page = 'cart';

        $shopAuth = new ShopAuth($request);
        $view->customer = Customer::find($shopAuth->user()->id);
        $cartList = PickupCart::leftjoin('product','product.id','pickup_cart.product_id')->leftjoin('product_stock','product_stock.product_id', 'pickup_cart.product_id')
            ->select('pickup_cart.*', 'product.price', DB::raw('pickup_cart.count * product.price as price_sum'), DB::raw('sum(product_stock.inserted_amount)-sum(product_stock.sale_amount) AS product_res'))
            ->where('pickup_cart.customer_id',$shopAuth->user()->id)
            ->where([['product_stock.slot_status','DP-COMPLETE'],['product_stock.use_status','use'],['product_stock.inserted_amount','>','product_stock.sale_amount']])
            ->groupBy('pickup_cart.product_id')->orderBy('pickup_cart.created_at', 'desc')->get();
        $view->cartList = $cartList;
        $view->cartListSum = number_format($cartList->sum('price_sum') ?? 0);
        return $view;
	}

	//# 구매하기 버튼 클릭
    public function postCart(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $res = $request->all();

                $shopAuth = new ShopAuth($request);
                $url_parameter = '/front/order?';
                $product = json_decode($res['product']);
                foreach ($product as $k=>$v){
                    $productList = ProductStock::where('product_id', $v[0])->where('slot_status','DP-COMPLETE')->where('use_status','use')->whereColumn('inserted_amount', '>', 'sale_amount');
                    $productCnt = $productList->sum('inserted_amount') - $productList->sum('sale_amount');
                    $productName = $productList->first()->product->origin_product->name;
                    if($productCnt >= $v[1]){
                        //# 재고가 있을 경우
                        $url_parameter = $url_parameter . '&product['.$k.']='.$v[0].','.$v[1];
                        if($res['type'] == 'cart'){
                            $cart = PickupCart::where([['customer_id',$shopAuth->user()->id],['product_id',$v[0]]])->first();
                            $cart->count = $v[1];
                            $cart->save();
                        }
                    }elseif($productCnt < 0){
                        //# 재고가 부족할 경우
                        DB::rollBack();
                        return response()->json(['code' => 300, 'msg' => $productName . ' 상품의 재고는 ' . $productList->count() . '개까지만 선택 가능합니다.']);
                    }else{
                        //# 재고가 품절일 경우
                        DB::rollBack();
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
