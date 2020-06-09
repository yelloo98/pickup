<?php

/*
|--------------------------------------------------------------------------
| 픽업상품 라우트
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/front/get/token', 'Front\AuthController@postLogin');

Route::group(['namespace' => 'Front', 'middleware' => 'front', 'prefix' => 'front', 'as' => 'front.'], function () {

    /**
     * Main
     * -----------------------------------------------------------------------------------------------------------------
     */
    //메인화면
    Route::get('/main', 'MainController@getIndex')->name('index');
    /**
     * Product
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        //픽업상품의 설명 제공
        //Route::get('/{id?}', 'MainController@getProduct');
        Route::get('/latest', 'MainController@getLatestProduct');
    });

    /**
     * Cart
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', 'CartController@getIndex')->name('index');
    });

    /**
     * Mypage
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'mypage', 'as' => 'mypage.'], function () {
        //# 주문내역
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            //픽업상품의 주문내역 노출
            Route::get('/', 'MypageController@getOrderList');
        });
        //# 쿠폰함
        Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
            //쿠폰 입력 및 등록
            Route::get('/', 'MypageController@getCouponList');
            Route::post('/', 'MypageController@postCoupon');
        });
        //# 적립금
        Route::group(['prefix' => 'point', 'as' => 'point.'], function () {
            //보유적립금, 총 사용 적립금, 소멸 예정 적립금 노출
            Route::get('/', 'MypageController@getPointList');
        });
        //# 관심매장
        Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
            //관심매장으로 등록한 매장 노출
            Route::get('/', 'MypageController@getStoreList');
        });
        //# 관심상품
        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            //관심상품으로 등록한 픽업상품 노출
            Route::get('/', 'MypageController@getProductList');
        });
        //# 상품후기
        Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
            //상품의 리뷰 리스트
            Route::get('/', 'MypageController@getReviewList');
            //상품의 리뷰 등록
            Route::post('/', 'MypageController@postReview');
            //상품의 리뷰 수정
            Route::put('/{id?}', 'MypageController@updateReview');
            //상품의 리뷰 삭제
            Route::delete('/', 'MypageController@deleteReview');
        });
        //# 상품 또는 매장의 Q&A
        Route::group(['prefix' => 'qna', 'as' => 'qna.'], function () {
            //상품 또는 매장의 Q&A 리스트
            Route::get('/', 'MypageController@getQna');
            //상품 또는 매장의 Q&A 등록
            Route::post('/', 'MypageController@postQna');
            //상품 또는 매장의 Q&A 수정
            Route::put('/', 'MypageController@updateQna');
            //상품 또는 매장의 Q&A 삭제
            Route::delete('/', 'MypageController@deleteQna');
        });
        //# 알림 수신 동의
        Route::group(['prefix' => 'push', 'as' => 'push.'], function () {
            //알림 ON/OFF
            Route::get('/', 'MypageController@getPush');
            //알림 ON/OFF 수정
            Route::post('/', 'MypageController@postPush');
        });
        //# 이용약관
        Route::group(['prefix' => 'term', 'as' => 'term.'], function () {
            //픽업상품의 이용약관 페이지
            Route::get('/', 'MypageController@getTermList');
        });
        //# 공지사항
        Route::group(['prefix' => 'notice', 'as' => 'notice.'], function () {
            //관리자가 등록한  픽업상품 공지사항 페이지
            Route::get('/', 'MypageController@getNoticeList');
        });
    });

    /**
     * Search
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        //검색어 입력 시 위치기반으로 검색정보 노출
        Route::get('/', 'SearchController@getIndex');
    });
});

