@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickupOrder">
    <input type="hidden" name="product_all" value="{{$productAll ?? 0}}">
    @forelse($product as $k=>$v)
        <div class="goods-container">
            <p class="container-title">주문상품</p>
            <div class="container-content">
                <div class="img-area" @if(!empty($v->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->origin_product->image_path}}'); background-size:cover;" @endif></div>
                <div class="word-area">
                    <div class="top-box">
                        <p><span>{{$v->store->fcTrader->companyName ?? ''}}</span></p>
                    </div>
                    <div class="menu-box">
                        <p>{{$v->origin_product->name ?? ''}}</p>
                    </div>
                    <div class="price-box">
                        <p class="priceNum"><span>{{$v->price_sum ?? 0}}</span>원</p>
                        <p class="pricePer">/ <span>{{$v->count ?? 0}}</span>개</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse
        <div class="barSection"></div>
        <div class="user-container">
            <p class="container-title">주문자 정보</p>
            <div class="input-wrap">
                <label for="" class="input-title">주문자</label>
                <div class="input-content">
                    <div class="input-box">
                        <input type="text" name="user_name" value="{{$customer->name ?? ''}}" placeholder="이름을 입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">연락처</label>
                <div class="input-content phoneNum">
                    <div class="input-box">
                        <input type="number" name="user_phone_1" value="{{substr(($customer->phone ?? ''),0,3)}}">
                    </div>
                    <div class="input-box">
                        <input type="number" name="user_phone_2" value="{{substr(($customer->phone ?? ''),3,4)}}">
                    </div>
                    <div class="input-box">
                        <input type="number" name="user_phone_3" value="{{substr(($customer->phone ?? ''),7,4)}}">
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">이메일</label>
                <div class="input-content eMail">
                    <div class="input-box">
                        <input type="text" name="user_email_01" value="{{$customer->email ?? ''}}">
                    </div>
                    <div class="input-box">
                        <img src="/front/dist/img/icon_arrow_MD.png" alt="">
                        <select id="selbox" name="user_email_02" class="hideing">
                            <option value="direct">직접입력</option>
                            <option value="english">english</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="naver.com">naver.com</option>
                            <option value="nate.com">nate.com</option>
                        </select>
                        <input type="text" class="selboxDirect" name="user_email_02" placeholder="직접입력"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="barSection"></div>
        <div class="user-container">
            <p class="container-title">쿠폰 / 적립금 사용</p>
            <div class="input-wrap">
                <label for="" class="input-title">쿠폰</label>
                <div class="input-content">
                    <div class="input-box">
                        <img src="/front/dist/img/icon_arrow_MD.png" alt="">
                        @if($couponList->count() > 0)
                        @foreach($couponList as $k => $v)
                        <input type="hidden" name="coupon_price_{{$v->pickup_coupon_id ?? 0}}" value="{{$v->price ?? 0}}">
                        @endforeach
                        <select name="coupon" class="noneVal">
                            <option value="" selected disabled hidden>사용가능한 쿠폰이 {{$couponList->count()}}개 있습니다.</option>
                            @foreach($couponList as $k => $v)
                            <option value="{{$v->pickup_coupon_id ?? 0}}">{{$v->name ?? ''}}</option>
                            @endforeach
                            <option value="">사용안함</option>
                        </select>
                        @else
                        <select name="coupon" class="noneVal" disabled>
                            <option value="" selected disabled hidden>사용가능한 쿠폰이 없습니다.</option>
                        </select>
                        @endif
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">주문자</label>
                <div class="input-content">
                    <div class="input-box">
                        <input type="number" name="user_point" value="" onkeyup="PickupOrder.pointLimit(this, {{$customer->point ?? 0}})" placeholder="{{number_format($customer->point ?? 0)}}원 사용가능합니다.">
                        <p class="fake-text">원</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="barSection"></div>
        <div class="user-container">
            <p class="container-title">결제금액</p>
            <ul class="container-table">
                <li>
                    <p class="table-title">총 상품금액</p>
                    <p class="table-text"><span class="price-product">{{$productSum ?? 0}}</span>원</p>
                </li>
                <li>
                    <p class="table-title">쿠폰 사용</p>
                    <p class="table-text">-<span class="price-coupon">0</span>원</p>
                </li>
                <li>
                    <p class="table-title">적립금 사용</p>
                    <p class="table-text">-<span class="price-point">0</span>원</p>
                </li>
                <li class="table-total">
                    <p class="table-title">총 결제금액</p>
                    <p class="table-text"><span class="price-total">{{$productSum ?? 0}}</span>원</p>
                </li>
            </ul>
        </div>
        <div class="barSection"></div>
        <div class="user-container">
            <p class="container-title">결제수단</p>
            <div class="radio-wrap">
                <div class="radio ">
                    <input type="radio" id="q1" name="pay_method" value="pay_check"/>
                    <label for="q1"><span class="radio-custom"></span><span class="radio-label">신용/체크카드</span></label>
                </div>
                <div class="radio ">
                    <input type="radio" id="q3" name="pay_method" value="pay_bank"/>
                    <label for="q3"><span class="radio-custom"></span><span class="radio-label">실시간 계좌이체</span></label>
                </div>
                <div class="radio ">
                    <input type="radio" id="q2" name="pay_method" value="pay_phone"/>
                    <label for="q2"><span class="radio-custom"></span><span class="radio-label">휴대폰결제</span></label>
                </div>
                <div class="radio">
                    <input type="radio" id="q4" name="pay_method" value="pay_e_transfer"/>
                    <label for="q4"><span class="radio-custom"></span><span class="radio-label">무통장 입금</span></label>
                </div>
            </div>
            <div class="checkbox-wrap">
                <input type="checkbox" id="agree" name="agree"/>
                <label for="agree"><span class="checkbox-custom"></span><span class="checkbox-label">위 주문의 상품 및 결제, 주문 정보 등을 확인하였으며,<br>이에 동의합니다. <span class="checkboxColor">[필수]</span></span></label>
            </div>
        </div>
        <div class="btn-container">
            <button class="closeBtn" onclick="pageModal.payCancelPopup()">취소하기</button>
            <button class="okBtn" onclick="PickupCommon.addPay()">결제하기</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var PickupOrder = {
            _config: {
                productList: [],
            },

            //# 결제금액 계산
            calculation : function () {
                var price = Number($('.price-product').text().replace(/,/gi,''));
                var coupon = Number($('.price-coupon').text().replace(/,/gi,''));
                var point = Number($('.price-point').text().replace(/,/gi,''));
                var total = price - coupon - point;

                $('.price-total').text(pageModal.addComma(total));
            },

            //# 적립금 계산
            pointLimit : function(obj, max){
                obj.value = obj.value.replace(/\D/g, '');
                if (obj.value > max) obj.value = max;
                $('.price-point').text(pageModal.addComma(obj.value));
                if(obj.value == 0) $('.price-point').text(0);
                PickupOrder.calculation();
            }
        }

        $("select[name='user_email_02']").change(function(){
            $(this).removeClass("noneVal");
            if($(this).val() == "direct") {
                $(this).siblings('.selboxDirect').show();
                $(this).addClass('hideing');
            } else {
                $(this).siblings('.selboxDirect').hide();
                $(this).removeClass('hideing');
            }
        });

        $("select[name='coupon']").change(function() {
            var price = 0;
            if($(this).val() != '') price = Number($("input[name='coupon_price_" + $(this).val() + "\']").val());
            $('.price-coupon').text(pageModal.addComma(price));
            PickupOrder.calculation();
        });
    </script>
@endsection
