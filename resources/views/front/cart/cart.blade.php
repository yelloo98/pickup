@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body pickupBasket">
        <div class="content-wrapper">
            <div class="title-section">
                <div class="word-area">
                    <div class="main-box">
                        <p class="nickName"><span>{{$customer->name ?? '비회원'}}님의</span>총 결제 금액</p>
                        <p class="totalPrice"><span>{{$cartListSum}}</span>원</p>
                    </div>
                    <div class="sub-box">
                        <div class="sub-content">
                            <div class="reward-name">총 상품금액</div>
                            <div class="reward-price">{{$cartListSum}}</div>
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
                        <input type="checkbox" id="allCheck" name="allCheck"/>
                        <label for="allCheck"><span class="checkbox-custom"></span>
                            <span class="checkbox-label">전체선택</span></label>
                        <div class="alldelete-btn">전체삭제</div>
                    </div>
                </div>
                <div class="content-area">
                    @forelse($cartList as $k=>$v)
                    <div class="content-wrap">
                        <div class="checkbox-box">
                            <input type="checkbox" id="check_item_{{$k}}" name="check_item_{{$k}}"/>
                            <label for="check_item_{{$k}}"><span class="checkbox-custom"></span></label>
                        </div>
                        <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
                        <div class="word-box">
                            <div class="toTop">
                                <p><span>{{$v->product->store->fcTrader->companyName ?? ''}}</span></p>
                                <button class='delete-btn'><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
                            </div>
                            <div class="menuInfo">
                                <p>{{$v->product->origin_product->name ?? ''}}</p>
                            </div>
                            <div class="price">
                                <div class="btnBlock">
                                    <button class="up-btn"><img src="/front/dist/img/icon_up.png" alt=""></button>
                                    <div class="goodsAmount"><span>{{$v->count ?? ''}}</span></div>
                                    <button class="down-btn"><img src="/front/dist/img/icon_down.png" alt=""></button>
                                </div>
                                <p class="priceNum"><span>{{number_format($v->price_sum ?? 0)}}</span>원</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
{{--                    <div class="content-wrap withoutGoods">--}}
{{--                        <div class="checkbox-box">--}}
{{--                            <input type="checkbox" id="check_item02" name="check_item02" disabled/>--}}
{{--                            <label for="check_item02"><span class="checkbox-custom"></span></label>--}}
{{--                        </div>--}}
{{--                        <div class="img-box "><p>품 절</p></div>--}}
{{--                        <div class="word-box ">--}}
{{--                            <div class="toTop">--}}
{{--                                <p><span>군자점</span></p>--}}
{{--                                <button class='delete-btn'><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>--}}
{{--                            </div>--}}
{{--                            <div class="menuInfo">--}}
{{--                                <p>국내산 생생 삼겹살250g</p>--}}
{{--                            </div>--}}
{{--                            <div class="price">--}}
{{--                                <div class="btnBlock">--}}
{{--                                    <button class="up-btn"><img src="/front/dist/img/icon_up.png" alt=""></button>--}}
{{--                                    <div class="goodsAmount"><span>1</span></div>--}}
{{--                                    <button class="down-btn"><img src="/front/dist/img/icon_down.png" alt=""></button>--}}
{{--                                </div>--}}
{{--                                <p class="priceNum"><span>22,950</span>원</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="fixed-footer full-btn">
            <button>총 <span>2</span>개 상품 구매하기</button>
        </div>
    </div>
@endsection
@section('script')
@endsection
