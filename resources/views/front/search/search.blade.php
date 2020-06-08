@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">구매한 픽업상품</p>
            <div class="btns-wrap">
                <button>
                    <img class="black-img" src="/front/dist/img/icon_search_B.png" alt="">
                </button>
                <button>
                    <img class="black-img" src="/front/dist/img/icon_cart_B.png" alt="">
                </button>
                <button>
                    <img class="black-img" src="/front/dist/img/icon_menu_B.png" alt="">
                </button>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="search-container">
        <div class="btn-box">
            <div class="order-item">
                <input type="text" value="삼겹살" placeholder="검색어를 입력해 주세요">
            </div>
            <button><img src="/front/dist/img/icon_search_B.png" alt=""></button> <!-- 이미지 변경 -->
        </div>
    </div>
    <div class="goods-container">
        <div class="content-box">
            <div class="distance-area">1km 이내</div>
            <div class="content-area">
                <div class="contentItem">
                    <div class="imgBlock"></div>
                    <p><span class="storeTxt">군자점</span><span class="priceTxt">22,950</span></p>
                    <p class="titleBlock">국내산 생생 삼겹살국내산 생생 삼겹살</p>
                </div>
                <div class="contentItem">
                    <div class="imgBlock"></div>
                    <p><span class="storeTxt">군자점</span><span class="priceTxt">22,950</span></p>
                    <p class="titleBlock">국내산 생생 삼겹살국내산 생생 삼겹살</p>
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="distance-area">3km 이내</div>
            <div class="content-area">
                <div class="contentItem">
                    <div class="imgBlock"></div>
                    <p><span class="storeTxt">군자점</span><span class="priceTxt">22,950</span></p>
                    <p class="titleBlock">국내산 생생 삼겹살국내산 생생 삼겹살</p>
                </div>
                <div class="contentItem">
                    <div class="imgBlock"></div>
                    <p><span class="storeTxt">군자점</span><span class="priceTxt">22,950</span></p>
                    <p class="titleBlock">국내산 생생 삼겹살국내산 생생 삼겹살</p>
                </div>
                <div class="contentItem">
                    <div class="imgBlock"></div>
                    <p><span class="storeTxt">군자점</span><span class="priceTxt">22,950</span></p>
                    <p class="titleBlock">국내산 생생 삼겹살국내산 생생 삼겹살</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
