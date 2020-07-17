@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoodsDetail-content">
        <input type="hidden" name="device_id" value="{{$_GET['device_id'] ?? ''}}">
        <div class="swiper-container goods-img">
            <div class="swiper-wrapper">
                @if(!empty($product->origin_product->image_path))
                <div class="swiper-slide">
                    <img src="{{env('IMAGE_URL').$product->origin_product->image_path}}" alt="">
                </div>
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="goodsInfo-container">
            <span>{{$product->fc_trader->companyName ?? ''}}</span>
            <p class="goods-subject">{{$product->origin_product->name ?? ''}}</p>
            <div class="goods-price">
                <p>
                    @if(($product->price ?? '') == ($product->origin_product->price_cost ?? '') || ($product->price ?? '') > ($product->origin_product->price_cost ?? ''))
                    <strong class="price"><span>{{number_format($product->price ?? 0)}}</span>원</strong>
                    @else
                    <strong class="percent"><span>{{$productSale}}</span>%</strong><strong class="price"><span>{{number_format($product->price ?? 0)}}</span>원</strong><small>{{number_format($product->origin_product->price_cost ?? 0)}}</small>
                    @endif
                </p>
            </div>
            <div class="goods-count">
                <p>현재 매장 재고는 <span>{{$productCnt}}</span>개 입니다.</p>
            </div>
            <ul class="star-score">
                <li class="counting">{{number_format($reviewScore, 1)}}</li>
                @for($i=1; $i<=5; $i++)
                <li>
                    @if($reviewScore >= $i)
                    <img src="/front/dist/img/icon_star_on_B.png" alt="">
                    @elseif($i-$reviewScore <= 0.5 && $i-$reviewScore < 1)
                    <img src="/front/dist/img/icon_star_harf_B.png" alt="">
                    @else
                    <img src="/front/dist/img/icon_star_off_B.png" alt="">
                    @endif
                </li>
                @endfor
            </ul>
        </div>
        <div class="goodsTab-container tab-section">
            <ul class="small-list">
                <li class="tabItem @if(($_GET['tab'] ?? '') == 'description' || empty($_GET['tab'])) active @endif">상품설명</li>
                <li class="tabItem @if(($_GET['tab'] ?? '') == 'information') active @endif">구매정보</li>
                <li class="tabItem @if(($_GET['tab'] ?? '') == 'review') active @endif">상품후기<span>{{$reviewList->count()}}</span></li>
                <li class="tabItem @if(($_GET['tab'] ?? '') == 'qna') active @endif">Q&A<span>{{$qnaList->count()}}</span></li>
            </ul>
            <div class="target-wrap">
                <div class="tabTarget @if(($_GET['tab'] ?? '') == 'description' || empty($_GET['tab'])) active @endif">
                    @if(!empty($product->origin_product->landing1_path))
                    <img class="goods" src="{{env('IMAGE_URL').$product->origin_product->landing1_path}}" alt="">
                    @endif
                    @if(!empty($product->origin_product->landing2_path))
                    <img class="goods" src="{{env('IMAGE_URL').$product->origin_product->landing2_path}}" alt="">
                    @endif
                    @if(!empty($product->origin_product->landing3_path))
                    <img class="goods" src="{{env('IMAGE_URL').$product->origin_product->landing3_path}}" alt="">
                    @endif
                    @if(!empty($product->origin_product->landing4_path))
                    <img class="goods" src="{{env('IMAGE_URL').$product->origin_product->landing4_path}}" alt="">
                    @endif
                    @if(!empty($product->origin_product->landing5_path))
                    <img class="goods" src="{{env('IMAGE_URL').$product->origin_product->landing5_path}}" alt="">
                    @endif
                </div>
                <div class="tabTarget over-size @if(($_GET['tab'] ?? '') == 'information') active @endif">
                    <div class="accordian-list">
                        <ul>
                            <li>상품정보 제공고시<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                            <li>픽업안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                            <li>교환/반품/환불안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="tabTarget @if(($_GET['tab'] ?? '') == 'review') active @endif">
                    <div class="review-wrapper">
                        <button class="write-btn" onclick="location.href='/front/mypage/review/0?product_id={{$product->id ?? ''}}'">상품후기 작성하기</button>
                        <div class="review-container">
                            @if($photoReviewList->count() > 0)
                            <div class="review-list">
                                <div class="review-title">
                                    <p>포토 상품후기(<span>{{$photoReviewList->count()}}</span>)</p>
                                    <button onclick="location.href='/front/product/photo/{{$product->id ?? ''}}'">더보기<img src="/front/dist/img/icon_next.png"></button>
                                </div>
                                <div class="review-content photo-review">
                                    @foreach($photoReviewList as $k=>$v)
                                    @break($loop->index == 4)
                                    <div class="img-box" style="background-image: url('{{env('IMAGE_URL').$v->img1}}')"></div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if($reviewList->count() > 0)
                            <div class="review-list">
                                <div class="review-title">
                                    <p>전체 상품후기(<span>{{$reviewList->count()}}</span>)</p>
                                </div>
                                <div class="review-content">
                                    @foreach($reviewList as $k=>$v)
                                    @break($loop->index == 5)
                                    <div class="list-item @if(empty($v->img1)) none-img @endif">
                                        @if(!empty($v->img1))
                                        <div class="img-box" style="background-image: url('{{env('IMAGE_URL').$v->img1}}')"></div>
                                        @endif
                                        <div class="word-box">
                                            <img src="/front/dist/img/icon_review.png" alt="">
                                            <p class="user-word" style="-webkit-box-orient: vertical;">{{$v->contents ?? ''}}</p>
                                            <div class="toBottom">
                                                <div class="user-info">
                                                    <p class="user-name"><strong><span>{{mb_substr(($v->customer->name ?? ''), 0, 1)}}</span>OO</strong>님</p>
                                                    <ul class="user-score">
                                                        @php($score = round(($v->score ?? 0),1))
                                                        @for($i=1; $i<=5; $i++)
                                                        <li>
                                                            @if($score >= $i)
                                                            <img src="/front/dist/img/icon_star_on_B.png" alt="">
                                                            @elseif($i-$score <= 0.5 && $i-$score < 1)
                                                            <img src="/front/dist/img/icon_star_harf_B.png" alt="">
                                                            @else
                                                            <img src="/front/dist/img/icon_star_off_B.png" alt="">
                                                            @endif
                                                        </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <p class="item-subject">{{$v->product->origin_product->name ?? ''}}</p>
                                                <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <p class="none-list">등록된 상품후기가 없습니다.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tabTarget over-size @if(($_GET['tab'] ?? '') == 'qna') active @endif">
                    <div class="qna-wrapper">
                        <button class="write-btn" onclick="location.href='/front/mypage/qna/product/0?product_id={{$product->id ?? ''}}'">Q&A 작성하기</button>
                            <div class="qna-container">
                            @if($qnaList->count() > 0)
                            @foreach($qnaList as $k=>$v)
                            <div class="qna-folder @if(!empty($v->re_contents)) clear-list @endif"><!-- clear-list 추가시 답변완료 -->
                                <div class="qna-userContent">
                                    <div class="qna-header">
                                        <div class="status-box">
                                            @if(!empty($v->re_contents))
                                            <span>답변완료</span>
                                            @else
                                            <span>답변대기</span>
                                            @endif
                                            <p><strong><span>{{mb_substr(($v->customer->name ?? ''), 0, 1)}}</span>OO</strong>님</p>
                                        </div>
                                        <div class="etc-box">
                                            <p class="category">[<span>{{\App\Helper\Codes::qnaCategory($v->category ?? '')}}</span>]</p>
                                            <p class="date">{{(!empty($v->created_at))? date_format($v->created_at,'Y-m-d') : ''}}</p>
                                            @if(($v->secret ?? '') != 'Y')
                                            <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                            @endif
                                        </div>
                                    </div>
                                    @if(($v->secret ?? '') == 'Y')
                                    <div class="qna-content secret">
                                        <pre><img src="/front/dist/img/icon_lock.png"/>비밀글 입니다.</pre>
                                    </div>
                                    @else
                                    <div class="qna-content">
                                        <pre>{{$v->contents ?? ''}}</pre>
                                    </div>
                                    @endif
                                </div>
                                @if(!empty($v->re_contents))
                                <div class="qna-managerContent">
                                    <span>답변.</span>
                                    <pre>{{$v->re_contents ?? ''}}</pre>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @else
                            <p class="none-list">등록된 Q&A가 없습니다.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="purchase-footer fixed-footer @if($productCnt == 0) outOfStock @endif"> <!-- outOfStock 클래스 추가시 품절 -->
            <div class="subBtn-wrap">
                @if($productLike->count() > 0)
                <button class="clicking active" onclick="PickupCommon.productLike('{{$product->id ?? 0}}', 'delete_2')">
                    <img src="/front/dist/img/icon_heart_O_on.png" alt="">
                </button>
                @else
                <button class="clicking" onclick="PickupCommon.productLike('{{$product->id ?? 0}}', 'add')">
                    <img src="/front/dist/img/icon_heart_O.png" alt="">
                </button>
                @endif
                @if($productCnt == 0)
                <button class="changeing">
                    <img src="/front/dist/img/icon_cart_O_out.png" alt="">
                </button>
                @else
                <button class="changeing" onclick="PickupCommon.selProduct('{{$product->id ?? 0}}','{{$_GET['device_id'] ?? ''}}', 'cart')">
                    <img src="/front/dist/img/icon_cart_O_on.png" alt="">
                </button>
                @endif
            </div>
            <div class="mainBtn-wrap">
                @if($productCnt == 0)
                <button>품절</button>
                @else
                <button onclick="PickupCommon.selProduct('{{$product->id ?? 0}}','{{$_GET['device_id'] ?? ''}}','pay')">구매하기</button>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var swiperGoods = new Swiper('.swiper-container.goods-img', {
                autoHeight: true,
                pagination: {
                    el: '.swiper-pagination',
                },
            });

            $(window).scroll(function(){
                var goodsHeight = $('.goods-img').outerHeight();
                var infoHeight = $('.goodsInfo-container').outerHeight();
                var totalHeight = goodsHeight + infoHeight;

                if ( $(window).scrollTop() >= totalHeight ) {
                    $('.goodsTab-container .small-list').addClass('active');
                    $('.tabTarget').addClass('scrolled');
                } else {
                    $('.goodsTab-container .small-list').removeClass('active');
                    $('.tabTarget').removeClass('scrolled');
                }
            });

            $('.more-btn').click(function(){
                $(this).closest('.word-box').toggleClass('showing');
            });

            $('.qna-folder .more-btn').click(function(){
                $(this).closest('.qna-folder').toggleClass('open');
            });
        });

    </script>
@endsection
