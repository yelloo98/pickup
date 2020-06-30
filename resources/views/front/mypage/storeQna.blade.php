@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body write-content">
        <input type="hidden" name="store_id" value="{{$_GET['store_id'] ?? 0}}">
        <div class="goodsSelect-container">
            <select name="category" @if(empty($productQna->category)) class="noneVal" @endif>
                <option value="" hidden>문의유형을 선택해주세요.</option>
                <option value="store" @if(($productQna->category ?? '') == 'store') selected @endif>매장문의</option>
                <option value="device" @if(($productQna->category ?? '') == 'device') selected @endif>기기문의</option>
                <option value="etc" @if(($productQna->category ?? '') == 'etc') selected @endif>기타문의</option>
            </select>
            <img class="fake-arrow" src="/front/dist/img/icon_select01.png" alt="">
        </div>
        <div class="goodsWord-container">
            <textarea class="noneCheck" name="contents" cols="30" rows="10">{{$productQna->contents ?? ''}}</textarea>
        </div>
        <div class="fixed-footer full-btn">
            @if(!empty($productQna))
            <button onclick="PickupCommon.qnaStore('{{$productQna->id ?? 0}}', 'update')">Q&A 수정하기</button>
            @else
            <button onclick="PickupCommon.qnaStore()">Q&A 등록하기</button>
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection
