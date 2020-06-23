@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body attention-content">
        <div class="storeList-container">
            <div class="list-wrapper">
                <button class="delete-list"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box">
                    <div class="store-category">
                        <span>군자점</span>
                    </div>
                    <div class="store-address">
                        <p>경기도 성남시 중현구 양원로 111번길</p>
                    </div>
                    <small>02)234-1234</small>
                </div>
            </div>
            <div class="list-wrapper">
                <button class="delete-list"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box">
                    <div class="store-category">
                        <span>군자점</span>
                    </div>
                    <div class="store-address">
                        <p>부산광역시 강서구 녹산산단382로14번가길 10~29번지(송정동)</p>
                    </div>
                    <small>02)234-1234</small>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
