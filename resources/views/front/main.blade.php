@extends('layouts.front')
@section('title', $title ?? '')
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
                <button class="counting-btn">
                    <img src="/front/dist/img/icon_notion.png" alt="">
                    <span>1</span>
                </button>
            </div>
            <div class="title-wrapper">
                <div class="main-title">
                    <p>미트박스365 성남점</p>
                    <ul>
                        <li class="gray-link" onclick="location.href='/front/mypage/qna';">문의하기</li>
                        <li class="red-link">매장변경</li>
                    </ul>
                </div>
                <div class="sub-title">
                    <ul>
                        <li>서울특별시 광진구 능동로 330</li>
                        <li>02)234-1234</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="itemSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_new.png" alt="">
                <p>새로운 픽업상품이 출시했어요.</p>
                <button><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
            </div>
            <div class="swiper-wrapper">
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
                <div class="swiper-slide">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="price-box">
                        <p><span>39,000</span></p>
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="price-box">
                        <p><span class="sale-word">SALE</span><span>22,950</span><small>29,000</small></p>
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="wideSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_hot.png" alt="">
                <p>지금 핫한 인기 상품은?</p>
                <button><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="word-box">
                        <div class="price-box">
                            <p><span>18,500</span></p>
                        </div>
                        <div class="item-subject">
                            <p>[캐나다]아침식사 대용 귀리 오트밀</p>
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
        <div class="cubeItem-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_pick.png" alt="">
                <p>최근 본 상품을 확인하세요.</p>
                <button><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
            </div>
            <div class="cubeBox-wrapper">
                <div class="cubeItem">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니브라우니</p>
                    </div>
                </div>
                <div class="cubeItem">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니</p>
                    </div>
                </div>
                <div class="cubeItem">
                    <div class="img-box">
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                    </div>
                    <div class="item-subject">
                        <p>쫀똑한 수제 산딸기 브라우니</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reviewSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_best.png" alt="">
                <p>최고 리뷰를 확인하세요.</p>
                <!-- <button><img src="img/icon_mainarrow.png" alt=""></button> -->
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
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
                </div>
                <div class="swiper-slide">
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
                </div>
            </div>
        </div>
@endsection
@section('footer')
    @include('layouts.front.footer')
@endsection
@section('script')
    <script>

        $('.tab-footer ul li').click(function () {
            $(this).addClass('active').siblings().removeClass('active');

            if ($(this).hasClass('active')) {
                $(this).children('img').attr("src", $(this).children('img').attr("src").replace("off.png", "on.png"));
                $(this).siblings().children('img').attr("src", $(this).siblings().children('img').attr("src").replace("on.png", "off.png"));
            }

        });

    </script>

    <script>
        $(document).ready(function(){
            var swiper = new Swiper('.swiper-container.mainSlide-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'progressbar',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            var swiper = new Swiper('.swiper-container.itemSlide-container', {
                slidesPerView: 'auto',
                spaceBetween: 10,
            });

            var swiper = new Swiper('.swiper-container.wideSlide-container', {
                slidesPerView: 'auto',
                spaceBetween: 10,
            });
            var swiper = new Swiper('.swiper-container.reviewSlide-container', {
                slidesPerView: 'auto',
                spaceBetween: 30,
            });

            var mainItemList = $('.cubeBox-wrapper .img-box').outerWidth();
            $('.cubeBox-wrapper .img-box').css('height',mainItemList);

            $('.red-link').click(function(){
                $('#storeSearch').addClass('slideIn').removeClass('slideOut');
                $(this).closest('.content-body').addClass('fixed-scroll');
            });

            $('.alarm-btn').click(function(){
                $('#PPalarm').addClass('slideIn').removeClass('slideOut');
                $(this).closest('.content-body').addClass('fixed-scroll');
            });




            $('.pin').click(function(){
                if ( $(this).hasClass('default-pin') ) {
                    $(this).children('img').attr("src",$(this).children('img').attr("src").replace("_pin","_mainpin"));
                    $(this).siblings().children('img').attr("src",$(this).siblings().children('img').attr("src").replace("_mainpin","_pin"));
                    $(this).removeClass('default-pin').siblings().addClass('default-pin');
                }
            });

            $('.pin img').click(function(){
                $('.storeInfo-slide').slideDown(300);
            });

            $('.full-close').click(function(){
                $(this).closest('.fullPopup-wrapper').removeClass('slideIn').addClass('slideOut');
                $(this).closest('.fullPopup-wrapper').siblings('.wrapper').children('.content-body').removeClass('fixed-scroll');
            });


            //관심매장 리스트 없는경우
            if( $('.enjoyStore-list ul li').length == 0 ) {
                $('.enjoyStore-list').append('<p class="none-list">관심매장이 없습니다.</p>');
            }

            //알림 리스트 없는경우
            if( $('.alarm-list ul li').length == 0 ) {
                $('.alarm-list').append('<p class="none-list">등록된 알림이 없습니다.</p>');
            }

            $('.delete-list').click(function(){
                $(this).closest('li').remove();
                if( $('.alarm-list ul li').length == 0 ) {
                    $('.alarm-list').append('<p class="none-list">등록된 알림이 없습니다.</p>');
                }
            });

        });

    </script>
@endsection

