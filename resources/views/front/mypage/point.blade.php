@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body reward">
        <div class="card-container">
            <div class="main-box">
                <p class="nickName"><span>{{$customer->name ?? ''}}님의</span>적립금</p>
                <p class="totalPrice"><span>{{number_format($customer->point ?? 0)}}</span>p</p>
            </div>
            <div class="sub-box">
                <div class="sub-content">
                    <div class="reward-name">총 사용 적립금</div>
                    <div class="reward-price">{{number_format($use_point ?? 0)}}</div>
                </div>
                <div class="sub-content">
                    <div class="reward-name">소멸 예정 적립금</div>
                    <div class="reward-price">{{number_format($dis_point ?? 0)}}</div>
                </div>
            </div>
        </div>
        <div class="content-section">
            <div class="listTitle-box">
                <p>적립/사용내역</p>
            </div>
            @forelse($pointList as $k => $v)
                @if($v->type == 'use')
                <div class="list-box useCoin">
                    <p class="rewardDate">{{date_format($v->created_at,'Y-m-d')}}</p>
                    <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>사용</p>
                </div>
                @elseif($v->type == 'cancel')
                <div class="list-box useCoin">
                    <p class="rewardDate">{{date_format($v->created_at,'Y-m-d')}}</p>
                    <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>취소</p>
                </div>
                @else
                <div class="list-box">
                    <p class="rewardDate">{{date_format($v->created_at,'Y-m-d')}}</p>
                    <p class="rewardCoin"><span>{{number_format($v->point ?? 0)}}P</span>적립</p>
                </div>
                @endif
            @empty
                <p class="none-list">적립/사용내역이 없습니다.</p>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
@endsection
