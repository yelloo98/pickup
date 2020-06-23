@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body wish-content">
        <div class="subMenu-container">
            <div class="sub-txt">관심상품은 최대 90일간 보관됩니다.</div>
            <div class="total-info">
                <p>전체<strong><span>0</span>개</strong></p>
                <button class="clear">전체삭제</button>
            </div>
        </div>
        <div class="wishList-container">
            <div class="wish-wrapper">
                <button class="delete-list" type="button"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                <div class="img-box"></div>
                <div class="word-box">
                    <div class="toTop">
                        <p><span>군자점</span></p>
                    </div>
                    <div class="menuInfo">
                        <p>푸드그램 호주산 이베리코 꽃돼지 주물럭입니다</p>
                    </div>
                    <div class="price">
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
            <div class="wish-wrapper">
                <button class="delete-list"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                <div class="img-box"></div>
                <div class="word-box">
                    <div class="toTop">
                        <p><span>군자점</span></p>
                    </div>
                    <div class="menuInfo">
                        <p>국내산 생생 삼겹살250g</p>
                    </div>
                    <div class="price">
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        var wishNum = $('.wish-wrapper:last-child').index();


        if( $('.wishList-container .wish-wrapper').length == 0 ) {
            $('.wishList-container').append('<p class="none-list">등록된 상품이 없습니다.</p>');
            $('.wish-content .total-info span').removeClass('colorNum');
        }else {
            $('.wish-content .total-info span').addClass('colorNum');
            $('.wish-content .total-info span').text(wishNum + 1);
        }


        $('.delete-list').click(function(){
            $(this).closest('.wish-wrapper').remove();
            $('.wish-content .total-info span').text(wishNum);
            if( $('.wishList-container .wish-wrapper').length == 0 ) {
                $('.wishList-container').append('<p class="none-list">등록된 상품이 없습니다.</p>');
                $('.wish-content .total-info span').text(0).removeClass('colorNum');
            }
        });

        $('.clear').click(function(){
            $('.wishList-container').empty();
            $('.wishList-container').append('<p class="none-list">등록된 상품이 없습니다.</p>');
            $('.wish-content .total-info span').text(0).removeClass('colorNum');
        });


    </script>
@endsection
