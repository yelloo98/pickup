@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-content">
        <div class="listUp-container">
            <ul>
                @forelse($noticeList as $k => $v)
                <li onclick="location.href='/front/board/notice/{{$v->id ?? 0}}'">
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
@endsection
