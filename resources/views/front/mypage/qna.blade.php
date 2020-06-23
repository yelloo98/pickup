@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body goodsQA-content">
        <div class="tab-section">
            <ul class="tab-list2">
                <li class="tabItem active">상품 Q&A</li>
                <li class="tabItem ">매장 Q&A</li>
            </ul>
            <div class="target-wrap">
                <div class="tabTarget active">
                    <div class="goodsData-container">
                        <div class="list-item">
                            <div class="custom-bar">
                                <p><span>답변대기</span></p>
                                <ul>
                                    <li>수정</li>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p><span class="store">군자점</span><span class="
                                        questionKinds">[배송문의]</span><span class="date">2020.03.12</span></p>
                                    </div>
                                    <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                </div>
                                <div class="title-bar">국내산 생생 삼겹살 250g</div>
                                <div class="content-bar"><pre>15일에 도착할 수 있을까요?
오늘 주문하면 3월 15일에 도착할 수 있는지 궁금해요</pre>
                                </div>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p><span class="store">군자점</span><span class="
                                        questionKinds">[배송문의]</span><span class="date">2020.03.12</span></p>
                                    </div>
                                    <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                </div>
                                <div class="title-bar">국내산 생생 삼겹살 250g</div>
                                <div class="content-bar"><pre>15일에 도착할 수 있을까요?
오늘 주문하면 3월 15일에 도착할 수 있는지 궁금해요</pre>
                                </div>
                            </div>
                            <div class="manager-section">
                                <p class="answer">답변.</p>
                                <pre class="contenttxt">안녕하세요 고객님!
2022년 5월 30일까지 입니다.</pre>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p><span class="store">군자점</span><span class="
                                        questionKinds">[배송문의]</span><span class="date">2020.03.12</span></p>
                                    </div>
                                    <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                </div>
                                <div class="title-bar">국내산 생생 삼겹살 250g</div>
                                <div class="content-bar"><pre>15일에 도착할 수 있을까요?
오늘 주문하면 3월 15일에 도착할 수 있는지 궁금해요</pre>
                                </div>
                            </div>
                            <div class="manager-section">
                                <p class="answer">답변.</p>
                                <pre class="contenttxt">안녕하세요 고객님!
2022년 5월 30일까지 입니다.</pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabTarget">
                    <div class="goodsData-container">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.tabTarget').each(function(){
            if( $(this).find('.list-item').length == 0 ) {
                $(this).find('.goodsData-container').append('<p class="none-list">Q&A가 없습니다.</p>');
            }
        });

        $('.more-btn').click(function(){
            $(this).closest('.word-box').toggleClass('showing');
        });

        $('.list-item .more-btn').hide();

        $('.manager-section').siblings('.user-section').find('.more-btn').show();

        $('.more-btn').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.list-item').toggleClass('questionOpen').children('.manager-section').slideToggle(300);
        });

        $('.delete-list').click(function(){
            $(this).closest('.list-item').remove();
            $('.tabTarget').each(function(){
                if( $(this).children('.goodsData-container').children().length == 0 ) {
                    $(this).find('.goodsData-container').append('<p class="none-list">Q&A가 없습니다.</p>');
                }
            });

        });

    </script>
@endsection
