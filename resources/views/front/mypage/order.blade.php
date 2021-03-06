@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickup-content">
        <input type="hidden" name="listCnt" value="{{$orderListCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        <div class="subMenu-container">
            <div class="select-box">
                <select name="searchType" id="" class="listUp-btn" onchange="location.href='/front/mypage/order?searchType='+this.value">
                    <option value="" @if(empty($_GET['searchType'])) selected @endif onclick="location.href='/front/mypage/order'">전체보기</option>
                    <option value="pay" @if(!empty($_GET['searchType']) && $_GET['searchType'] == 'pay') selected @endif>결제완료/픽업대기</option>
                    <option value="wait" @if(!empty($_GET['searchType']) && $_GET['searchType'] == 'wait') selected @endif>결제대기</option>
                    <option value="cancel" @if(!empty($_GET['searchType']) && $_GET['searchType'] == 'cancel') selected @endif>결제취소</option>
                    <option value="p_cancel" @if(!empty($_GET['searchType']) && $_GET['searchType'] == 'p_cancel') selected @endif>부분취소</option>
                    <option value="done" @if(!empty($_GET['searchType']) && $_GET['searchType'] == 'done') selected @endif>픽업완료</option>
                </select>
            </div>
        </div>
        <div class="pickupList-container">
        @forelse($orderList as $k => $v)
            <div class="pickup-wrapper" onclick="pageOrder.selButton({{$v->id ?? 0}})">
                <div class="word-box">
                    <div class="date">
                        <p><span>{{(!empty($v->created_at))? date_format($v->created_at,'Y-m-d') : ''}}</span> / <span>{{$v->pickup_num ?? ''}}</span></p>
                        <button type="button"><img src="/front/dist/img/icon_next.png" alt=""></button>
                    </div>
                    <div class="storeInfo">
                        <span>{{$v->productList->first()->product->fc_trader->companyName ?? ''}} @if($v->storeCnt > 0) 외{{$v->storeCnt}} @endif</span>
                    </div>
                    <div class="goods-name">
                        <p>{{$v->productList->first()->product->origin_product->name ?? ''}}  @if($v->productList->count() > 1) 외 {{$v->productList->count()-1}} @endif</p>
                    </div>
                    <div class="price">
                        <div class="goods-status">
                            <p class="select-status">{{\App\Helper\Codes::orderStatus($v->status ?? '')}}</p>
                            @if(($v->status ?? '') == 'pay')
                            <button class="cancelBtn">결제취소<img src="/front/dist/img/icon_next_s.png"/></button>
                            @endif
                        </div>
                        <p class="priceNum"><span>{{number_format($v->price ?? 0)}}</span>원</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="none-list">해당내역이 없습니다.</p>
        @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageOrder = {
            selButton : function (id) {
                var $target = $(event.target);
                if($target.is(".cancelBtn")) {
                    //# 버튼 클릭
                    pageModal.alertPopup('준비중입니다.');
                }else{
                    PickupCommon.pageMove('/front/order/detail/' + id);
                }
            },

            getOrderComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/mypage/order/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res != ''){
                                $('.content-body .pickupList-container').append(res);
                                PickupCommon._config.scrollAction = true;
                                result = true;
                            }else{
                                result = false;
                            }
                        });
                        if(!result){
                            PickupCommon._config.page--;
                        }
                        pageModal.closeProgressPopup();
                    }catch(e){
                        PickupCommon._config.page--;
                        pageModal.closeProgressPopup();
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
                        if($('.pickup-wrapper').length < $('input[name=listCnt]').val()){
                            pageOrder.getOrderComponent();
                        }
                    }
                }
            });
        });
    </script>
@endsection
