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
                    <div class="list-item none-img">
                        <div class="custom-bar">
                            <ul>
                                <li>수정</li>
                                <li class="delete-list">삭제</li>
                            </ul>
                        </div>
                        {{--<div class="img-box"></div>--}}
                        <div class="word-box">
                            <img src="/front/dist/img/icon_review.png" alt="">
                            <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도 괜찮을듯괜찮을듯괜찮을듯괜찮을듯괜찮을듯</p>
                            <div class="toBottom">
                                <div class="user-info">
                                    <p class="user-name"><strong><span>신</span>OO</strong>님</p>
                                    <ul class="user-score">
                                        <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                                        <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                                        <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                                        <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                                        <li><img src="/front/dist/img/icon_star_off_B.png" alt=""></li>
                                    </ul>
                                </div>
                                <p class="item-subject">[국내산] 한돈 설깃살 모듬 구이용 500G</p>
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

        $('.delete-list').click(function(){
            $(this).closest('.list-item').remove();
            if( $('.delete-list').closest('.has-review').children().length == 0 ) {
                $('.review-content .has-review').append('<p class="none-list">내가쓴 후기가 없습니다.</p>');
            }
        });
    </script>
@endsection
