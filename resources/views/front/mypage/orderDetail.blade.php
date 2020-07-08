@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body orderDetail">
        <span class="status-text">픽업대기</span>
        <div class="pickup-header">
            <p class="pickup-number">픽업번호 :<span>12345</span></p>
        </div>
        <div class="goods-container">
            <p class="container-title">주문상품</p>
            <div class="store-container">
                <div class="store-wrap">
                    <div class="store-title">
                        <span>군자점</span>
                        <p class="address">서울특별시 광진구 332-1</p>
                    </div>
                    <div class="container-content">
                        <div class="img-wrapper"></div>
                        <div class="word-wrapper">
                            <div class="status-area">
                                <span class="blue-box">냉장1</span>
                                <p class="clear-text"><span>2020.06.30 14:00:23</span>픽업완료</p><!-- 픽업완료시 show -->
                            </div>
                            <div class="menu-area">
                                <p style="-webkit-box-orient: vertical;">푸드그램 정육슬라이스 국산 정다운 1등급 5kg (1kg * 5ea)</p>
                            </div>
                            <div class="bottom-area">
                                <div class="price-box">
                                    <p class="priceNum"><span>22,950</span>원</p>
                                    <p class="pricePer">/ <span>1</span>개</p>
                                </div>
                            </div>
                        </div>
                        <div class="auto-cancel">
                            <p>키오스크에서의 상품이 품절되어 <span>자동취소</span> 되었습니다.</p>
                        </div>
                    </div>
                    <div class="container-content">
                        <div class="img-wrapper"></div>
                        <div class="word-wrapper">
                            <div class="status-area">
                                <span class="green-box">냉동1</span>
                                <p class="cancel">자동취소</p><!-- 픽업취소시 show -->
                            </div>
                            <div class="menu-area">
                                <p style="-webkit-box-orient: vertical;">푸드그램 정육슬라이스 국산 정다운 1등급 5kg (1kg * 5ea)</p>
                            </div>
                            <div class="bottom-area">
                                <div class="price-box">
                                    <p class="priceNum"><span>22,950</span>원</p>
                                    <p class="pricePer">/ <span>1</span>개</p>
                                </div>
                            </div>
                        </div>
                        <div class="auto-cancel">
                            <p>키오스크에서의 상품이 품절되어 <span>자동취소</span> 되었습니다.</p>
                        </div>
                    </div>
                </div>
                <div class="store-wrap">
                    <div class="store-title">
                        <span>군자점</span>
                        <p class="address">서울특별시 광진구 332-1</p>
                    </div>
                    <div class="container-content">
                        <div class="img-wrapper"></div>
                        <div class="word-wrapper">
                            <div class="status-area">
                                <span class="blue-box">냉장1</span>
                                <p class="cancel">부분취소</p><!-- 픽업취소시 show -->
                            </div>
                            <div class="menu-area">
                                <p style="-webkit-box-orient: vertical;">푸드그램 정육슬라이스 국산 정다운 1등급 5kg (1kg * 5ea)</p>
                            </div>
                            <div class="bottom-area">
                                <div class="price-box">
                                    <p class="priceNum"><span>22,950</span>원</p>
                                    <p class="pricePer">/ <span>1</span>개</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="barSection"></div>
        <div class="accordion-container">
            <div class="container-title">
                <p>주문 상세 정보</p>
                <img src="/front/dist/img/icon_arrow_MD.png" alt="">
            </div>
            <div class="container-list">
                <div class="list-wrapper">
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문번호</li>
                                <li class="list-content"><span>1234-1111-1234</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>주문일시</li>
                                <li class="list-content"><span>2020.03.19 12:33:33</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>주문번호</li>
                                <li class="list-content"><span>홍길동</span></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="list-wrapper">
                    <div class="container-title">
                        <p>결제 정보</p>
                    </div>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>상품금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>배송비</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>상품금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>배송비</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="focus">
                        <li>
                            <ul>
                                <li class='list-title'>총 결제금액</li>
                                <li class="list-content focus-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>지급 예정 적립금</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="list-wrapper">
                    <div class="container-title">
                        <p>결제 수단</p>
                    </div>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>결제수단</li>
                                <li class="list-content"><span>신용카드</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>카드회사</li>
                                <li class="list-content"><span>현대카드</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>결제시간</li>
                                <li class="list-content"><span>2020.03.19 12:33:33</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>결제금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="barSection"></div><!-- 취소영역있을시 show -->
        <div class="accordion-container open-action"><!-- 취소시 show -->
            <div class="container-title">
                <p>취소 금액 정보</p>
                <img src="/front/dist/img/icon_arrow_MD.png" alt="">
            </div>
            <div class="container-list">
                <div class="list-wrapper">
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>할인금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>쿠폰사용</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>적립금 사용</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="focus custom-border">
                        <li>
                            <ul>
                                <li class='list-title'>취소된 금액</li>
                                <li class="list-content focus-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="alert-text"><!-- 자동취소시 show -->
                        <p><span>픽업 가능시간 초과</span>되어 <strong>결제가 자동취소</strong> 되었습니다.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-footer full-btn">
            <button class="okBtn">주문 목록</button>
        </div>
</div>
@endsection
@section('script')
    <script>
        $('.container-list').hide();
        $('.accordion-container.open-action .container-list').show();

        $('.accordion-container > .container-title').click(function(){

            if ( $(this).parent('.accordion-container').hasClass('open-action') ) {
                $(this).parent('.accordion-container').addClass('close-action');
                $(this).siblings('.container-list').slideUp(500);
                $(this).parent('.accordion-container').removeClass('open-action');
            } else {
                $(this).parent('.accordion-container').addClass('open-action');
                $(this).siblings('.container-list').slideDown(500);
                $(this).parent('.accordion-container').removeClass('close-action');
            }
        });
    </script>
@endsection
