<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getOrderList()
	{
        $view = view('front.cart');
        return $view;
	}

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getCouponList()
    {
        $view = view('front.mypage.coupon');
        return $view;
    }

    /**
     * @param Request $request
     */
    public function postCoupon(Request $request)
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getPointList()
    {
        $view = view('front.mypage.point');
        return $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getStoreList()
    {
        $view = view('front.mypage.store');
        return $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getProductList()
    {
        $view = view('front.mypage.product');
        return $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getReviewList()
    {
        $view = view('front.mypage.review');
        return $view;
    }

    /**
     *
     */
    public function postReview()
    {

    }

    /**
     * @param $id
     */
    public function updateReview($id)
    {

    }

    /**
     *
     */
    public function deleteReview()
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getQnaList()
    {
        $view = view('front.mypage.qna');
        return $view;
    }

    /**
     *
     */
    public function postQna()
    {

    }

    /**
     * @param $id
     */
    public function updateQna($id)
    {

    }

    /**
     *
     */
    public function deleteQna()
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getPush()
    {
        $view = view('front.mypage.push');
        return $view;
    }

    /**
     *
     */
    public function postPush()
    {

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getTermList()
    {
        $view = view('front.mypage.term');
        return $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getNoticeList()
    {
        $view = view('front.mypage.notice');
        return $view;
    }

}
