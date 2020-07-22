@if(count($eventList) > 0)
    @foreach($eventList as $k => $v)
    <li class="itemCnt" onclick="location.href='/front/board/event/{{$v->id ?? 0}}'">
        <div class="listUp-warpper">
            <p class="listUp-text" style="-webkit-box-orient: vertical;">@if($v->type == 'store_owner')<strong>[<span>{{$v->fc_trader->companyName ?? ''}}</span>]</strong>@endif {{$v->title ?? ''}}</p>
            <small class="listUp-date">{{$v->created_at ?? ''}}</small>
        </div>
        <img src="/front/dist/img/icon_arrow_MR.png" alt="">
    </li>
    @endforeach
@endif
