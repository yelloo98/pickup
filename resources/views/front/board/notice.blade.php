@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-content">
        <input type="hidden" name="listCnt" value="{{$noticeListCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        <div class="listUp-container">
            <ul>
                @forelse($noticeList as $k => $v)
                <li class="itemCnt" onclick="PickupCommon.pageMove('/front/board/notice/{{$v->id ?? 0}}')">
                    <div class="listUp-warpper">
                        <p class="listUp-category">[<span>{{$v->category ?? ''}}</span>]</p>
                        <p class="listUp-text" style="-webkit-box-orient: vertical;">{{$v->title ?? ''}}</p>
                        <small class="listUp-date">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</small>
                    </div>
                    <img src="/front/dist/img/icon_arrow_MR.png" alt="">
                </li>
                @empty
                <p class="none-list">등록된 공지사항이 없습니다.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageNotice = {
            getNoticeComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/board/notice/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
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
                            pageNotice.getNoticeComponent();
                        }
                    }
                }
            });
        });
    </script>
@endsection
