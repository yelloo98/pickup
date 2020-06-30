@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body ppGoodsDetail-content">
        <div class="swiper-container goods-img">
            <div class="swiper-wrapper">
                <div class="swiper-slide"></div>
                <div class="swiper-slide"></div>
                <div class="swiper-slide"></div>
                <div class="swiper-slide"></div>
                <div class="swiper-slide"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="goodsInfo-container">
            <span>군자점</span>
            <p class="goods-subject">미트박스 1인용 루꼴라 에그토마토 200G</p>
            <div class="goods-price">
                <p>
                    <strong class="percent"><span>30</span>%</strong><strong class="price"><span>22,950</span>원</strong><small>29,000</small>
                </p>
            </div>
            <div class="goods-count">
                <p>현재 매장 재고는 <span>5</span>개 입니다.</p>
            </div>
            <ul class="star-score">
                <li class="counting">3.5</li>
                <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                <li><img src="/front/dist/img/icon_star_on_B.png" alt=""></li>
                <li><img src="/front/dist/img/icon_star_harf_B.png" alt=""></li>
                <li><img src="/front/dist/img/icon_star_off_B.png" alt=""></li>
            </ul>
        </div>
        <div class="goodsTab-container tab-section">
            <ul class="small-list">
                <li class="tabItem active">상품설명</li>
                <li class="tabItem">구매정보</li>
                <li class="tabItem">상품후기<span>100</span></li>
                <li class="tabItem">Q&A<span>15</span></li>
            </ul>
            <div class="target-wrap">
                <div class="tabTarget active">
                    <img class="goods" src="/front/dist/img/goods.png" alt="">
                </div>
                <div class="tabTarget over-size">
                    <div class="accordian-list">
                        <ul>
                            <li>상품정보 제공고시<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                            <li>픽업안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                            <li>교환/반품/환불안내<img src="/front/dist/img/icon_arrow_MD.png" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="tabTarget ">
                    <div class="review-wrapper">
                        <button class="write-btn" onclick="location.href='MP_reviewWrite.html'">상품후기 작성하기</button>
                        <div class="review-container">
                            <div class="review-list">
                                <div class="review-title">
                                    <p>포토 상품후기(<span>23</span>)</p>
                                    <button>더보기<img src="/front/dist/img/icon_next.png"></button>
                                </div>
                                <div class="review-content photo-review">
                                    <div class="img-box"></div>
                                    <div class="img-box"></div>
                                    <div class="img-box"></div>
                                    <div class="img-box"></div>
                                </div>
                            </div>
                            <div class="review-list">
                                <div class="review-title">
                                    <p>전체 상품후기(<span>23</span>)</p>
                                </div>
                                <div class="review-content">
                                    <div class="list-item">
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
                </div>
                <div class="tabTarget over-size ">
                    <div class="qna-wrapper">
                        <button class="write-btn" onclick="location.href='PP_qnaWrite.html'">Q&A 작성하기</button>
                        <div class="qna-container">
                            <div class="qna-folder"><!-- clear-list 추가시 답변완료 -->
                                <div class="qna-userContent">
                                    <div class="qna-header">
                                        <div class="status-box">
                                            <span>답변대기</span>
                                            <p><strong><span>김</span>OO</strong>님</p>
                                        </div>
                                        <div class="etc-box">
                                            <p class="category">[<span>배송문의</span>]</p>
                                            <p class="date">2020.03.12</p>
                                            <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="qna-content secret"><!-- secret 추가시 비밀글 -->
                                        <pre>혹시 가능하시다면 빨간색 토마토 초록색 토마토 상품으로 보내주세여 보내주세여 감사합니다.</pre>
                                    </div>
                                </div>
                                <div class="qna-managerContent">
                                    <span>답변.</span>
                                    <pre>안녕하세요. 고객님!
미트 박스 상품 담당자입니다.
고객님께서 보내주신 문의사항 잘 보았습니다. 제품 하자가 있을 시,
조리 전 반품 가능하며 반품비 부담은 없습니다.
저희 제품을 구매해 주셔서 감사드립니다.</pre>
                                </div>
                            </div>
                            <div class="qna-folder clear-list"><!-- clear-list 추가시 답변완료 -->
                                <div class="qna-userContent">
                                    <div class="qna-header">
                                        <div class="status-box">
                                            <span>답변대기</span>
                                            <p><strong><span>김</span>OO</strong>님</p>
                                        </div>
                                        <div class="etc-box">
                                            <p class="category">[<span>배송문의</span>]</p>
                                            <p class="date">2020.03.12</p>
                                            <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="qna-content">
                                        <pre>혹시 가능하시다면 빨간색 토마토 초록색 토마토 상품으로 보내주세여 보내주세여 감사합니다.</pre>
                                    </div>
                                </div>
                                <div class="qna-managerContent">
                                    <span>답변.</span>
                                    <pre>안녕하세요. 고객님!
