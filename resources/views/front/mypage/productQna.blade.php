@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body write-content">
        <input type="hidden" name="product_id" value="{{$_GET['product_id'] ?? 0}}">
        <div class="goodsHeader-container">
            <div class="img-box" @if(!empty($product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$product->origin_product->image_path}}'); background-size:cover;" @endif></div>
            <div class="word-box">
                <p class="goods-subject">{{$product->origin_product->name ?? ''}}</p>
                <div class="goods-price"><p><span>{{number_format($product->price ?? 0)}}</span>원</p></div>
            </div>
        </div>
        <div class="goodsSelect-container">
            <select name="category" @if(empty($productQna->category)) class="noneVal" @endif>
                <option value="" hidden>문의유형을 선택해주세요.</option>
                <option value="product" @if(($productQna->category ?? '') == 'product') selected @endif>상품문의</option>
                <option value="delivery" @if(($productQna->category ?? '') == 'delivery') selected @endif>배송문의</option>
                <option value="pay" @if(($productQna->category ?? '') == 'pay') selected @endif>결제문의</option>
                <option value="device" @if(($productQna->category ?? '') == 'device') selected @endif>기기문의</option>
                <option value="etc" @if(($productQna->category ?? '') == 'etc') selected @endif>기타문의</option>
            </select>
            <img class="fake-arrow" src="/front/dist/img/icon_select01.png" alt="">
        </div>
        <div class="goodsWord-container">
            <textarea name="contents" cols="30" rows="10">{{$productQna->contents ?? ''}}</textarea>
            <div class="checkbox-wrap">
                <input type="checkbox" id="secret" name="secret" @if(($productQna->secret ?? '') == 'Y') checked @endif/>
                <label for="secret"><span class="checkbox-custom"></span><span class="checkbox-label">비밀글 쓰기</span></label>
            </div>
        </div>
        <div class="fixed-footer full-btn">
            @if(!empty($productQna))
            <button onclick="PickupCommon.qnaProduct('{{$productQna->id ?? 0}}', 'update')">Q&A 수정하기</button>
            @else
            <button onclick="PickupCommon.qnaProduct()">Q&A 등록하기</button>
            @endif
        </div>
    </div>
@endsection
@section('script')
@endsection
