@if(count($orderList) > 0)
    @foreach($orderList as $k => $v)
        <div class="pickup-wrapper" onclick="pageOrder.selButton({{$v->id ?? 0}})">
            <div class="word-box">
                <div class="date">
                    <p><span>{{(!empty($v->created_at))? date_format($v->created_at,'Y-m-d') : ''}}</span> / <span>{{$v->pickup_num ?? ''}}</span></p>
                    <button type="button"><img src="/front/dist/img/icon_next.png" alt=""></button>
                </div>
                <div class="storeInfo">
                    <span>{{$v->productList->first()->product->fc_trader->companyName ?? ''}} @if($v->storeCnt > 0) 외{{$v->storeCnt}} @endif</span>
                </div>
                <div class="goods-name">
                    <p>{{$v->productList->first()->product->origin_product->name ?? ''}}  @if($v->productList->count() > 1) 외 {{$v->productList->count()-1}} @endif</p>
                </div>
                <div class="price">
                    <div class="goods-status">
                        <p class="select-status">{{\App\Helper\Codes::orderStatus($v->status ?? '')}}</p>
                        @if(($v->status ?? '') == 'pay')
                            <button class="cancelBtn">결제취소<img src="/front/dist/img/icon_next_s.png"/></button>
                        @endif
                    </div>
                    <p class="priceNum"><span>{{number_format($v->price ?? 0)}}</span>원</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
