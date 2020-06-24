@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body coupon-content">
        <div class="content-wrapper">
            <div class="title-section">
                <p class="word-box">보유쿠폰<strong><span class="colorNum">{{$couponList->count() ?? 0}}</span>장</strong></p>
                <div class="btn-box">
                    <div class="order-item">
                        <input id="coupon" type="text" name="coupon" placeholder="쿠폰번호를 입력해주세요">
                    </div>
                    <button onclick="">쿠폰등록</button>
                </div>
            </div>
            <div class="coupon-container">
            @forelse($couponList as $k => $v)
                <div class="coupon-section">
                    <div class="sale-box">
                        <div class="word-item">
                            <div class="toTop">
                                <p class="storeName"><span>{{$v->coupon->name ?? ''}}</span></p>
                                <p class="couponTerm">{{$v->coupon->start_at.'~'.$v->coupon->end_at}}</p>
                            </div>
                            <div class="mainTxt"><span>{{number_format($v->coupon->price ?? 0)}}</span>원 할인</div>
                            @if($v->coupon->price_min > 0)
                            <div class="subTxt">{{number_format($v->coupon->price_min)}}원 이상 구매시 사용가능</div>
                            @endif
                        </div>
                    </div>
                    <div class="dDay-box">
                        <div class="dDay-item">
                            <div class="countNumber">D-{{$v->coupon->day_rem}}</div>
                            <div class="countDate">남은기간</div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="none-list">쿠폰이 없습니다.</p>
            @endforelse
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#coupon").on("propertychange change keyup paste input", function() {
            if ($(this).val() != "") {
                $('.btn-box button').addClass('active');
                $('.btn-box button').attr('onclick', "PickupCommon.addCoupon()");
            } else {
                $('.btn-box button').removeClass('active');
                $('.btn-box button').attr('onclick', "");
            }
        });
    </script>
@endsection
