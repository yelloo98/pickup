@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppMain-content">
        <div class="mainSlide-container swiper-container">
            <div class="swiper-wrapper">
                @forelse($storeEvent as $k=>$v)
                <div class="swiper-slide" @if(!empty($v->thumbnailImages->img_path)) style="background-image: url('{{env('IMAGE_URL').$v->thumbnailImages->img_path}}')" @endif>
                    <div class="slogun-box">
                        <ul>
                            <li>{{$v->title ?? ''}}</li>
                        </ul>
                        <p>{{$v->content ?? ''}}</p>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="storeTitle-container">
            <div class="ico-wrapper">
                @if(!empty($store_like) && $store_like->where('store_id', $store->traderNo)->count() > 0)
                <button class="clicking-btn" onclick="PickupCommon.storeLike('{{$store->traderNo ?? 0}}', 'delete')">
                    <img src="/front/dist/img/icon_star_on.png" alt="">
                </button>
                @else
                <button class="clicking-btn" onclick="PickupCommon.storeLike('{{$store->traderNo ?? 0}}', 'add')">
                    <img src="/front/dist/img/icon_star.png" alt="">
                </button>
                @endif
                <button class="counting-btn alarm-btn">
                    <img src="/front/dist/img/icon_notion.png" alt="">
                    <span>1</span>
                </button>
            </div>
            <div class="title-wrapper">
                <div class="main-title">
                    <p>{{$store->companyName ?? ''}}</p>
                    <ul>
                        <li class="gray-link" onclick="location.href='/front/mypage/qna/store/0?store_id={{$store->traderNo ?? 0}}';">문의하기</li>
                        <li class="red-link">매장변경</li>
                    </ul>
                </div>
                <div class="sub-title">
                    <ul>
                        <li>{{$store->address ?? ''}}</li>
                        <li>{{\App\Helper\Codes::formatPhone($store->tel ?? '')}}</li>
                    </ul>
                </div>
            </div>
        </div>

        @if($newProduct->count() > 0 )
        <div class="itemSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_new.png" alt="">
                <p>새로운 픽업상품이 출시했어요.</p>
                <button onclick="location.href='/front/product';"><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
            </div>
            <div class="swiper-wrapper">
                @foreach($newProduct as $k=>$v)
                <div class="swiper-slide" onclick="pageMain.selProduct('{{$v->product_id ?? 0}}', '{{$v->device_id ?? 0}}')">
                    <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}')" @endif>
                        @if(($v->stock ?? 0) > 0)
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                        @else
                        <div class="outOfStock"><p>품절</p></div>
                        @endif
                    </div>
                    <div class="price-box">
                        @if(($v->product->price ?? '') == ($v->product->origin_product->price_cost ?? '') || ($v->product->price ?? '') > ($v->product->origin_product->price_cost ?? ''))
                        <p><span>{{number_format($v->product->price ?? 0)}}</span></p>
                        @else
                        <p><span class="sale-word">SALE</span><span>{{number_format($v->product->price ?? 0)}}</span><small>{{number_format($v->product->origin_product->price_cost ?? 0)}}</small></p>
                        @endif
                    </div>
                    <div class="item-subject">
                        <p>{{$v->product->origin_product->name ?? ''}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($bestProduct->count() > 0 )
        <div class="wideSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_hot.png" alt="">
                <p>지금 핫한 인기 상품은?</p>
                <button onclick="location.href='/front/product?searchSort=hit';"><img src="/front/dist/img/icon_mainarrow.png" alt=""></button>
            </div>
            <div class="swiper-wrapper">
                @forelse($bestProduct as $k=>$v)
                <div class="swiper-slide" onclick="pageMain.selProduct('{{$v->product_id ?? 0}}', '{{$v->device_id ?? 0}}')">
                    <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}')" @endif>
                        @if(($v->stock ?? 0) > 0)
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                        @else
                        <div class="outOfStock"><p>품절</p></div>
                        @endif
                    </div>
                    <div class="word-box">
                        <div class="price-box">
                            @if(($v->product->price ?? '') == ($v->product->origin_product->price_cost ?? '') || ($v->product->price ?? '') > ($v->product->origin_product->price_cost ?? ''))
                            <p><span>{{number_format($v->product->price ?? 0)}}</span></p>
                            @else
                            <p><span class="sale-word">SALE</span><span>{{number_format($v->product->price ?? 0)}}</span><small>{{number_format($v->product->origin_product->price_cost ?? 0)}}</small></p>
                            @endif
                        </div>
                        <div class="item-subject">
                            <p>{{$v->product->origin_product->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        @endif

        @if(!empty($historyProduct) && $historyProduct->count() > 0 )
        <div class="cubeItem-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_pick.png" alt="">
                <p>최근 본 상품을 확인하세요.</p>
            </div>
            <div class="cubeBox-wrapper swiper-wrapper">
                @forelse($historyProduct as $k=>$v)
                <div class="cubeItem swiper-slide" onclick="pageMain.selProduct('{{$v->product_id ?? 0}}', '{{$v->device_id ?? 0}}')">
                    <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}')" @endif>
                        @if(($v->stock ?? 0) > 0)
                        <img src="/front/dist/img/icon_cart_box.png" alt="">
                        @else
                        <div class="outOfStock"><p>품절</p></div>
                        @endif
                    </div>
                    <div class="item-subject">
                        <p>{{$v->product->origin_product->name ?? ''}}</p>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        @endif

        @if($productReview->count() > 0 )
        <div class="reviewSlide-container swiper-container sub-content">
            <div class="moreTitle-wrapper">
                <img src="/front/dist/img/m_best.png" alt="">
                <p>최고 리뷰를 확인하세요.</p>
            </div>
            <div class="swiper-wrapper">
                @forelse($productReview as $k=>$v)
                    @if($k % 2 == 0) <div class="swiper-slide"> @endif
                        <div class="review-list" onclick="location.href='/front/product/{{$v->product_id ?? 0}}?device_id={{$v->device_id ?? 0}}&tab=review'">
                            <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}')" @endif></div>
                            <div class="word-box">
                                <img src="/front/dist/img/icon_review.png" alt="">
                                <p class="user-word" style="-webkit-box-orient: vertical;">{{$v->contents ?? ''}}</p>
                                <div class="toBottom">
                                    <p class="user-name"><strong><span>{{mb_substr(($v->customer->name ?? ''), 0, 1)}}</span>OO</strong>님</p>
                                    <p class="item-subject">{{$v->product->origin_product->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    @if($k % 2 == 1 || $loop->last == true) </div> @endif
                @empty
                @endforelse
            </div>
        </div>
        @endif
    </div>
@endsection

@section('footer')
    @include('layouts.front.footer')
@endsection

@section('script')
    <script src="/front/page/page.main.init.js"></script>
@endsection

