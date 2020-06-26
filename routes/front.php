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
     * API
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::get('/app/test', 'PickupController@appTest');                       //# 앱 테스트 (toast)
    Route::get('/add/store', 'PickupController@addStore');                     //# 관심매장 등록/삭제
    Route::get('/add/product', 'PickupController@addProduct');                 //# 관심상품 등록/삭제
    Route::get('/sel/cart', 'PickupController@selCart');                       //# 장바구니 선택
    Route::get('/add/cart', 'PickupController@addCart');                       //# 카트 등록/삭제

    /**
     * Main
     * -----------------------------------------------------------------------------------------------------------------
     */
    //메인화면
    Route::get('/main/{id?}', 'MainController@getIndex')->name('index');
    /**
     * Product
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        //픽업상품의 설명 제공
        Route::get('/latest', 'ProductController@getLatestProduct');
        Route::get('/detail/{id?}', 'ProductController@getProduct');
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
            //상품의 리뷰 뷰
            Route::get('/{id?}', 'MypageController@getReviewDetail');
            //상품의 리뷰 등록 / 수정
            Route::post('/save', 'MypageController@postReview');
            //상품의 리뷰 삭제
            Route::delete('/', 'MypageController@deleteReview');
        });
        //# Q&A
        Route::group(['prefix' => 'qna', 'as' => 'qna.'], function () {
            //Q&A 리스트
            Route::get('/', 'MypageController@getQna');
            //# 상품 Q&A
            Route::group(['prefix' => 'product'], function () {
                //상품 Q&A 등록 화면
                Route::get('/', 'MypageController@getProductQna');
                //상품 Q&A 등록
                Route::post('/', 'MypageController@postProductQna');
                //상품 Q&A 수정
                Route::put('/', 'MypageController@updateProductQna');
                //상품 Q&A 삭제
                Route::delete('/', 'MypageController@deleteProductQna');
            });
            //# 매장의 Q&A
            Route::group(['prefix' => 'store'], function () {
                //매장의 Q&A 등록 화면
                Route::get('/{id?}', 'MypageController@getStoreQna');
                //매장의 Q&A 등록
                Route::post('/', 'MypageController@postStoreQna');
                //매장의 Q&A 수정
                Route::put('/', 'MypageController@updateStoreQna');
                //매장의 Q&A 삭제
                Route::delete('/', 'MypageController@deleteStoreQna');
            });
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
            Route::get('/{id?}', 'MypageController@getNoticeDetail');
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

