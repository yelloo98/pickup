@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoods-content">
        <div class="subEtc-container">
            <p>시간안에 상품을 픽업해주시기 바랍니다.</p>
        </div>
        <div class="goodsList-container">
            <div class="goods-wrap">
                <div class="goods-header">
                    <p class="pickUp-num">
                        픽업번호 : <span>12345</span>
                    </p>
                    <p class="counting">
                        남은시간<span>15:20:11</span>
                    </p>
                </div>
                <div class="goods-item">
                    <div class="img-box"></div>
                    <div class="word-box">
                        <div class="box-header">
                            <span class="store-name">군자점</span>
                            <span class="blue-box option-box">냉장1</span>
                        </div>
                        <div class="goodsSub">
                            <p>판다의 치킨 브리또</p>
                        </div>
                        <div class="toBottom">
                            <p class="priceNum"><span>22,950</span>원 / <small>2</small>개</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="goods-wrap">
                <div class="goods-header">
                    <p class="pickUp-num">
                        픽업번호 : <span>12345</span>
                    </p>
                    <p class="counting">
                        남은시간<span>15:20:11</span>
                    </p>
                </div>
                <div class="goods-item">
                    <div class="img-box"></div>
                    <div class="word-box">
                        <div class="box-header">
                            <span class="store-name">군자점</span>
                            <span class="blue-box option-box">냉장1</span>
                        </div>
                        <div class="goodsSub">
                            <p>판다의 치킨 브리또</p>
                        </div>
                        <div class="toBottom">
                            <p class="priceNum"><span>22,950</span>원 / <small>2</small>개</p>
                        </div>
                    </div>
                </div>
                <div class="goods-item">
                    <div class="img-box"></div>
                    <div class="word-box">
                        <div class="box-header">
                            <span class="store-name">군자점</span>
                            <span class="green-box option-box">냉동1</span>
                        </div>
                        <div class="goodsSub">
                            <p>판다의 치킨 브리또</p>
                        </div>
                        <div class="toBottom">
                            <p class="pickUp-status">픽업완료</p>
                            <p class="priceNum"><span>22,950</span>원 / <small>1</small>개</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        if( $('.ppGoods-content .goods-wrap').length == 0 ) {
            $('.ppGoods-content .goodsList-container').append('<p class="none-list">구매한 상품이 없습니다.</p>');
        }
    </script>
@endsection