미트 박스 상품 담당자입니다.
고객님께서 보내주신 문의사항 잘 보았습니다. 제품 하자가 있을 시,
조리 전 반품 가능하며 반품비 부담은 없습니다.
저희 제품을 구매해 주셔서 감사드립니다.</pre>
                                </div>
                            </div>
                            <div class="qna-folder"><!-- clear-list 추가시 답변완료 -->
                                <div class="qna-userContent">
                                    <div class="qna-header">
                                        <div class="status-box">
                                            <span>답변대기</span>
                                            <p><strong><span>김</span>OO</strong>님</p>
                                        </div>
                                        <div class="etc-box">
                                            <p class="category">[<span>배송문의</span>]</p>
                                            <p class="date">2020.03.12</p>
                                            <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="qna-content">
                                        <pre>혹시 가능하시다면 빨간색 토마토 초록색 토마토 상품으로 보내주세여 보내주세여 감사합니다.</pre>
                                    </div>
                                </div>
                                <div class="qna-managerContent">
                                    <span>답변.</span>
                                    <pre>안녕하세요. 고객님!
미트 박스 상품 담당자입니다.
고객님께서 보내주신 문의사항 잘 보았습니다. 제품 하자가 있을 시,
조리 전 반품 가능하며 반품비 부담은 없습니다.
저희 제품을 구매해 주셔서 감사드립니다.</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="purchase-footer fixed-footer"><!-- outOfStock 클래스 추가시 품절 -->
            <div class="subBtn-wrap">
                <button class="clicking">
                    <img src="/front/dist/img/icon_heart_O.png" alt="">
                </button>
                <button class="changeing">
                    <img src="/front/dist/img/icon_cart_O_on.png" alt="">
                </button>
            </div>
            <div class="mainBtn-wrap">
                <button>구매하기</button>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>

        $(document).ready(function(){

            $('.clicking').click(function(){
                $(this).toggleClass('active');
                if ( $(this).hasClass('active') ) {
                    $(this).children('img').attr('src',$(this).children('img').attr('src').replace('.png','_on.png'));
                } else {
                    $(this).children('img').attr('src',$(this).children('img').attr('src').replace('_on.png','.png'));
                }
            });

            var swiperGoods = new Swiper('.swiper-container.goods-img', {
                pagination: {
                    el: '.swiper-pagination',
                },
            });

            var mainItemList = $('.goods-img .swiper-slide').outerWidth();
            $('.goods-img .swiper-slide').css('height',mainItemList);



            $(window).scroll(function(){
                var goodsHeight = $('.goods-img').outerHeight();
                var infoHeight = $('.goodsInfo-container').outerHeight();
                var totalHeight = goodsHeight + infoHeight;

                if ( $(window).scrollTop() >= totalHeight ) {
                    $('.goodsTab-container .small-list').addClass('active');
                } else {
                    $('.goodsTab-container .small-list').removeClass('active');
                }
            });

            $('.more-btn').click(function(){
                $(this).closest('.word-box').toggleClass('showing');
            });

            $('.qna-folder .more-btn').click(function(){
                $(this).closest('.qna-folder').toggleClass('open');
            });

            $('.qna-folder.clear-list').find('.status-box').children('span').text('답변완료');

            $('.qna-content.secret').empty();
            $('.qna-content.secret').append('<pre><img src="/front/dist/img/icon_lock.png"/>비밀글 입니다.</pre>');

            //리뷰 리스트 없는경우
            if( $('.ppGoodsDetail-content .review-container div').length == 0 ) {
                $('.ppGoodsDetail-content .review-container').append('<p class="none-list">등록된 상품후기가 없습니다.</p>');
            }

            //qna 리스트 없는경우
            if( $('.ppGoodsDetail-content .qna-container div').length == 0 ) {
                $('.ppGoodsDetail-content .qna-container').append('<p class="none-list">등록된 Q&A가 없습니다.</p>');
            }

            $('.tabItem').click(function(){
                var photoWidth = $('.photo-review .img-box').outerWidth();
                $('.photo-review .img-box').css('height',photoWidth);
            });

            // $('.outOfStock').find('.changeing').children('img').attr("src",$('.outOfStock').find('.changeing').children('img').attr("src").replace("O.png","O_out.png"));
            $('.outOfStock .mainBtn-wrap button').text('품절');

        });

    </script>
@endsection
