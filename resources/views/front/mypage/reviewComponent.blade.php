<!-- 후기 쓰기 -->
@if($type == 'unreview' && count($unreviewList) > 0)
@foreach($unreviewList as $k => $v)
    <div class="review-wrapper">
        <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
        <div class="word-box">
            <div class="toTop">
                <p><span>{{$v->product->fc_trader->companyName ?? ''}}</span></p>
                <button type="button" onclick="PickupCommon.pageMoveTarget('/front/mypage/review/0?product_id={{$v->product->id ?? 0}}', '.target-wrap')">후기쓰기</button>
            </div>
            <div class="menuInfo">
                <p>{{$v->product->origin_product->name ?? ''}}</p>
            </div>
            <div class="price">
                <p class="priceNum"><span>{{number_format($v->product->price ?? 0)}}</span>원</p>
            </div>
        </div>
    </div>
@endforeach
@endif

<!-- 내가쓴 후기 -->
@if($type == 'review' && count($reviewList) > 0)
@foreach($reviewList as $k => $v)
    <div class="list-item review_{{$v->id}} @if($v->img1 == null) none-img @endif">
        <div class="custom-bar">
            <ul>
                <li onclick="PickupCommon.pageMoveTarget('/front/mypage/review/{{$v->id ?? 0}}', '.target-wrap')">수정</li>
                <li class="delete-list" onclick="PickupCommon.addReview('{{$v->id ?? 0}}', 'delete')">삭제</li>
            </ul>
        </div>
        @if(!empty($v->img1))<div class="img-box" style="background-image: url('{{env('IMAGE_URL').$v->img1}}'); background-size:cover;"></div>@endif
        <div class="word-box">
            <img src="/front/dist/img/icon_review.png" alt="">
            <p class="user-word" style="-webkit-box-orient: vertical;">{{$v->contents ?? ''}}</p>
            <div class="toBottom">
                <div class="user-info">
                    <p class="user-name"><strong><span>{{mb_substr(($v->customer->name ?? ''), 0, 1)}}</span>OO</strong>님</p>
                    <ul class="user-score">
                        @for($i=1; $i<=5; $i++)
                            <li>
                                @if($v->score >= $i)
                                    <img src="/front/dist/img/icon_star_on_B.png" alt="">
                                @elseif($i-$v->score <= 0.5 && $i-$v->score < 1)
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
@endif
