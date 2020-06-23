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
     *  주문내역 리스트
     */
    public function getOrderList()
	{
        $view = view('front.mypage.order');
        $view->page = 'my_order';
        return $view;
	}

    /**
     *  쿠폰 리스트
     */
    public function getCouponList()
    {
        $view = view('front.mypage.coupon');
        $view->page = 'my_coupon';
        return $view;
    }

    /**
     * @param Request $request
     */
    public function postCoupon(Request $request)
    {

    }

    /**
     * 적립금
     */
    public function getPointList()
    {
        $view = view('front.mypage.point');
        $view->page = 'my_point';
        return $view;
    }

    /**
     * 관심매장 리스트
     */
    public function getStoreList()
    {
        $view = view('front.mypage.store');
        $view->page = 'my_store';
        return $view;
    }

    /**
     * 관심상품 리스트
     */
    public function getProductList()
    {
        $view = view('front.mypage.product');
        $view->page = 'my_product';
        return $view;
    }

    /**
     *  상품후기 리스트
     */
    public function getReviewList()
    {
        $view = view('front.mypage.review');
        $view->page = 'my_review';
        return $view;
    }

    /**
     *
     */
    public function postReview()
    {

    }

    /**
     *  상품후기 수정
     */
    public function updateReview($id)
    {
        $view = view('front.mypage.reviewUpdate');
        $view->page = 'my_review';
        return $view;
    }

    /**
     *
     */
    public function deleteReview()
    {

    }

    /**
     * Q&A 리스트
     */
    public function getQna()
    {
        $view = view('front.mypage.qna');
        $view->page = 'my_qna';
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
     * 매장 Q&A 등록 화면
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
     * 매장 Q&A 등록
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
     * 이용약관
     */
    public function getTermList()
    {
        $view = view('front.mypage.term');
        $view->page = 'term';
        return $view;
    }

    /**
     * 공지사항
     */
    public function getNoticeList()
    {
        $view = view('front.mypage.notice');
        $view->page = 'notice';
        return $view;
    }

    /**
     * 공지사항 상세
     */
    public function getNoticeDetail()
    {
        $view = view('front.mypage.noticeDetail');
        $view->page = 'notice';
        return $view;
    }

}
