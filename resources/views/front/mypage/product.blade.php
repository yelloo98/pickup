@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body wish-content">
        <input type="hidden" name="listCnt" value="{{$productListCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        <div class="subMenu-container">
            <div class="sub-txt">관심상품은 최대 90일간 보관됩니다.</div>
            <div class="total-info">
                <p>전체<strong><span @if(($productListCnt ?? 0) > 0) class="colorNum" @endif>{{$productListCnt ?? 0}}</span>개</strong></p>
                <button class="clear" onclick="PickupCommon.productLike('', 'delete_all')">전체삭제</button>
            </div>
        </div>
        <div class="wishList-container">
            @forelse($productList as $k => $v)
            <div class="wish-wrapper wish-wrapper-{{$v->product->id}}">
                <button class="delete-list" onclick="PickupCommon.productLike('{{$v->product->id ?? 0}}', 'delete')"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
                <div class="word-box" onclick="PickupCommon.pageMove('/front/product/{{$v->product->id ?? 0}}')">
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
    <script>
        var pageProduct = {
            getProductComponent : function(){
                PickupCommon._config.page++;
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/mypage/product/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res == ''){
                                result = false;
                            }else{
                                $('.content-body .wishList-container').append(res);
                                PickupCommon._config.scrollAction = true;
                                result = true;
                            }
                        });
                        if(!result){
                            PickupCommon._config.page--;
                        }
                    }catch(e){
                        PickupCommon._config.page--;
                        PickupCommon._config.scrollAction = true;
                    }
                },300);
            }
        };

        $(document).ready(function(){
            PickupCommon._config.page = $('input[name=pageNum]').val();
            if(history.state != null){
                var pageHistory = history.state;
                var scrollTop = pageHistory['scrollTop'];
                $('html, body').animate({scrollTop : scrollTop}, 400);
            }

            $(window).scroll(function(){
                if(PickupCommon._config.scrollAction){
                    if (Math.round($(window).scrollTop() + $(window).height()) > $(document).height() - 100) {
                        PickupCommon._config.scrollAction = false;
                        //component 호출
                        if($('.wish-wrapper').length < $('input[name=listCnt]').val()){
                            pageProduct.getProductComponent();
                        }
                    }
                }
            });
        });
    </script>
@endsection
