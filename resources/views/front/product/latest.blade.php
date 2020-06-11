@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn" onclick="javascript:history.back()">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">최신 픽업상품</p>
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
    <div class="subMenu-container">
        <div class="select-box">
            <select name="" id="" class="listUp-btn">
                <option value="">전체보기</option>
                <option value="">최신순</option>
                <option value="">인기순</option>
                <option value="">자주찾는순</option>
            </select>
        </div>
    </div>
    <div class="pickupList-container">
        <div class="machine-tabWrapper">
            <ul class="machine-tab">
                <li class="active">ALL</li>
                <li>기기1</li>
            </ul>
        </div>
        <div class="machine-tabItem">
            <ul class="machine-list">
                <li class="active">
                    <div class="machine-item">
                        <div class="img-box">
                            <img class="cart-ico" src="/front/dist/img/icon_cart_box.png" alt="">
                        </div>
                        <div class="price-box">
                            <span class="percent">SALE</span>
                            <p>22,950</p>
                            <small>29,000</small>
                        </div>
                        <div class="item-subject">
                            <p>쫀똑한 수제 산딸기 브라우니</p>
                        </div>
                    </div>
                    <div class="machine-item">
                        <div class="img-box">
                            <div class="outOfStock">
                                <p>품절</p>
                            </div>
                        </div>
                        <div class="price-box">
                            <p>22,950</p>
                        </div>
                        <div class="item-subject">
                            <p>쫀똑한 수제 산딸기 브라우니</p>
                        </div>
                    </div>
                    <div class="machine-item">
                        <div class="img-box">
                            <img class="cart-ico" src="/front/dist/img/icon_cart_box.png" alt="">
                        </div>
                        <div class="price-box">
                            <span class="percent">SALE</span>
                            <p>22,950</p>
                            <small>29,000</small>
                        </div>
                        <div class="item-subject">
                            <p>쫀똑한 수제 산딸기 브라우니</p>
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="machine-item">
                        <div class="img-box">
                            <div class="outOfStock">
                                <p>품절</p>
                            </div>
                        </div>
                        <div class="price-box">
                            <p>22,950</p>
                        </div>
                        <div class="item-subject">
                            <p>쫀똑한 수제 산딸기 브라우니</p>
                        </div>
                    </div>
                    <div class="machine-item">
                        <div class="img-box">
                            <img class="cart-ico" src="/front/dist/img/icon_cart_box.png" alt="">
                        </div>
                        <div class="price-box">
                            <span class="percent">SALE</span>
                            <p>22,950</p>
                            <small>29,000</small>
                        </div>
                        <div class="item-subject">
                            <p>쫀똑한 수제 산딸기 브라우니</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.front.footer')
@endsection
@section('script')
    <script>

        $('.tab-footer ul li').click(function(){
            $(this).addClass('active').siblings().removeClass('active');

            if ( $(this).hasClass('active') ) {
                $(this).children('img').attr("src",$(this).children('img').attr("src").replace("off.png","on.png"));
                $(this).siblings().children('img').attr("src",$(this).siblings().children('img').attr("src").replace("on.png","off.png"));
            }

        });


    </script>


    <script>

        $(document).ready(function(){
            var machineItem = $('.machine-tabItem .img-box').outerWidth();
            $('.machine-tabItem .img-box').css('height',machineItem);

            $('.machine-tab li').click(function(){
                $(this).addClass('active').siblings('li').removeClass('active');
                var machineTarget = $(this).index();
                $('.machine-list li').eq(machineTarget).addClass('active').siblings('li').removeClass('active');
            });

        });

    </script>
@endsection
