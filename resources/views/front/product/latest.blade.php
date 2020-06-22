@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body allPickup-content">
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
    </div>
@endsection
@section('footer')
    @include('layouts.front.footer')
@endsection
@section('script')
    <script src="/front/page/product/page.latest.init.js"></script>
@endsection
