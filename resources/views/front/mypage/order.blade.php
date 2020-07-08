@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoods-content">
        <div class="subEtc-container">
            <p>시간안에 상품을 픽업해주시기 바랍니다.</p>
        </div>
        <div class="goodsList-container">
            @forelse($orderList as $k => $v)
            <div class="goods-wrap" onclick="location.href='/'">
                <div class="goods-header">
                    <p class="pickUp-num">
                        픽업번호 : <span>{{$v->pickup_num ?? ''}}</span>
                    </p>
                    <p class="counting">
                        남은시간<span id="timer"></span>
                        <input type="hidden" name="time" value="{{$v->pickup_until_at}}">
                    </p>
                </div>
                @forelse($v->productList as $kk => $vv)
                <div class="goods-item">
                    <div class="img-box" @if(!empty($vv->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$vv->product->origin_product->image_path}}')" @endif></div>
                    <div class="word-box">
                        <div class="box-header">
                            <span class="store-name">{{$vv->product->fc_trader->companyName ?? ''}}</span>
                            {!! \App\Helper\Codes::deviceType($vv->device->frozen_type ?? '') !!}
                        </div>
                        <div class="goodsSub">
                            <p>{{$vv->product->origin_product->name ?? ''}}</p>
                        </div>
                        <div class="toBottom">
                            <p class="priceNum"><span>{{number_format($vv->product->price ?? 0)}}</span>원 / <small>{{$vv->count ?? 0}}</small>개</p>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            @empty
            <p class="none-list">구매한 상품이 없습니다.</p>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script src="/front/dist/lib/moment/js/moment.min.js"></script>
    <script src="/front/dist/lib/moment/js/moment-timezone-with-data.js"></script>
    <script>
        $(document).ready(function () {
             // 타이머 1초간격으로 수행
            tid = setInterval('msg_time()', 1000);
        });

        function msg_time() {
            var stDate = moment(new Date()).tz('Asia/Baku').format('Y-MM-DDTHH:mm:ss');
            var edDate = moment($("input[name='time']").val()).format('Y-MM-DDTHH:mm:ss');
            var RemainDate = moment(edDate,"YYYY-MM-DDTHH:mm:ssZ").diff(moment(stDate,"YYYY-MM-DDTHH:mm:ssZ"));

            var hours = Math.floor((RemainDate % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var miniutes = Math.floor((RemainDate % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((RemainDate % (1000 * 60)) / 1000);

            m = addzero(hours) + ":" + addzero(miniutes) + ":" + addzero(seconds); // 남은 시간 text형태로 변경
            $('#timer').text(m);

            if (RemainDate < 0) {
                clearInterval(tid);   // 타이머 해제
                $('#timer').text('시간초과');
            } else {
                RemainDate = RemainDate - 1000; // 남은시간 -1초
            }
        }

        // 1자리수의 숫자인 경우 앞에 0을 붙여준다.
        function addzero(num) {
            if(num < 10) { num = "0" + num; }
            return num;
        }
    </script>
@endsection
