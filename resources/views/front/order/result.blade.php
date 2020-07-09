@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body order-clear">
        <div class="center-box">
            <img src="/front/dist/img/icon_cardcheck.png" alt="">
            <p>결제가 완료되었습니다.</p>
            <p>픽업해주세요.</p>
        </div>
        <div class="fixed-footer full-btn">
            <button onclick="location.href='/front/main'">메인으로</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        pageModal.orderResultPopup();
        var swiperPrice = new Swiper('.swiper-container.price-container', {
            slidesPerView: 'auto',
            spaceBetween: 8,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
@endsection
