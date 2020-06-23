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
                <div class="tabTarget none-review active">
                    <div class="review-wrapper">
                        <div class="img-box"></div>
                        <div class="word-box">
                            <div class="toTop">
                                <p><span>군자점</span></p>
                                <button type="button">후기쓰기</button>
                            </div>
                            <div class="menuInfo">
                                <p>국내산 생생 삼겹살250g</p>
                            </div>
                            <div class="price">
                                <p class="priceNum"><span>22,950</span>원</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-wrapper">
                        <div class="img-box"></div>
                        <div class="word-box">
                            <div class="toTop">
                                <p><span>군자점</span></p>
                                <button type="button">후기쓰기</button>
                            </div>
                            <div class="menuInfo">
                                <p>국내산 생생 삼겹살250g</p>
                            </div>
                            <div class="price">
                                <p class="priceNum"><span>22,950</span>원</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabTarget has-review">
                    <div class="list-item">
                        <div class="custom-bar">
                            <ul>
                                <li>수정</li>
                                <li class="delete-list">삭제</li>
                            </ul>
                        </div>
                        <div class="img-box"></div>
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
                    <div class="list-item none-img">
                        <div class="custom-bar">
                            <ul>
                                <li>수정</li>
                                <li class="delete-list">삭제</li>
                            </ul>
                        </div>
                        <div class="word-box">
                            <img src="/front/dist/img/icon_review.png" alt="">
                            <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ 쫀쫀하고 고소해서 그냥 먹어도 괜찮을듯</p>
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
                    <div class="list-item">
                        <div class="custom-bar">
                            <ul>
                                <li>수정</li>
                                <li class="delete-list">삭제</li>
                            </ul>
                        </div>
                        <div class="img-box"></div>
                        <div class="word-box">
                            <img src="/front/dist/img/icon_review.png" alt="">
                            <p class="user-word" style="-webkit-box-orient: vertical;">두번째 주문입니다. 보기엔 생각보다 작아보이는데 먹어보니 은근 양이 꽤 많아요 ㅎㅎ</p>
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
                            </div>
                        </div>
                    </div>
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

        if( $('.review-content .review-wrapper').length == 0 ) {
            $('.review-content .none-review').append('<p class="none-list">구매내역이 없습니다.</p>');
        }
        if( $('.review-content .list-item').length == 0 ) {
            $('.review-content .has-review').append('<p class="none-list">내가쓴 후기가 없습니다.</p>');
        }
        $('.star-point').click(function(){
            var star = $(this).val();
            $('.star-point').each(function(){
                if($(this).val() > star ){
                    $(this).children('img').attr('src', 'img/icon_star_off_B.png');
                }else{
                    $(this).children('img').attr('src', 'img/icon_star_on_B.png');
                }
            });
            $('.starScore').children('span').text(star);
        });

        $('.delete-list').click(function(){
            $(this).closest('.list-item').remove();
            if( $('.delete-list').closest('.has-review').children().length == 0 ) {
                $('.review-content .has-review').append('<p class="none-list">내가쓴 후기가 없습니다.</p>');
            }
        });

    </script>
@endsection
