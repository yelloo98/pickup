@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body review-content">
        <input type="hidden" name="listCnt_un" value="{{$unreviewListCnt ?? 0}}">
        <input type="hidden" name="listCnt" value="{{$reviewListCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        <input type="hidden" name="type" value="{{$type ?? ''}}"/>
        <div class="tab-section">
            <ul class="tab-list2">
                <li onclick="location.href='/front/mypage/review'" class="tabItem @if($type == 'unreview') active @endif">후기 쓰기</li>
                <li onclick="location.href='/front/mypage/review?type=review'" class="tabItem @if($type == 'review') active @endif">내가쓴 후기</li>
            </ul>
            <div class="target-wrap">
                <!-- 후기 쓰기 -->
                @if($type == 'unreview')
                <div class="tabTarget none-review active">
                    @forelse($unreviewList as $k => $v)
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
                    @empty
                    <p class="none-list">구매내역이 없습니다.</p>
                    @endforelse
                </div>
                @endif
                <!-- 내가쓴 후기 -->
                @if($type == 'review')
                <div class="tabTarget has-review active">
                    @forelse($reviewList as $k => $v)
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
                    @empty
                    <p class="none-list">내가쓴 후기가 없습니다.</p>
                    @endforelse
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageReview = {
            getReviewComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/mypage/review/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res != ''){
                                if($('input[name=type]').val() == 'unreview'){
                                    $('.content-body .none-review').append(res);
                                }else if($('input[name=type]').val() == 'review'){
                                    $('.content-body .has-review').append(res);
                                    $('.more-btn').click(function(){
                                        $(this).closest('.word-box').toggleClass('showing');
                                    });
                                }
                                PickupCommon._config.scrollAction = true;
                                result = true;
                            }else{
                                result = false;
                            }
                        });
                        if(!result){
                            PickupCommon._config.page--;
                        }
                        pageModal.closeProgressPopup();
                    }catch(e){
                        PickupCommon._config.page--;
                        pageModal.closeProgressPopup();
                        PickupCommon._config.scrollAction = true;
                    }
                },300);
            }
        };

        $(document).ready(function(){
            PickupCommon._config.page = $('input[name=pageNum]').val();
            if(history.state != null){
                var pageHistory = history.state;
                var scrollTop = pageHistory['scrollTop'];
                console.log(scrollTop);
                $('html, body .target-wrap').animate({scrollTop : scrollTop}, 400);
            }

            $('.target-wrap').scroll(function(){
                if(PickupCommon._config.scrollAction){
                    if (Math.round($(window).scrollTop() + $(window).height()) > $(document).height() - 100) {
                        PickupCommon._config.scrollAction = false;
                        //component 호출
                        if($('.review-wrapper').length < $('input[name=listCnt_un]').val() || $('.list-item').length < $('input[name=listCnt]').val()){
                            pageReview.getReviewComponent();
                        }
                    }
                }
            });

            $('.more-btn').click(function(){
                $(this).closest('.word-box').toggleClass('showing');
            });
        });
    </script>
@endsection
