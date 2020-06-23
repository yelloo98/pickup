@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body reward">
        <div class="card-container">
            <div class="main-box">
                <p class="nickName"><span>신유미님의</span>적립금</p>
                <p class="totalPrice"><span>132,200</span>p</p>
            </div>
            <div class="sub-box">
                <div class="sub-content">
                    <div class="reward-name">총 사용 적립금</div>
                    <div class="reward-price">125,000</div>
                </div>
                <div class="sub-content">
                    <div class="reward-name">소멸 예정 적립금</div>
                    <div class="reward-price">50</div>
                </div>
            </div>
        </div>
        <div class="content-section">
            <div class="listTitle-box">
                <p>적립/사용내역</p>
            </div>
            <div class="list-box">
                <p class="rewardDate">2020-05-29</p>
                <p class="rewardCoin"><span>130P</span>적립</p>
            </div>
            <div class="list-box">
                <p class="rewardDate">2020-05-29</p>
                <p class="rewardCoin"><span>130P</span>적립</p>
            </div>
            <div class="list-box useCoin">
                <p class="rewardDate">2020-05-29</p>
                <p class="rewardCoin"><span>130P</span>사용</p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        if( $('.reward .list-box').length == 0 ) {
            $('.reward .content-section').append('<p class="none-list">적립/사용내역이 없습니다.</p>');
        }


    </script>
@endsection
