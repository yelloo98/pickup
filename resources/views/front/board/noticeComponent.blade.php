@if(count($noticeList) > 0)
    @foreach($noticeList as $k => $v)
    <li class="itemCnt" onclick="PickupCommon.pageMove('/front/board/notice/{{$v->id ?? 0}}')">
        <div class="listUp-warpper">
            <p class="listUp-category">[<span>{{$v->category ?? ''}}</span>]</p>
            <p class="listUp-text" style="-webkit-box-orient: vertical;">{{$v->title ?? ''}}</p>
            <small class="listUp-date">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</small>
        </div>
        <img src="/front/dist/img/icon_arrow_MR.png" alt="">
    </li>
    @endforeach
@endif
