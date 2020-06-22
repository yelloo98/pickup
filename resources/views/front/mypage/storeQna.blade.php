@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body write-content">
        <input type="hidden" name="store_id" value="{{$store->id ?? 0}}">
        <div class="goodsSelect-container">
            <select name="category" class="noneVal">
                <option value="" hidden>문의유형을 선택해주세요.</option>
                <option value="store">매장문의</option>
                <option value="device">기기문의</option>
                <option value="etc">기타문의</option>
            </select>
            <img class="fake-arrow" src="/front/dist/img/icon_select01.png" alt="">
        </div>
        <div class="goodsWord-container">
            <textarea class="noneCheck" name="contents" cols="30" rows="10"></textarea>
        </div>
        <div class="fixed-footer full-btn">
            <button onclick="PickupCommon.qnaStore()">Q&A 등록하기</button>
        </div>
    </div>
@endsection
@section('script')
@endsection
