@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn" onclick="javascript:history.back()">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">매장 문의</p>
        </div>
    </header>
@endsection
@section('content')
    <div class="goodsSelect-container">
        <select name="" id="" class="noneVal">
            <option value="" hidden>문의유형을 선택해주세요.</option>
            <option value="">매장문의</option>
            <option value="">기기문의</option>
            <option value="">기타문의</option>
        </select>
        <img class="fake-arrow" src="/front/dist/img/icon_select01.png" alt="">
    </div>
    <div class="goodsWord-container">
        <textarea class="noneCheck" name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="fixed-footer full-btn">
        <button>Q&A 등록하기</button>
    </div>
@endsection
@section('script')
@endsection