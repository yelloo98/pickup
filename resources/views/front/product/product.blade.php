@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body allPickup-content">
        <div class="subMenu-container">
            <div class="select-box">
                <select name="searchSort" class="listUp-btn" onchange="pageProduct.urlLink()">
                    <option @if(empty($_GET['searchType'])) selected @endif value="">최신순</option>
                    <option @if(($_GET['searchSort'] ?? '') == 'hit') selected @endif value="hit">인기순</option>
                    <option @if(($_GET['searchSort'] ?? '') == 'lately') selected @endif value="lately">최근 본 상품</option>
                </select>
            </div>
        </div>
        <div class="pickupList-container">
            <div class="machine-tabWrapper">
                <input type="hidden" name="searchDevice" value="{{$_GET['searchDevice'] ?? ''}}"/>
                <ul class="machine-tab">
                    <li @if(empty($_GET['searchDevice'])) class="active" @endif onclick="pageProduct.searchDevice()">ALL</li>
                    @foreach($deviceList as $k => $v)
                    <li @if(($_GET['searchDevice'] ?? '') == $v->id) class="active" @endif onclick="pageProduct.searchDevice({{$v->id}})">기기{{$k+1}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="machine-tabItem">
                <ul class="machine-list">
                    <li class="active">
                    @forelse($productList as $k => $v)
                        <div class="machine-item" onclick="pageProduct.selProduct({{$v->product_id ?? 0}})">
                            <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}')" @endif>
                                @if(($v->slot_status ?? '') == 'DP-COMPLETE' && ($v->use_status ?? '') == 'use' && ($v->inserted_amount ?? '') > ($v->sale_amount ?? ''))
                                <img class="cart-ico" src="/front/dist/img/icon_cart_box.png" alt="">
                                @else
                                <div class="outOfStock"><p>품절</p></div>
                                @endif
                            </div>
                            <div class="price-box">
                                @if(($v->product->price ?? '') == ($v->product->origin_product->price_cost ?? '') || ($v->product->price ?? '') > ($v->product->origin_product->price_cost ?? ''))
                                <p>{{number_format($v->product->price ?? 0)}}</p>
                                @else
                                <span class="percent">SALE</span>
                                <p>{{number_format($v->product->price ?? 0)}}</p>
                                <small>{{number_format($v->product->origin_product->price_cost ?? 0)}}</small>
                                @endif
                            </div>
                            <div class="item-subject">
                                <p>{{$v->product->origin_product->name ?? ''}}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.front.footer')
@endsection
@section('script')
    <script>
        var pageProduct = {
            _config : {},

            //# 상품 선택
            selProduct : function (product_id) {
                var $target = $(event.target);
                if($target.is("img")) {
                    PickupCommon.selProduct(product_id, 'cart');
                }else{
                    location.href = '/front/product/' + product_id;
                }
            },

            //# 기기 선택
            searchDevice : function(val) {
                $('input[name="searchDevice"]').val(val);
                pageProduct.urlLink();
            },

            //# URL 이동
            urlLink : function () {
                var url = '/front/product?';

                //# 정렬
                if($('select[name="searchSort"]').val()){
                    url = url + '&searchSort='+ $('select[name="searchSort"]').val();
                }
                //# 기기
                if($('input[name="searchDevice"]').val()){
                    url = url + '&searchDevice='+ $('input[name="searchDevice"]').val();
                }
                location.href = url;
            }
        };

        $(document).ready(function(){
            var machineItem = $('.machine-tabItem .img-box').outerWidth();
            $('.machine-tabItem .img-box').css('height',machineItem);

            $('.machine-tab li').click(function(){
                $(this).addClass('active').siblings('li').removeClass('active');
                var machineTarget = $(this).index();
                $('.machine-list li').eq(machineTarget).addClass('active').siblings('li').removeClass('active');
            });

        });
    </script>
@endsection
