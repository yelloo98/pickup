@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body allPickup-content">
        <div class="subMenu-container">
            <div class="select-box">
                <select name="searchSort" class="listUp-btn">
                    <option value="created_at">최신순</option>
                    <option value="hit">인기순</option>
                    <option value="lately">최근 본 상품</option>
                </select>
            </div>
        </div>
        <div class="pickupList-container">
            <div class="machine-tabWrapper">
                <ul class="machine-tab">
                    <li class="active">ALL</li>
                    @foreach($deviceList as $k => $v)
                    <li>기기{{$k+1}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="machine-tabItem">
                <ul class="machine-list">
                    <li class="active">
                    @forelse($productList as $k => $v)
                        <div class="machine-item" onclick="location.href='/front/product/{{$v->product_id ?? 0}}'">
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
