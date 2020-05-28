@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">구매한 픽업상품</p>
            <!-- <div class="btns-wrap">
                <button>
                    <img src="img/icon_search.png" alt="">
                    <img class="black-img" src="img/icon_search_B.png" alt="">
                </button>
                <button>
                    <img src="img/icon_cart.png" alt="">
                    <img class="black-img" src="img/icon_cart_B.png" alt="">
                </button>
                <button>
                    <img src="img/icon_menu.png" alt="">
                    <img class="black-img" src="img/icon_menu_B.png" alt="">
                </button>
            </div> -->
        </div>
    </header>
@endsection
@section('content')
    <div class="subEtc-container">
        <p>시간안에 상품을 픽업해주시기 바랍니다.</p>
    </div>
    <div class="goodsList-container">
        <div class="goods-wrapper">
            <div class="img-box"></div>
            <div class="word-box">
                <p class="codeNum">1234-1234-1234</p>
                <div class="goodsSub">
                    <p><span>군자군자점</span>판다의 치킨 브리또</p>
                </div>
                <div class="toBottom">
                    <p class="counting">남은시간<span>15:30:11</span></p>
                    <p class="priceNum"><span>22,950</span>원</p>
                </div>
            </div>
        </div>
        <div class="goods-wrapper">
            <div class="img-box"></div>
            <div class="word-box">
                <p class="codeNum">1234-1234-1234</p>
                <div class="goodsSub">
                    <p><span>군자점</span>판다의 치킨 브리또 테이크 샌드위치입니다</p>
                </div>
                <div class="toBottom">
                    <p class="counting">남은시간<span>15:30:11</span></p>
                    <p class="priceNum"><span>22,950</span>원</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
