@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body photo-content">
        <div class="review-container">
            @foreach($photoReviewList as $k=>$v)
            <div class='review-item' style="background-image: url('{{env('IMAGE_URL').$v->img1}}')"></div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var reviewWidth = $('.review-item').outerWidth();
            $('.review-item').css('height',reviewWidth);
        });
    </script>
@endsection
