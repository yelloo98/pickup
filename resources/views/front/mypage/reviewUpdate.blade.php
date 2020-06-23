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
        <div class="goodsScore-container starArea">
        <span class="star-input">
            <output for="star-input"><b>0.0</b></output>
            <span class="input">
                <input type="radio" name="star-input" id="p1" value="1"><label for="p1">0.5</label>
                <input type="radio" name="star-input" id="p2" value="2"><label for="p2">1.0</label>
                <input type="radio" name="star-input" id="p3" value="3"><label for="p3">1.5</label>
                <input type="radio" name="star-input" id="p4" value="4"><label for="p4">2.0</label>
                <input type="radio" name="star-input" id="p5" value="5"><label for="p5">2.5</label>
                <input type="radio" name="star-input" id="p6" value="6"><label for="p6">3.0</label>
                <input type="radio" name="star-input" id="p7" value="7"><label for="p7">3.5</label>
                <input type="radio" name="star-input" id="p8" value="8"><label for="p8">4.0</label>
                <input type="radio" name="star-input" id="p9" value="9"><label for="p9">4.5</label>
                <input type="radio" name="star-input" id="p10" value="10"><label for="p10">5.0</label>
            </span>
        </span>
        </div>
        <div class="goodsWord-container starArea">
            <textarea class="hasPhoto" name="" id="" cols="30" rows="10" placeholder="상품 후기를 작성해주세요."></textarea>
            <div class="upload-btn">
                <input type="file">
                <label for="">
                    <button class="delete-btn"><img src="/front/dist/img/icon_image_x.png" alt=""></button>
                </label>
            </div>
        </div>
        <div class="fixed-footer">
            <button class="cancel">취소</button>
            <button>수정</button>
        </div>
    </div>
@endsection
@section('script')
@endsection
