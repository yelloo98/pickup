<?php

namespace App\Http\Controllers\Front;

use App\Helper\Codes;
use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\FcTrader;
use App\Models\PickupCart;
use App\Models\PickupProductLikes;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\StoreLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PickupController extends Controller
{
    /**
     * 관심매장 등록/삭제
     */
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
                    $store = FcTrader::find($res['store_id']);
                    return response()->json(['code' => 200, 'msg' => '관심매장 등록', 'store_id' => $store->traderNo, 'store_name' => $store->companyName, 'store_address' => $store->address, 'store_tel' => Codes::formatPhone($store->tel)]);
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

    /**
     * 관심상품 등록/삭제
     */
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

    /**
     * 장바구니 선택
     */
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

    /**
     * 장바구니 등록/삭제
     */
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

    /**
     * 주문/결제 API
     */
    public function getOrderApi($id)
    {
        //# 키오스크 API 호출
        $url = 'http://192.168.0.42:8080/api/pickup/sendOrder';
        $json_data = '{"pickupOrdersId" : "'.$id.'"}';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: '.strlen($json_data)));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_POST, 1);
        $output = json_decode(curl_exec($ch));
        if($output->code == 200){
            return response()->json(['code'=>200, 'msg'=>'주문 등록']);
        }else{
            return response()->json(['code'=>400, 'msg'=>'주문 실패']);
        }
    }

    /**
     * 앱 테스트 API
     */
    public function appTest(Request $request)
    {
        return response()->json(['code' => 200, 'msg' => 'API 성공']);
    }
}
