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
                            <div class="img-box">
                                <img class="cart-ico" src="/front/dist/img/icon_cart_box.png" alt="">
                                {{--<div class="outOfStock"><p>품절</p></div>--}}
                            </div>
                            <div class="price-box">
                                <span class="percent">SALE</span>
                                <p>22,950</p>
                                <small>29,000</small>
                            </div>
                            <div class="item-subject">
                                <p>쫀똑한 수제 산딸기 브라우니</p>
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
