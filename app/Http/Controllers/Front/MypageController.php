<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCoupon;
use App\Models\PickupCouponCustomer;
use App\Models\PickupOrders;
use App\Models\PickupOrdersProduct;
use App\Models\PickupProductLikes;
use App\Models\PickupProductReview;
use App\Models\PickupQna;
use App\Models\PointUser;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreLikes;
use Carbon\Carbon;
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
    public function getCouponList(Request $request)
    {
        $view = view('front.mypage.coupon');
        $view->page = 'my_coupon';
        $shopAuth = new ShopAuth($request);
        $couponList = PickupCouponCustomer::where('customer_id', $shopAuth->user()->id)->where('status', 'N')->leftjoin('pickup_coupon','pickup_coupon.id','pickup_coupon_customer.pickup_coupon_id')->select('pickup_coupon_customer.*','pickup_coupon.end_at')->where('end_at','>',now())->get();
        foreach ($couponList as $k => $v){
            $v->coupon->start_at = Carbon::createFromDate($v->coupon->start_at)->toDateString();
            $v->coupon->end_at = Carbon::createFromDate($v->coupon->end_at)->toDateString();
            $v->coupon->day_rem = Carbon::createFromDate($v->coupon->end_at)->diffInDays(now())+1;
        }
        $view->couponList = $couponList;
        return $view;
    }

    /**
     *  쿠폰 발급
     */
    public function postCoupon(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                $coupon = PickupCoupon::where('coupon_num',$res['coupon_num'])->first();
                if(empty($coupon)) return response()->json(['code'=>400, 'msg'=>'쿠폰번호가 잘못되었습니다.']);
                if($coupon->amount <= 0) return response()->json(['code'=>400, 'msg'=>'쿠폰 수량이 없습니다.']);
                if($coupon->end_at < now()) return response()->json(['code'=>400, 'msg'=>'기간이 만료된 쿠폰입니다.']);
                if(!empty(PickupCouponCustomer::where([['pickup_coupon_id',$coupon->id],['customer_id',$shopAuth->user()->id]])->first())) return response()->json(['code'=>400, 'msg'=>'이미 등록된 쿠폰입니다.']);
                $coupon->amount = $coupon->amount - 1;
                $coupon->save();

                $couponCustomer = new PickupCouponCustomer();
                $couponCustomer->pickup_coupon_id = $coupon->id;
                $couponCustomer->customer_id = $shopAuth->user()->id;
                $couponCustomer->save();

                $date = Carbon::createFromDate($coupon->start_at)->toDateString().'~'.Carbon::createFromDate($coupon->end_at)->toDateString();
                return response()->json(['code'=>200, 'msg'=>'쿠폰 등록 성공', 'name'=>$coupon->name, 'price'=>number_format($coupon->price), 'price_min'=>number_format($coupon->price_min), 'date'=>$date]);
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
     * 적립금
     */
    public function getPointList(Request $request)
    {
        $view = view('front.mypage.point');
        $view->page = 'my_point';

        $shopAuth = new ShopAuth($request);
        $view->customer = Customer::find($shopAuth->user()->id);

        //# 총 사용 포인트
        $view->use_point = PointUser::where('customer_id',$shopAuth->user()->id)->where('type', 'use')->sum('point');
        //# 소멸 포인트 / 정책상 : 2년 (소멸 예정은 1개월 전 노출)
        $view->dis_point = PointUser::where('customer_id',$shopAuth->user()->id)->whereBetween('created_at', [now()->subYears(2), now()->subMonths(23)])->sum('point');
        //# 포인트 내역 / 소멸되기 전 모든 포인트 내역
        $view->pointList = PointUser::where('customer_id',$shopAuth->user()->id)->where('created_at','>', now()->subYears(2))->orderBy('created_at','DESC')->get();

        return $view;
    }

    /**
     * 관심매장 리스트
     */
    public function getStoreList(Request $request)
    {
        $view = view('front.mypage.store');
        $view->page = 'my_store';

        $shopAuth = new ShopAuth($request);
        $view->store_like = StoreLikes::where('customer_id', $shopAuth->user()->id)->get();
        return $view;
    }

    /**
     * 관심상품 리스트
     */
    public function getProductList(Request $request)
    {
        $view = view('front.mypage.product');
        $view->page = 'my_product';

        $shopAuth = new ShopAuth($request);
        $view->product_like = PickupProductLikes::where('customer_id', $shopAuth->user()->id)->get();
        return $view;
    }

    /**
     *  상품후기 리스트
     */
    public function getReviewList(Request $request)
    {
        $view = view('front.mypage.review');
        $view->page = 'my_review';

        $shopAuth = new ShopAuth($request);
        //# 후기 미작성 리스트
        $view->unreviewList = PickupOrdersProduct::leftjoin('pickup_orders', '.pickup_orders.id', 'pickup_orders_product.pickup_orders_id')
            ->leftjoin('product', 'product.id', 'pickup_orders_product.product_id')
            ->leftjoin('pickup_product_review', 'pickup_product_review.product_id', 'product.id')
            ->select('pickup_orders_product.*', 'pickup_product_review.id as pickup_product_review_id')
            ->orderBy('pickup_orders_product.id', 'desc')
            ->where('pickup_orders.customer_id', $shopAuth->user()->id)->whereNull('pickup_product_review.id')->get();
        //# 내가 쓴 후기
        $view->review_list = PickupProductReview::where('customer_id', $shopAuth->user()->id)->get();

        return $view;
    }

    /**
     *  상품후기 뷰
     */
    public function getReviewDetail(Request $request, $id = 0)
    {
        $view = view('front.mypage.reviewDetail');
        $view->page = 'my_review';
        $shopAuth = new ShopAuth($request);

        $view->review = PickupProductReview::find($id);
        if(!empty($view->review)){
            $view->product = Product::find($view->review->product_id);
        }else{
            $view->product = Product::find($request->input('product_id', null));
        }

        return $view;
    }

    /**
     * 상품의 리뷰 등록 / 수정
     */
    public function postReview(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                if($res['status'] == 'delete'){
                    //# 삭제
                    $review = PickupProductReview::find($res['review_id']);
                    $review->delete();

                    return response()->json(['code'=>300, 'msg'=>'후기 삭제 성공', 'review_id'=>$res['review_id']]);
                }
                else {
                    if(empty(Product::find($res['product_id']))) return response()->json(['code'=>400, 'msg'=>'상품이 없습니다']);
                    if($res['score'] == 'undefined' || $res['contents'] == null) return response()->json(['code'=>400, 'msg'=>'내용을 입력해주세요']);
                    //# 등록 / 수정
                    if($res['status'] == 'update'){
                        $review = PickupProductReview::find($res['review_id']);
                        $review->score = $res['score'];
                        $review->contents = $res['contents'];
                        $review->save();
                    }else{
                        $review = new PickupProductReview();
                        $review->product_id = $res['product_id'];
                        $review->customer_id = $shopAuth->user()->id;
                        $review->score = $res['score'];
                        $review->contents = $res['contents'];
                        $review->save();
                    }

                    return response()->json(['code'=>200, 'msg'=>'후기 등록 성공']);
                }
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
        return $view;
    }

    /**
     * 매장 Q&A 등록
     */
    public function postStoreQna(Request $request)
    {
        return DB::transaction(function() use ($request){
            try{
                $shopAuth = new ShopAuth($request);
                if(empty(Customer::find($shopAuth->user()->id))) return response()->json(['code'=>600, 'msg'=>'로그인해주세요']);

                $res = $request->all();
                $qna = new PickupQna();
                $qna->customer_id = $shopAuth->user()->id;
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
