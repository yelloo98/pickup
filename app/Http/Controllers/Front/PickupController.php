<?php

namespace App\Http\Controllers\Front;

use App\Helper\Codes;
use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use App\Models\PickupProductLikes;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Store;
use App\Models\StoreLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickupController extends Controller
{
    //# 관심매장 등록/삭제
	public function addStore(Request $request)
	{
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                if($res['status'] == 'delete'){
                    //# 관심매장 취소
                    StoreLikes::where([['store_id', $res['store_id']], ['customer_id', $shopAuth->user()->id]])->delete();
                    return response()->json(['code' => 300, 'msg' => '관심매장 취소', 'store_id' => $res['store_id']]);
                }else{
                    //# 관심매장 등록
                    $storeLike = new StoreLikes();
                    $storeLike->store_id =  $res['store_id'];
                    $storeLike->customer_id =  $shopAuth->user()->id;
                    $storeLike->save();
                    $store = Store::find($res['store_id']);
                    return response()->json(['code' => 200, 'msg' => '관심매장 등록', 'store_id' => $store->id, 'store_name' => $store->fcTrader->companyName, 'store_address' => $store->fcTrader->address, 'store_tel' => Codes::formatPhone($store->fcTrader->tel)]);
                }
            }catch(\Exception $ex){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심매장 처리 중 실패하였습니다.']);
            }catch(\Throwable $throwable){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'관심매장 처리 중 실패하였습니다.']);
            }
        });
    }
    //# 관심상품 등록/삭제
    public function addProduct(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                if($res['status'] == 'delete_all'){
                    //# 관심상품 전체 취소
                    PickupProductLikes::where('customer_id', $shopAuth->user()->id)->delete();
                    return response()->json(['code' => 301, 'msg' => '관심상품 전체 취소']);
                }elseif($res['status'] == 'delete' || $res['status'] == 'delete_2'){
                    //# 관심상품 취소
                    PickupProductLikes::where([['product_id', $res['product_id']], ['customer_id', $shopAuth->user()->id]])->delete();
                    if($res['status'] == 'delete') return response()->json(['code' => 300, 'msg' => '관심상품 취소', 'product_id' => $res['product_id']]);
                    if($res['status'] == 'delete_2') return response()->json(['code' => 302, 'msg' => '관심상품 취소', 'product_id' => $res['product_id']]);
                }else{
                    //# 관심상품 등록
                    $productLike = new PickupProductLikes();
                    $productLike->product_id =  $res['product_id'];
                    $productLike->customer_id =  $shopAuth->user()->id;
                    $productLike->save();
                    $product = Product::find($res['product_id']);
                    return response()->json(['code' => 200, 'msg' => '관심상품 등록', 'product_id' => $product->id]);
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

    //# 장바구니 선택
    public function selProduct(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                $productList = ProductStock::where('product_id', $res['product_id'])->where('slot_status','DP-COMPLETE')->where('use_status','use')->whereColumn('inserted_amount', '>', 'sale_amount');
                if($productList->count() > 0){
                    $productCnt = $productList->sum('inserted_amount') - $productList->sum('sale_amount');
                    $product = $productList->first()->product;
                    return response()->json(['code' => 200, 'msg' => '장바구니 정보', 'cnt' => $productCnt ?? 0, 'name' => $product->origin_product->name ?? '', 'price' => number_format($product->price) ?? '']);
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

    //# 장바구니 등록/삭제
    public function addCart(Request $request)
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
                    PickupCart::where([['product_id', $res['product_id']], ['customer_id', $shopAuth->user()->id]])->delete();
                    return response()->json(['code' => 300, 'msg' => '장바구니 삭제', 'product_id'=>$res['product_id']]);
                }else{
                    //# 장바구니 추가
                    $cart = PickupCart::where([['product_id', $res['product_id']], ['customer_id', $shopAuth->user()->id]])->first();
                    if(!empty($cart)){
                        $cart->count = $cart->count + $res['cnt'];
                    }else{
                        $cart = new PickupCart();
                        $cart->product_id = $res['product_id'];
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


    //# 장바구니 등록/삭제
    public function appTest(Request $request)
    {
        return response()->json(['code' => 200, 'msg' => 'API 성공']);
    }
}
