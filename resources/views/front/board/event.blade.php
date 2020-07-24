@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-content">
        <div class="listUp-container">
            <input type="hidden" name="listCnt" value="{{$eventListCnt ?? 0}}">
            <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
            <ul>
                @forelse($eventList as $k => $v)
                <li class="itemCnt" onclick="PickupCommon.pageMove('/front/board/event/{{$v->id ?? 0}}')">
                    <div class="listUp-warpper">
                        <p class="listUp-text" style="-webkit-box-orient: vertical;">@if($v->type == 'store_owner')<strong>[<span>{{$v->fc_trader->companyName ?? ''}}</span>]</strong>@endif {{$v->title ?? ''}}</p>
                        <small class="listUp-date">{{$v->created_at ?? ''}}</small>
                    </div>
                    <img src="/front/dist/img/icon_arrow_MR.png" alt="">
                </li>
                @empty
                <p class="none-list">등록된 이벤트가 없습니다.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageEvent = {
            getEventComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/board/event/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res != ''){
                                $('.content-body .listUp-container ul').append(res);
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
                        if($('.itemCnt').length < $('input[name=listCnt]').val()){
                            pageEvent.getEventComponent();
                        }
                    }
                }
            });
        });
    </script>
@endsection
