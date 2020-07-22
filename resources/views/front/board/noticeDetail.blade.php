@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-detailContent">
        <div class="listUp-container">
            <div class="listUp-header">
                <p class="listUp-title">[{{$notice->category ?? ''}}] {{$notice->title ?? ''}}</p>
                <small class="listUp-date">{{($notice->created_at)? date_format($notice->created_at,'Y-m-d') : ''}}</small>
            </div>
            <div class="listUp-text">
            <pre>{{$notice->contents ?? ''}}</pre>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
