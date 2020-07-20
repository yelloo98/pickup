@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body orderDetail">
        <span class="status-text">{{\App\Helper\Codes::orderStatus($order->status ?? '')}}</span>
        <div class="pickup-header">
            <p class="pickup-number">픽업번호 :<span>{{$order->pickup_num ?? ''}}</span></p>
        </div>
        <div class="goods-container">
            <p class="container-title">주문상품</p>
            <div class="store-container">
                @foreach($productStore as $k=>$v)
                <div class="store-wrap">
                    <div class="store-title">
                        <span>{{$v->product->fc_trader->companyName ?? ''}}</span>
                        <p class="address">{{$v->product->fc_trader->address ?? ''}}</p>
                    </div>
                    @foreach($v->productList as $kk=>$vv)
                    <div class="container-content">
                        <div class="img-wrapper" @if(!empty($vv->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$vv->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
                        <div class="word-wrapper">
                            <div class="status-area">
                                <span class="blue-box">{{\App\Helper\Codes::deviceTypeText($vv->device->frozen_type ?? '').($vv->device->store_order_no ?? '')}}</span>
                                @if(($vv->status ?? '') == 'done')<p class="clear-text"><span>{{$vv->pickedup_at ?? ''}}</span>픽업완료</p>@endif
                            </div>
                            <div class="menu-area">
                                <p style="-webkit-box-orient: vertical;">{{$vv->product->origin_product->name ?? ''}}</p>
                            </div>
                            <div class="bottom-area">
                                <div class="price-box">
                                    <p class="priceNum"><span>{{number_format($vv->price ?? 0)}}</span>원</p>
                                    <p class="pricePer">/ <span>{{($vv->count ?? 0)}}</span>개</p>
                                </div>
                            </div>
                        </div>
                        @if(($vv->status ?? '') == 'auto_cance')
                        <div class="auto-cancel">
                            <p>키오스크에서의 상품이 품절되어 <span>자동취소</span> 되었습니다.</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <div class="barSection"></div>
        <div class="accordion-container @if(($order->status ?? '') != 'cancel' && ($order->status ?? '') != 'p_cancel') open-action @endif">
            <div class="container-title">
                <p>주문 상세 정보</p>
                <img src="/front/dist/img/icon_arrow_MD.png" alt="">
            </div>
            <div class="container-list">
                <div class="list-wrapper">
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문번호</li>
                                <li class="list-content"><span>{{$order->order_id ?? ''}}</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>주문일시</li>
                                <li class="list-content"><span>{{$order->created_at ?? ''}}</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>주문자</li>
                                <li class="list-content"><span>{{$order->order_name ?? ''}}</span></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="list-wrapper">
                    <div class="container-title">
                        <p>결제 정보</p>
                    </div>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문금액</li>
                                <li class="list-content"><span>{{number_format($orderProductSum ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>상품금액</li>
                                <li class="list-content"><span>{{number_format($orderProductSum ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>할인금액</li>
                                <li class="list-content">
                                    <span>
                                    @if(($v->product->price ?? '') < ($v->product->origin_product->price_cost ?? ''))
                                        {{number_format($v->product->origin_product->price_cost - $v->product->price)}}
                                    @else
                                        0
                                    @endif
                                    </span>원
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>쿠폰 사용</li>
                                <li class="list-content"><span>{{number_format($order->coupon->price ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>적립금 사용</li>
                                <li class="list-content"><span>{{number_format($order->use_point ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="focus">
                        <li>
                            <ul>
                                <li class='list-title'>총 결제금액</li>
                                <li class="list-content focus-content"><span>{{number_format($order->price ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>지급 예정 적립금</li>
                                <li class="list-content"><span>{{number_format(($order->price ?? 0) * 0.01)}}</span>원</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="list-wrapper">
                    <div class="container-title">
                        <p>결제 수단</p>
                    </div>
                    <ul>
                        @if($order->approve_type == 'card')
                        <li>
                            <ul>
                                <li class='list-title'>결제수단</li>
                                <li class="list-content"><span>신용카드</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>카드회사</li>
                                <li class="list-content"><span>현대카드</span></li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <ul>
                                <li class='list-title'>결제수단</li>
                                <li class="list-content"><span>자동결제</span></li>
                            </ul>
                        </li>
                        @endif
                        <li>
                            <ul>
                                <li class='list-title'>결제시간</li>
                                <li class="list-content"><span>{{$order->created_at ?? ''}}</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>결제금액</li>
                                <li class="list-content"><span>{{number_format($order->price ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if(($order->status ?? '') == 'cancel')
        <div class="barSection"></div><!-- 취소영역있을시 show -->
        <div class="accordion-container open-action"><!-- 취소시 show -->
            <div class="container-title">
                <p>취소 금액 정보</p>
                <img src="/front/dist/img/icon_arrow_MD.png" alt="">
            </div>
            <div class="container-list">
                <div class="list-wrapper">
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>주문금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <ul>
                                <li class='list-title'>할인금액</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>쿠폰사용</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class='list-title'>적립금 사용</li>
                                <li class="list-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="focus custom-border">
                        <li>
                            <ul>
                                <li class='list-title'>취소된 금액</li>
                                <li class="list-content focus-content"><span>12,500</span>원</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="alert-text"><!-- 자동취소시 show -->
                        <p><span>픽업 가능시간 초과</span>되어 <strong>결제가 자동취소</strong> 되었습니다.</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="fixed-footer full-btn">
            <button class="okBtn" onclick="javascript:history.back()">주문 목록</button>
        </div>
</div>
@endsection
@section('script')
    <script>
        //$('.container-list').hide();
        //$('.accordion-container.open-action .container-list').show();

        $('.accordion-container > .container-title').click(function(){

            if ( $(this).parent('.accordion-container').hasClass('open-action') ) {
                $(this).parent('.accordion-container').addClass('close-action');
                $(this).siblings('.container-list').slideUp(500);
                $(this).parent('.accordion-container').removeClass('open-action');
            } else {
                $(this).parent('.accordion-container').addClass('open-action');
                $(this).siblings('.container-list').slideDown(500);
                $(this).parent('.accordion-container').removeClass('close-action');
            }
        });
    </script>
@endsection
