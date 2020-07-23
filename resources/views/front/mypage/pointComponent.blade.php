@if(count($pointList) > 0)
    @foreach($pointList as $k => $v)
        @if($v->type == 'use')
        <div class="list-box useCoin">
            <p class="rewardDate">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</p>
            <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>사용</p>
        </div>
        @elseif($v->type == 'cancel')
        <div class="list-box useCoin">
            <p class="rewardDate">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</p>
            <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>취소</p>
        </div>
        @else
        <div class="list-box">
            <p class="rewardDate">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</p>
            <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>적립</p>
        </div>
        @endif
    @endforeach
@endif
