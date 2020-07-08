@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body wish-content">
        <div class="subMenu-container">
            <div class="sub-txt">관심상품은 최대 90일간 보관됩니다.</div>
            <div class="total-info">
                <p>전체<strong><span @if($product_like->count() > 0) class="colorNum" @endif>{{$product_like->count()}}</span>개</strong></p>
                <button class="clear" onclick="PickupCommon.productLike('', 'delete_all')">전체삭제</button>
            </div>
        </div>
        <div class="wishList-container">
            @forelse($product_like as $k => $v)
            <div class="wish-wrapper wish-wrapper-{{$v->product->id}}">
                <button class="delete-list" onclick="PickupCommon.productLike('{{$v->product->id ?? 0}}', 'delete')"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
                <div class="word-box" onclick="location.href='/front/product/detail/{{$v->product->id ?? 0}}'">
                    <div class="toTop">
                        <p><span>{{$v->product->fc_trader->companyName ?? ''}}</span></p>
                    </div>
                    <div class="menuInfo">
                        <p>{{$v->product->origin_product->name ?? ''}}</p>
                    </div>
                    <div class="price">
                        <p class="priceNum"><span>{{number_format($v->product->price ?? 0)}}</span>원</p>
                    </div>
                </div>
            </div>
            @empty
            <p class="none-list">등록된 상품이 없습니다.</p>
            @endforelse
        </div>

    </div>
@endsection
@section('script')
@endsection
