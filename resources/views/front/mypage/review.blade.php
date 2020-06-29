@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body review-content">
        <div class="tab-section">
            <ul class="tab-list2">
                <li class="tabItem active">후기 쓰기</li>
                <li class="tabItem ">내가쓴 후기</li>
            </ul>
            <div class="target-wrap">
                <!-- 후기 쓰기 -->
                <div class="tabTarget none-review active">
                    @forelse($unreviewList as $k => $v)
                    <div class="review-wrapper">
                        <div class="img-box" @if($v->product->origin_product->image_path != null) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
                        <div class="word-box">
                            <div class="toTop">
                                <p><span>{{$v->product->store->fcTrader->companyName ?? ''}}</span></p>
                                <button type="button" onclick="location.href='/front/mypage/review/0?product_id={{$v->product->id}}'">후기쓰기</button>
                            </div>
                            <div class="menuInfo">
                                <p>{{$v->product->origin_product->name ?? ''}}</p>
                            </div>
                            <div class="price">
                                <p class="priceNum"><span>{{number_format($v->product->price ?? 0)}}</span>원</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="none-list">구매내역이 없습니다.</p>
                    @endforelse
                </div>
                <!-- 내가쓴 후기 -->
                <div class="tabTarget has-review">
                    @forelse($review_list as $k => $v)
                    <div class="list-item review_{{$v->id}} @if($v->img1 == null) none-img @endif">
                        <div class="custom-bar">
                            <ul>
                                <li onclick="location.href='/front/mypage/review/{{$v->id}}'">수정</li>
                                <li class="delete-list" onclick="PickupCommon.addReview('{{$v->id ?? 0}}', 'delete')">삭제</li>
                            </ul>
                        </div>
                        @if($v->img1 != null)<div class="img-box" style="background-image: url('{{env('IMAGE_URL').$v->img1}}'); background-size:cover;"></div>@endif
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
                                        @elseif($i-$v->score == 0.5)
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
                    @empty
                    <p class="none-list">내가쓴 후기가 없습니다.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.more-btn').click(function(){
            $(this).closest('.word-box').toggleClass('showing');
        });
    </script>
@endsection
