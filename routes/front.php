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
    Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
        Route::get('/add/store', 'PickupController@addStore');                //# 관심매장 등록/삭제
        Route::get('/add/product', 'PickupController@addProduct');            //# 관심상품 등록/삭제
        Route::get('/sel/product', 'PickupController@selProduct');            //# 상품 선택
        Route::get('/add/cart', 'PickupController@addCart');                  //# 카트 등록/삭제
        Route::get('/app/test', 'PickupController@appTest');                  //# 앱 테스트 (toast)
        Route::get('/order/{id?}', 'PickupController@getOrderApi');           //# 결제 요청 api
    });

    /**
     * Main
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::get('/main', 'MainController@getIndex')->name('index');            //# 메인

    /**
     * Product
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', 'ProductController@getProductList');                 //# 상품 목록
        Route::get('/{id?}', 'ProductController@getProduct');                //# 상품 상세
    });

    /**
     * Cart
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', 'CartController@getIndex')->name('index');          //# 카트 목록
        Route::post('/', 'CartController@postCart');                        //# 카트 추가 / 삭제
    });

    /**
     * Order
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', 'OrderController@getOrderIndex');                   //# 주문/결제 입력
        Route::post('/', 'OrderController@postOrder');                      //# 주문 요청
        Route::get('/result/{id?}', 'OrderController@getOrderResult');      //# 주문
        Route::get('/pickup', 'OrderController@getOrderPickupList');        //# 구매한 픽업상품 목록
        Route::get('/detail/{id?}', 'OrderController@getOrderDetail');      //# 주문내역 상세
    });

    /**
     * Mypage
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'mypage', 'as' => 'mypage.'], function () {
        //# 주문내역
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            Route::get('/', 'MypageController@getOrderList');              //# 마이페이지 - 주문내역
        });
        //# 쿠폰함
        Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
            Route::get('/', 'MypageController@getCouponList');             //# 마이페이지 - 쿠폰 입력
            Route::post('/', 'MypageController@postCoupon');               //# 마이페이지 - 쿠폰 등록
        });
        //# 적립금
        Route::group(['prefix' => 'point', 'as' => 'point.'], function () {
            Route::get('/', 'MypageController@getPointList');             //# 마이페이지 - 적립 내역
        });
        //# 관심매장
        Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
            Route::get('/', 'MypageController@getStoreList');             //# 마이페이지 - 관심매장 내역
        });
        //# 관심상품
        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('/', 'MypageController@getProductList');           //# 마이페이지 - 관심상품 내역
        });
        //# 상품후기
        Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
            Route::get('/', 'MypageController@getReviewList');           //# 마이페이지 - 상품후기 내역
            Route::get('/{id?}', 'MypageController@getReviewDetail');    //# 마이페이지 - 상품후기 상세 내역
            Route::post('/save', 'MypageController@postReview');         //# 마이페이지 - 상품후기 등록 / 수정 / 삭제
        });
        //# Q&A
        Route::group(['prefix' => 'qna', 'as' => 'qna.'], function () {
            Route::get('/', 'MypageController@getQna');                  //# 마이페이지 - Q&A 목록
            //# 상품 Q&A
            Route::group(['prefix' => 'product'], function () {
                Route::get('/{id?}', 'MypageController@getProductQna');  //# 마이페이지 - 상품 Q&A 상세
                Route::post('/', 'MypageController@postProductQna');     //# 마이페이지 - 상품 Q&A 등록 / 수정 / 삭제
            });
            //# 매장의 Q&A
            Route::group(['prefix' => 'store'], function () {
                Route::get('/{id?}', 'MypageController@getStoreQna');    //# 마이페이지 - 매장 Q&A 상세
                Route::post('/', 'MypageController@postStoreQna');       //# 마이페이지 - 매장 Q&A 등록 / 수정 / 삭제
            });
        });
        //# 알림 수신 동의
        Route::group(['prefix' => 'push', 'as' => 'push.'], function () {
            Route::get('/', 'MypageController@getPush');                 //# 마이페이지 - 알림 ON/OFF
            Route::post('/', 'MypageController@postPush');               //# 마이페이지 - 알림 ON/OFF 수정
        });
        //# 이용약관
        Route::group(['prefix' => 'term', 'as' => 'term.'], function () {
            Route::get('/', 'MypageController@getTermList');             //# 마이페이지 - 이용약관
        });
        //# 공지사항
        Route::group(['prefix' => 'notice', 'as' => 'notice.'], function () {
            Route::get('/', 'MypageController@getNoticeList');           //# 마이페이지 - 공지사항 목록
            Route::get('/{id?}', 'MypageController@getNoticeDetail');    //# 마이페이지 - 공지사항 상세
        });
    });

    /**
     * Search
     * -----------------------------------------------------------------------------------------------------------------
     */
    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
        Route::get('/', 'SearchController@getIndex');                    //# 검색
    });
});

