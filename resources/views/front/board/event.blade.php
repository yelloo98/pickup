@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-content">
        <div class="listUp-container">
            <ul>
                @forelse($eventList as $k => $v)
                <li onclick="location.href='/front/board/event/{{$v->id ?? 0}}'">
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
@endsection
