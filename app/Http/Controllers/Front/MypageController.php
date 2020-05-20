<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{

	public function getOrderList()
	{
        $view = view('front.cart');
        return $view;
	}

	public function getCouponList()
    {
        $view = view('front.mypage.coupon');
        return $view;
    }

    public function postCoupon(Request $request)
    {

    }

    public function getPointList()
    {
        $view = view('front.mypage.point');
        return $view;
    }

    public function getStoreList()
    {
        $view = view('front.mypage.point');
        return $view;
    }

    public function postStore($product_id)
    {

    }

}
