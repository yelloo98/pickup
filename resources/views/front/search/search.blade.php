@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body productSearch">
        <div class="search-container">
            <div class="btn-box">
                <div class="order-item">
                    <input type="text" name="searchText" value="{{$_GET['searchText'] ?? ''}}" placeholder="검색어를 입력해 주세요" onkeypress="if(event.keyCode==13) {pageSearch.urlLink(); return false;}">
                </div>
                <button onclick="pageSearch.urlLink()"><img src="/front/dist/img/icon_search_B.png" alt=""></button> <!-- 이미지 변경 -->
            </div>
        </div>
        <div class="goods-container">
            @if(!empty($productList) && $productList->count() > 0)
            <div class="content-box">
{{--                <div class="distance-area">1km 이내</div>--}}
                <div class="content-area">
                    @foreach($productList as $k=>$v)
                        <div class="contentItem" onclick="location.href = '/front/product/{{$v->product_id}}?device_id={{$v->device_id}}'">
                            <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif>
                                @if(($v->slot_status ?? '') != 'DP-COMPLETE' || ($v->use_status ?? '') != 'use' || ($v->inserted_amount ?? '') <= ($v->sale_amount ?? ''))
                                <div class="outOfStock">
                                    <p>품절</p>
                                </div>
                                @endif
                            </div>
                            <p><span class="storeTxt">{{$v->product->fc_trader->companyName ?? ''}}</span><span class="priceTxt">{{number_format($v->product->price ?? 0)}}</span></p>
                            <p class="titleBlock">{{$v->product->origin_product->name ?? ''}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <p class="none-list">주변 매장이 없습니다.</p>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageSearch = {
            urlLink: function () {
                var url = '/front/search?';
                if($('input[name="searchText"]').val()){
                    url = url + '&searchText='+ $('input[name="searchText"]').val();
                }
                location.href = url;
            }
        }

        var searchWidth = $('.img-box').outerWidth();
        $('.img-box').css('height',searchWidth);



        if( $('.productSearch .content-box').length == 0 ) {
            $('.productSearch .goods-container').append('<p class="none-list">주변 매장이 없습니다.</p>');
        }
    </script>
@endsection
