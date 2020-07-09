@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoods-content">
        <div class="subEtc-container">
            <p>시간안에 상품을 픽업해주시기 바랍니다.</p>
        </div>
        <div class="goodsList-container">
            @forelse($orderList as $k => $v)
                <div class="goods-wrap" onclick="location.href='/front/mypage/order/{{$v->id ?? 0}}'">
                    <div class="goods-header">
                        <p class="pickUp-num">
                            픽업번호 : <span>{{$v->pickup_num ?? ''}}</span>
                        </p>
                        <p class="counting">
                            남은시간<span id="time_{{$v->id ?? 0}}"></span>
                            <input type="hidden" name="time" value="{{$v->until_second ?? 0}}">
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
                                    @if($v->status == 'done')<p class="pickUp-status">픽업완료</p>@endif
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
    <script>
        $('.goods-wrap').each(function () {
            var id = $(this).find('.counting').children('span').attr('id');
            var time = $(this).find("input[name='time']").val();
            countdown(id, time, this);
        });

        function countdown(elementId, seconds, obj ){
            var element, endTime, hours, mins, msLeft, time;

            function updateTimer(){
                msLeft = endTime - (+new Date);
                if ( msLeft <= 0 ) {
                    $(obj).find('.counting').children('span').text('시간초과');
                } else {
                    time = new Date( msLeft );
                    hours = time.getUTCHours();
                    mins = time.getUTCMinutes();
                    element.innerHTML = (hours ? ('0' + hours).slice(-2) +  ':' + ('0' + mins).slice(-2) : mins) + ':' + ('0' + time.getUTCSeconds()).slice(-2);
                    setTimeout( updateTimer, time.getUTCMilliseconds());
                }
            }

            element = document.getElementById( elementId );
            endTime = (+new Date) + 1000 * seconds;
            updateTimer();
        }
    </script>
@endsection
