@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickup-content">
        <div class="subMenu-container">
            <div class="select-box">
                <select name="" id="" class="listUp-btn">
                    <option value="">전체보기</option>
                    <option value="">결제완료</option>
                    <option value="">구매취소</option>
                    <option value="">픽업완료</option>
                </select>
            </div>
        </div>
        <div class="pickupList-container">
            <div class="pickup-wrapper">
                <div class="img-box"></div>
                <div class="word-box">
                    <div class="date">
                        <p>2020-03-22/1234567891234</p>
                        <button type="button" onclick="location.href='연결링크.html'">
                            <img src="/front/dist/img/icon_next.png" alt="">
                        </button>
                    </div>
                    <div class="menuInfo">
                        <p><span>군자점</span>국내산 생생 삼겹살250g</p>
                    </div>
                    <div class="price">
                        <p class="select-status"><span>결제완료</span></p>
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
            <div class="pickup-wrapper">
                <div class="img-box"></div>
                <div class="word-box cancle">
                    <div class="date">
                        <p>2020-03-22/1234567891234</p>
                        <button type="button" onclick="location.href='연결링크.html'">
                            <img src="/front/dist/img/icon_next.png" alt="">
                        </button>
                    </div>
                    <div class="menuInfo">
                        <p><span>성남점</span>푸드그램 정육슬라이스 국산돼지도지</p>
                    </div>
                    <div class="price">
                        <p class="select-status"><span>구매취소</span></p>
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
            <div class="pickup-wrapper">
                <div class="img-box"></div>
                <div class="word-box cancle">
                    <div class="date">
                        <p>2020-03-22/1234567891234</p>
                        <button type="button" onclick="location.href='연결링크.html'">
                            <img src="/front/dist/img/icon_next.png" alt="">
                        </button>
                    </div>
                    <div class="menuInfo">
                        <p><span>단대오거리점</span>푸드그램 정육슬라이스 국산돼지도지</p>
                    </div>
                    <div class="price">
                        <p class="select-status"><span>구매취소</span></p>
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        if( $('.pickup-content .pickup-wrapper').length == 0 ) {
            $('.pickup-content .pickupList-container').append('<p class="none-list">해당내역이 없습니다.</p>');
        }

    </script>
@endsection
