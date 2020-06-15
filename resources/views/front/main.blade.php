@extends('layouts.front')
{{--@section('title', $title ?? '')--}}
@section('header')
    @include('layouts.front.header')
@endsection

@section('content')
    <div class="mainSlide-container swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slogun-box">
                    <ul>
                        <li>쉽고 빠른</li>
                        <li>프레시 스토어 OPEN</li>
                    </ul>
                    <p>오픈기념 픽업제품 1+1 증정 이벤트</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slogun-box">
                    <ul>
                        <li>쉽고 빠른</li>
                        <li>프레시 스토어 OPEN</li>
                    </ul>
                    <p>오픈기념 픽업제품 1+1 증정 이벤트</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slogun-box">
                    <ul>
                        <li>쉽고 빠른</li>
                        <li>프레시 스토어 OPEN</li>
                    </ul>
                    <p>오픈기념 픽업제품 1+1 증정 이벤트</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slogun-box">
                    <ul>
                        <li>쉽고 빠른</li>
                        <li>프레시 스토어 OPEN</li>
                    </ul>
                    <p>오픈기념 픽업제품 1+1 증정 이벤트</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slogun-box">
                    <ul>
                        <li>쉽고 빠른</li>
                        <li>프레시 스토어 OPEN</li>
                    </ul>
                    <p>오픈기념 픽업제품 1+1 증정 이벤트</p>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="storeTitle-container">
        <div class="ico-wrapper">
            <button class="clicking-btn">
                <img src="/front/dist/img/icon_star.png" alt="">
            </button>
            <button class="counting-btn alarm-btn">
                <img src="/front/dist/img/icon_notion.png" alt="">
                <span>1</span>
            </button>
        </div>
        <div class="title-wrapper">
            <div class="main-title">
                <p>{{$store->fcTrader->companyName}}</p>
                <ul>
                    <li class="gray-link" onclick="location.href='/front/mypage/qna/store';">문의하기</li>
                    <li class="red-link">매장변경</li>
                </ul>
            </div>
            <div class="sub-title">
                <ul>
                    <li>{{$store->fcTrader->address}}</li>
                    <li>{{\App\Helper\Codes::formatPhone($store->fcTrader->tel)}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="itemSlide-container swiper-container sub-content">
        <div class="moreTitle-wrapper">
            <img src="/front/dist/img/m_new.png" alt="">
            <p>새로운 픽업상품이 출시했어요.</p>
            <button onclick="location.href='/front/product/latest';"><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
        </div>
        <div class="swiper-wrapper">
            @forelse($newProduct as $k=>$v)
            <div class="swiper-slide">
                <div class="img-box">
                    <img src="/front/dist/img/icon_cart_box.png" alt="">
                </div>
                <div class="price-box">
                    <p><span class="sale-word">SALE</span><span>22,950</span><small>29,000</small></p>
                </div>
                <div class="item-subject">
                    <p>쫀똑한 수제 산딸기 브라우니브라우니</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>

    <div class="wideSlide-container swiper-container sub-content">
        <div class="moreTitle-wrapper">
            <img src="/front/dist/img/m_hot.png" alt="">
            <p>지금 핫한 인기 상품은?</p>
            <button><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
        </div>
        <div class="swiper-wrapper">
            @forelse($bestProduct as $k=>$v)
            <div class="swiper-slide">
                <div class="img-box">
                    <img src="/front/dist/img/icon_cart_box.png" alt="">
                </div>
                <div class="word-box">
                    <div class="price-box">
                        <p><span class="sale-word">SALE</span><span>22,950</span><small>29,000</small></p>
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니브라우니</p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>

    @if(!empty($historyProduct))
    <div class="cubeItem-container swiper-container sub-content">
        <div class="moreTitle-wrapper">
            <img src="/front/dist/img/m_pick.png" alt="">
            <p>최근 본 상품을 확인하세요.</p>
            <button><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
        </div>
        <div class="cubeBox-wrapper">
            @forelse($historyProduct as $k=>$v)
            <div class="cubeItem">
                <div class="img-box">
                    <img src="/front/dist/img/icon_cart_box.png" alt="">
                </div>
                <div class="item-subject">
                    <p>쫀똑한 수제 산딸기 브라우니브라우니</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
    @endif

    <div class="reviewSlide-container swiper-container sub-content">
        <div class="moreTitle-wrapper">
            <img src="/front/dist/img/m_best.png" alt="">
            <p>최고 리뷰를 확인하세요.</p>
        </div>
        <div class="swiper-wrapper">
            @forelse($ProductReview as $k=>$v)
            @if($k % 2 == 0) <div class="swiper-slide"> @endif
                <div class="review-list">
                        <div class="img-box"></div>
                        <div class="word-box">
                            <img src="/front/dist/img/icon_review.png" alt="">
                            <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니
                                은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도 괜찮을듯</p>
                            <div class="toBottom">
                                <p class="user-name"><strong><span>신</span>OO</strong>님</p>
                                <p class="item-subject">[국내산] 한돈 설깃살 모듬 구이용 500G</p>
                            </div>
                        </div>
                    </div>
            <!-- $k 마지막일 경우 추가 -->
            @if($k % 2 == 1) </div> @endif
            @empty
            @endforelse
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.front.footer')
@endsection

@section('script')
    <script src="/front/page/page.main.init.js"></script>
@endsection

