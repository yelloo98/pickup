@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body attention-content">
        <input type="hidden" name="listCnt" value="{{$storeListCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        @forelse($storeList as $k=>$v)
        <div class="storeList-container storeList-{{$v->fc_trader->traderNo ?? 0}}">
            <div class="list-wrapper">
                <button class="delete-list" onclick="PickupCommon.storeLike('{{$v->fc_trader->traderNo ?? 0}}', 'delete')"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box" onclick="PickupCommon.pageMove('/front/main?store_id={{$v->fc_trader->traderNo ?? 0}}')">
                    <div class="store-category">
                        <span>{{$v->fc_trader->companyName ?? ''}}</span>
                    </div>
                    <div class="store-address">{{$v->fc_trader->address ?? ''}}</div>
                    <small>{{\App\Helper\Codes::formatPhone($v->fc_trader->tel ?? '')}}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="storeList-container">
            <p class="none-list">관심매장이 없습니다.</p>
        </div>
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        var pageStore = {
            getStoreComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/mypage/store/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res != ''){
                                $('.content-body .storeList-container').append(res);
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
                        if($('.storeList-container').length < $('input[name=listCnt]').val()){
                            pageStore.getStoreComponent();
                        }
                    }
                }
            });
        });
    </script>
@endsection
