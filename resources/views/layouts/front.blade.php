<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
    <meta name="format-detection" content="telephone=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? ''}}</title>

    <link rel="stylesheet" type="text/css" href="/front/dist/plugin/vendor.min.css">
    <link rel="stylesheet" type="text/css" href="/front/dist/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/front/dist/css/common.css">
    <link rel="stylesheet" type="text/css" href="/front/dist/css/style.css">

    <script type="text/javascript" src="/front/dist/lib/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('stylesheet'){{-- CSS : 페이지별 스타일 시트 --}}
    @yield('style')
</head>
<body class="{{$body_class ?? '@@class'}}">
<div class="wrapper">
    <input type="hidden" name="customer_id" value="{{$customer_id ?? 0}}">
    @include('layouts.front.header')
    @yield('content')
    @include('layouts.front.modal')
    @yield('footer')
</div>
</body>
<script type="text/javascript" src="/front/dist/plugin/vendor.min.js"></script>
<script type="text/javascript" src="/front/dist/js/common.js"></script>
<script type="text/javascript" src="/front/page/common.js"></script> <!-- 개발 스크립트 -->
@yield('script')
</html>
