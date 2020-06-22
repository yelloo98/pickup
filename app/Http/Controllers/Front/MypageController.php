<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupQna;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getOrderList()
	{
        $view = view('front.mypage.order');
        $view->page = 'order';
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
    public function getQna()
    {
        $view = view('front.mypage.qna');
        $view->page = 'mypage';
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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getStoreQna($id = 0)
    {
        $view = view('front.mypage.storeQna');
        $view->store = Store::find($id);
        $view->page = 'storeQna';
        //# 임시 유저 아이디
        $view->customer_id = 399;
        return $view;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postStoreQna(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $res = $request->all();
                $customer = Customer::find($res['customer_id']);
                if($customer == null){
                    DB::rollback();
                    return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);
                }

                $qna = new PickupQna();
                $qna->customer_id = $res['customer_id'];
                $qna->store_id = $res['store_id'];
                $qna->category = $res['category'];
                $qna->contents = $res['contents'];
                $qna->type = 'store';
                $qna->save();

                return response()->json(['code'=>200, 'msg'=>'문의 등록 성공', 'store_id'=>$res['store_id']]);
            }catch(\Exception $ex){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'등록에 실패하였습니다.']);
            }catch(\Throwable $throwable){
                DB::rollBack();
                return response()->json(['code'=>400, 'msg'=>'등록에 실패하였습니다.']);
            }
        });
    }

    /**
     * @param $id
     */
    public function updateStoreQna($id)
    {

    }

    /**
     *
     */
    public function deleteStoreQna()
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
        $view->page = 'mypage';
        return $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function getNoticeList()
    {
        $view = view('front.mypage.notice');
        $view->page = 'mypage';
        return $view;
    }

}
