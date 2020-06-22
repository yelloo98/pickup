@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoods-content">
        <div class="subEtc-container">
            <p>시간안에 상품을 픽업해주시기 바랍니다.</p>
        </div>
        <div class="goodsList-container">
            <div class="goods-wrap">
                <div class="img-box"></div>
                <div class="word-box">
                    <p class="codeNum">1234-1234-1234</p>
                    <div class="goodsSub">
                        <p><span>군자군자점</span>판다의 치킨 브리또</p>
                    </div>
                    <div class="toBottom">
                        <p class="counting">남은시간<span>15:30:11</span></p>
                        <p class="priceNum"><span>22,950</span>원</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
