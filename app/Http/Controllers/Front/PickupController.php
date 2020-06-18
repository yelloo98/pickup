<?php

namespace App\Http\Controllers\Front;

use App\Helper\Codes;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Store;
use App\Models\StoreLikes;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    //# 관심매장 등록/삭제
	public function addStore(Request $request)
	{
	    $res = $request->all();
        $customer = Customer::find($res['customer_id']);
        if($customer == null) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

        if(StoreLikes::where([['store_id', $res['store_id']], ['customer_id', $res['customer_id']]])->count() > 0){
            //# 관심매장 취소
            StoreLikes::where([['store_id', $res['store_id']], ['customer_id', $res['customer_id']]])->delete();
            return response()->json(['code' => 400, 'msg' => '관심매장 취소']);
        }else{
            //# 관심매장 등록
            $storeLike = new StoreLikes();
            $storeLike->store_id =  $res['store_id'];
            $storeLike->customer_id =  $res['customer_id'];
            $storeLike->save();
            $store = Store::find($res['store_id']);
            return response()->json(['code' => 200, 'msg' => '관심매장 등록', 'store_id' => $store->id, 'store_name' => $store->fcTrader->companyName, 'store_address' => $store->fcTrader->address, 'store_tel' => Codes::formatPhone($store->fcTrader->tel)]);
        }
    }
}
