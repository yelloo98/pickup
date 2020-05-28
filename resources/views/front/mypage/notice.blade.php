@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">공지사항 목록</p>
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
    <div class="listUp-container">
        <ul>
            <li>
                <div class="listUp-warpper">
                    <p class="listUp-category">[<span>FRESHSTORE</span>]</p>
                    <p class="listUp-text" style="-webkit-box-orient: vertical;">서비스 구매회원 이용약관 프래쉬스토어 인터넷 개인정보통신 관련 사용하는 용어의 정의는 다음과 같습니다.</p>
                    <small class="listUp-date">2020-04-13</small>
                </div>
                <img src="/front/dist/img/icon_arrow_MR.png" alt="">
            </li>
        </ul>
    </div>
@endsection
@section('script')
@endsection
