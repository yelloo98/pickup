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
    <div class="swiper-container goods-img">
        <div class="swiper-wrapper">
            <div class="swiper-slide"></div>
            <div class="swiper-slide"></div>
            <div class="swiper-slide"></div>
            <div class="swiper-slide"></div>
            <div class="swiper-slide"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="goodsInfo-container">
        <span>군자점</span>
        <p class="goods-subject">미트박스 1인용 루꼴라 에그토마토 200G</p>
        <div class="goods-price">
            <p>
                <strong class="percent"><span>30</span>%</strong><strong class="price"><span>22,950</span>원</strong><small>29,000</small>
            </p>
        </div>
        <div class="goods-count">
            <p>현재 매장 재고는 <span>5</span>개 입니다.</p>
        </div>
    </div>
    <div class="goodsTab-container tab-section">
        <ul class="small-list">
            <li class="tabItem active">상품설명</li>
            <li class="tabItem">구매정보</li>
            <li class="tabItem">상품후기<span>100</span></li>
            <li class="tabItem">Q&A<span>15</span></li>
        </ul>
        <div class="target-wrap">
            <div class="tabTarget active">
                <img class="goods" src="/front/dist/img/goods.png" alt="">
            </div>
            <div class="tabTarget over-size">
                <div class="accordian-list">
                    <ul>
                        <li>상품정보 제공고시<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                        <li>픽업안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                        <li>교환/반품/환불안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="tabTarget ">
                <div class="review-wrapper">
                    <button>상품후기 작성하기</button>
                    <div class="review-container">
                        <div class="review-list">
                            <div class="review-title">
                                <p>포토 상품후기(<span>23</span>)</p>
                                <button>더보기<img src="/front/dist/img/icon_next.png"></button>
                            </div>
                            <div class="review-content photo-review">
                                <div class="img-box"></div>
                                <div class="img-box"></div>
                                <div class="img-box"></div>
                                <div class="img-box"></div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="review-title">
                                <p>전체 상품후기(<span>23</span>)</p>
                            </div>
                            <div class="review-content">
                                <div class="list-item">
                                    <div class="img-box"></div>
                                    <div class="word-box">
                                        <img src="/front/dist/img/icon_review.png" alt="">
                                        <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도 괜찮을듯괜찮을듯괜찮을듯괜찮을듯괜찮을듯</p>
                                        <div class="toBottom">
                                            <div class="user-info">
                                                <p class="user-name"><strong><span>신</span>OO</strong>님</p>
                                                <ul class="user-score">
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/gray_star.png" alt=""></li>
                                                </ul>
                                            </div>
                                            <p class="item-subject">[국내산] 한돈 설깃살 모듬 구이용 500G</p>
                                            <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item none-img">
                                    <div class="word-box">
                                        <img src="/front/dist/img/icon_review.png" alt="">
                                        <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도 괜찮을듯</p>
                                        <div class="toBottom">
                                            <div class="user-info">
                                                <p class="user-name"><strong><span>신</span>OO</strong>님</p>
                                                <ul class="user-score">
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/gray_star.png" alt=""></li>
                                                </ul>
                                            </div>
                                            <p class="item-subject">[국내산] 한돈 설깃살 모듬 구이용 500G</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div class="img-box"></div>
                                    <div class="word-box">
                                        <img src="/front/dist/img/icon_review.png" alt="">
                                        <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ</p>
                                        <div class="toBottom">
                                            <div class="user-info">
                                                <p class="user-name"><strong><span>신</span>OO</strong>님</p>
                                                <ul class="user-score">
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/yellow_star.png" alt=""></li>
                                                    <li><img src="/front/dist/img/gray_star.png" alt=""></li>
                                                </ul>
                                            </div>
                                            <p class="item-subject">[국내산] 한돈 설깃살 모듬 구이용 500G</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="purchase-footer"><!-- outOfStock 클래스 추가시 품절 -->
        <div class="subBtn-wrap">
            <button>
                <img src="/front/dist/img/icon_heart_O.png" alt="">
            </button>
            <button class="changeing">
                <img src="/front/dist/img/icon_cart_O.png" alt="">
            </button>
        </div>
        <div class="mainBtn-wrap">
            <button>구매하기</button>
        </div>
    </div>
@endsection
@section('script')
@endsection
