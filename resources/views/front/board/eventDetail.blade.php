@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-detailContent">
        <div class="listUp-container">
            <div class="listUp-header">
                <p class="listUp-title">{{$event->title ?? ''}}</p>
                <small class="listUp-date">{{($event->created_at)? date_format($event->created_at,'Y-m-d') : ''}}</small>
            </div>
            <div class="listUp-text">
                <pre>{{$event->contents ?? ''}}</pre>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
