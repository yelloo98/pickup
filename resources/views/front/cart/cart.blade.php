@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickupBasket">
        <div class="content-wrapper">
            <div class="title-section">
                <div class="word-area">
                    <div class="main-box">
                        <p class="nickName"><span>{{$customer->name ?? '비회원'}}님의</span>총 결제 금액</p>
                        <p class="totalPrice"><span>0</span>원</p>
                    </div>
                    <div class="sub-box">
                        <div class="sub-content">
                            <div class="reward-name">총 상품금액</div>
                            <div class="reward-price totalPrice_m">0</div>
                        </div>
                        <div class="sub-content">
                            <div class="reward-name noGoods">총 배송비</div>
                            <div class="reward-price">상품을 픽업해주세요</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-section">
                <div class="btn-area">
                    <div class="checkbox-wrap">
                        <input type="checkbox" id="allCheck" name="allCheck" onclick="PickupCart.allCheck(this)"/>
                        <label for="allCheck"><span class="checkbox-custom"></span>
                            <span class="checkbox-label">전체선택</span></label>
                        <div class="alldelete-btn" onclick="PickupCommon.addCart('', '', 'delete_all')">전체삭제</div>
                    </div>
                </div>
                <div class="content-area">
                    @forelse($productStore as $item)
                    <div class="store-wrap">
                        <div class="store-title">
                            <span>{{$item->product->fc_trader->companyName ?? ''}}</span>
                            <p class="address">{{$item->product->fc_trader->address ?? ''}}</p>
                        </div>
                        @foreach($item->cartList as $k=>$v)
                        <div class="content-wrap @if(($v->product_res ?? '') <= 0) withoutGoods @endif product_{{$v->product_id}}">
                            <div class="checkbox-box">
                                <input type="hidden" name="device_id" value="{{$v->device_id ?? ''}}"/>
                                <input type="checkbox" id="check_item_{{$v->product_id ?? 0}}" name="check_item[]" onclick="PickupCart.totalPrice()" @if(($v->product_res ?? '') == 0) disabled @endif value="{{$v->product_id ?? ''}}"/>
                                <label for="check_item_{{$v->product_id ?? 0}}"><span class="checkbox-custom"></span></label>
                            </div>
                            <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif>
                                @if(($v->product_res ?? '') <= 0)<p>품 절</p>@endif
                            </div>
                            <div class="word-box">
                                <div class="toTop">
                                    <div class="status-area">
                                        <span class="blue-box">{{\App\Helper\Codes::deviceTypeText($v->device->frozen_type ?? '').($v->device->store_order_no ?? '')}}</span>
                                    </div>
                                    <button class='delete-btn' onclick="PickupCommon.addCart('{{$v->product_id ?? 0}}','{{$v->device_id ?? 0}}', 'delete')"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                                </div>
                                <div class="menuInfo">
                                    <p>{{$v->product->origin_product->name ?? ''}}</p>
                                </div>
                                <div class="price">
                                    <div class="btnBlock">
                                        <button class="up-btn" onclick="PickupCart.cntNum(this, '{{$v->product_res}}', '{{$v->price}}', 'plus')"><img src="/front/dist/img/icon_up.png" alt=""></button>
                                        <div class="goodsAmount"><span>{{$v->count ?? ''}}</span></div>
                                        <button class="down-btn" onclick="PickupCart.cntNum(this, '{{$v->product_res}}', '{{$v->price}}', 'minus')"><img src="/front/dist/img/icon_down.png" alt=""></button>
                                    </div>
                                    <p class="priceNum"><span>{{number_format($v->price_sum ?? 0)}}</span>원</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <p class="none-list">등록된 상품이 없습니다.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="fixed-footer full-btn">
            <button onclick="PickupCommon.addOrder()">총 <span class="totalCnt">0</span>개 상품 구매하기</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
    var PickupCart = {
        _config : {
            productList : [],
        },


        //# 총 결제 금액 처리 / 구매 개수
        totalPrice : function(){
            var sum = 0;
            $(".content-area input[type=checkbox]:checked").each(function () {
                sum += Number($(this).parent('.checkbox-box').siblings('.word-box').find('.priceNum').children('span').text().replace(/,/g, ''));
            });

            $(".totalPrice span").text(pageModal.addComma(sum));
            $(".totalPrice_m").text(pageModal.addComma(sum));
            $(".totalCnt").text($('.content-area input[type=checkbox]:checked').length);

            PickupCart._config.productList = [];
            $("input[name='check_item[]']:checked").each(function (){
                var product_id = parseInt($(this).val());
                var device_id = $(this).parent('.checkbox-box').find("input[name='device_id']").val();
                var cnt = parseInt($('.product_'+$(this).val() + ' .goodsAmount span').text());
                PickupCart._config.productList.push([product_id, device_id, cnt]);
            });
        },

        //# 전체 체크
         allCheck : function(obj) {
            if ($(obj).prop("checked")) {
                $("input[type=checkbox]:not(:disabled)").prop("checked", true);
            } else {
                $("input[type=checkbox]:not(:disabled)").prop("checked", false);
            }

             PickupCart.totalPrice();
        },

        //# 상품 추가 / 감소
        cntNum : function(obj, max, price, type) {
            var cnt = $(obj).parents('.price').find('.goodsAmount').children('span').text();
            if (type == 'plus') {
                cnt++;
                if (cnt <= max) {
                    $(obj).parents('.price').find('.goodsAmount').children('span').text(cnt);
                    $(obj).parents('.price').find('.priceNum').children('span').text(pageModal.addComma(price * cnt));
                } else {
                    pageModal.alertPopup('재고가 부족합니다.');
                }
            } else {
                cnt--;
                if (cnt >= 1) {
                    $(obj).parents('.price').find('.goodsAmount').children('span').text(cnt);
                    $(obj).parents('.price').find('.priceNum').children('span').text(pageModal.addComma(price * cnt));
                } else {
                    pageModal.alertPopup('1개 이하는 선택할 수 없습니다.');
                }
            }

            PickupCart.totalPrice();
        }
    }
    </script>
@endsection
