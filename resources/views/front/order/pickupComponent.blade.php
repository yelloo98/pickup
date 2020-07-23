@if(count($orderList) > 0)
    @foreach($orderList as $k => $v)
        <div class="goods-wrap goods-{{$_GET['page'] ?? ''}}" onclick="PickupCommon.pageMove('/front/order/detail/{{$v->id ?? 0}}')">
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
    @endforeach
@endif
