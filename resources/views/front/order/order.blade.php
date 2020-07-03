@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickupOrder">
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
                        <input type="text" value="홍길동" placeholder="이름을 입력해주세요.">
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">연락처</label>
                <div class="input-content phoneNum">
                    <div class="input-box">
                        <input type="number" value="010">
                    </div>
                    <div class="input-box">
                        <input type="number" value="1234">
                    </div>
                    <div class="input-box">
                        <input type="number" value="1234">
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">이메일</label>
                <div class="input-content eMail">
                    <div class="input-box">
                        <input type="text" value="enjoyworks">
                    </div>
                    <div class="input-box">
                        <img src="/front/dist/img/icon_arrow_MD.png" alt="">
                        <select id="selbox" name="selbox">
                            <option value="">english</option>
                            <option value="">hanmail.net</option>
                            <option value="">naver.com</option>
                            <option value="">nate.com</option>
                            <option value="direct">직접입력</option>
                        </select>
                        <input type="text" class="selboxDirect" name="selboxDirect" placeholder="직접입력"/>
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
                        <select name="" class="noneVal">
                            <option value="">사용가능한 쿠폰이 4개 있습니다.</option>
                            <option value="">50% 할인쿠폰</option>
                            <option value="">1,000원 할인쿠폰</option>
                            <option value="">300원 할인쿠폰</option>
                            <option value="">사용안함</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="input-wrap">
                <label for="" class="input-title">주문자</label>
                <div class="input-content">
                    <div class="input-box">
                        <input type="text" value="" placeholder="3,000원 사용가능합니다.">
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
                    <p class="table-text"><span>{{$productSum ?? 0}}</span>원</p>
                </li>
                <li>
                    <p class="table-title">쿠폰 사용</p>
                    <p class="table-text"><span>0</span>원</p>
                </li>
                <li>
                    <p class="table-title">적립금 사용</p>
                    <p class="table-text">-<span>0</span>원</p>
                </li>
                <li class="table-total">
                    <p class="table-title">총 결제금액</p>
                    <p class="table-text"><span>{{$productSum ?? 0}}</span>원</p>
                </li>
            </ul>
        </div>
        <div class="barSection"></div>
        <div class="user-container">
            <p class="container-title">결제수단</p>
            <div class="radio-wrap">
                <div class="radio ">
                    <input type="radio" id="q1" name="radioGroup" />
                    <label for="q1"><span class="radio-custom"></span><span class="radio-label">신용/체크카드</span></label>
                </div>
                <div class="radio ">
                    <input type="radio" id="q3" name="radioGroup" />
                    <label for="q3"><span class="radio-custom"></span><span class="radio-label">실시간 계좌이체</span></label>
                </div>
                <div class="radio ">
                    <input type="radio" id="q2" name="radioGroup" />
                    <label for="q2"><span class="radio-custom"></span><span class="radio-label">휴대폰결제</span></label>
                </div>
                <div class="radio">
                    <input type="radio" id="q4" name="radioGroup" />
                    <label for="q4"><span class="radio-custom"></span><span class="radio-label">무통장 입금</span></label>
                </div>
            </div>
            <div class="checkbox-wrap">
                <input type="checkbox" id="agree" name="agree"/>
                <label for="agree"><span class="checkbox-custom"></span><span class="checkbox-label">위 주문의 상품 및 결제, 주문 정보 등을 확인하였으며,<br>이에 동의합니다. <span class="checkboxColor">[필수]</span></label>
            </div>
        </div>
        <div class="btn-container">
            <button class="closeBtn">취소하기</button>
            <button class="okBtn">결제하기</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('select').change(function(){
            $(this).removeClass("noneVal");
            if($(this).val() == "direct") {
                $(this).siblings('.selboxDirect').show();
                $(this).addClass('hideing');
            } else {
                $(this).siblings('.selboxDirect').hide();
                $(this).removeClass('hideing');
            }
        });
        $(".selboxDirect").hide();
    </script>
@endsection
