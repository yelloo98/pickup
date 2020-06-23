@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body coupon-content">
        <div class="content-wrapper">
            <div class="title-section">
                <p class="word-box">보유쿠폰<strong><span class="">0</span>장</strong></p>
                <div class="btn-box">
                    <div class="order-item">
                        <input id="coupon" type="number" value="" placeholder="쿠폰번호를 입력해주세요">
                    </div>
                    <button>쿠폰등록</button>
                </div>
            </div>
            <div class="coupon-container">
                <div class="coupon-section">
                    <div class="sale-box">
                        <div class="word-item">
                            <div class="toTop">
                                <p class="storeName"><span>군자점</span></p>
                                <p class="couponTerm">2020-04-01~2020-04-07</p>
                            </div>
                            <div class="mainTxt"><span>20,000</span>원 할인</div>
                            <div class="subTxt">40,000원 이상 구매시 사용가능</div>
                        </div>
                    </div>
                    <div class="dDay-box">
                        <div class="dDay-item">
                            <div class="countNumber">D-6</div>
                            <div class="countDate">남은기간</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var couponNum = $('.coupon-section:last-child').index();

        if( $('.coupon-content .coupon-section').length == 0 ) {
            $('.coupon-content .coupon-container').append('<p class="none-list">쿠폰이 없습니다.</p>');
        } else {
            $('.coupon-content .word-box span').addClass('colorNum');
            $('.coupon-content .word-box span').text(couponNum + 1);
        }

        $("#coupon").on("propertychange change keyup paste input", function() {
            if ($(this).val() != "") {
                $('.btn-box button').addClass('active');
            } else {
                $('.btn-box button').removeClass('active');
            }
        });
    </script>
@endsection
