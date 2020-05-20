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

Route::group(['namespace' => 'Front', 'middleware' => 'front', 'prefix' => 'front', 'as' => 'front.'], function () {

    //# 메인
    Route::get('/main', 'MainController@getIndex')->name('index');

    //# 장바구니
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', 'CartController@getIndex')->name('index');
    });

    //# 마이페이지
    Route::group(['prefix' => 'mypage', 'as' => 'mypage.'], function () {
        Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
            //# 픽업상품의 주문내역 노출
            Route::get('/order', 'MypageController@getOrderList');
        });


        //# 쿠폰 입력 및 등록
        Route::get('/coupon', 'MypageController@getCouponList');
        Route::post('/coupon', 'MypageController@postCoupon');
        //# 보유적립금, 총 사용 적립금, 소멸 예정 적립금 노출
        Route::get('/point', 'MypageController@getPointList');
        //# 관심매장으로 등록한 매장 노출
        Route::get('/store', 'MypageController@getStoreList');
        Route::post('/store/{product_id?}', 'MypageController@postStore');
    });


});

