@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body write-content">
        <div class="goodsHeader-container">
            <div class="img-box"></div>
            <div class="word-box">
                <p class="goods-subject">[국내산] 한돈설깃살 모듬구이용 루꼴라 샌드위치  모듬구이용 루꼴라 샌드위치 세트</p>
                <div class="goods-price"><p><span>22,950</span>원</p></div>
            </div>
        </div>
        <div class="goodsSelect-container">
            <select name="" id="" class="noneVal">
                <option value="" hidden>문의유형을 선택해주세요.</option>
                <option value="">상품문의</option>
                <option value="">배송문의</option>
                <option value="">결제문의</option>
                <option value="">픽업상품문의</option>
                <option value="">기타문의</option>
            </select>
            <img class="fake-arrow" src="img/icon_select01.png" alt="">
        </div>
        <div class="goodsWord-container">
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <div class="checkbox-wrap">
                <input type="checkbox" id="secret" name="secret"/>
                <label for="secret"><span class="checkbox-custom"></span><span class="checkbox-label">비밀글 쓰기</span></label>
            </div>
        </div>
        <div class="fixed-footer full-btn">
            <button>Q&A 등록하기</button>
        </div>
    </div>
@endsection
@section('script')
@endsection
