@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body goodsQA-content">
        <input type="hidden" name="listCnt_product" value="{{$productQnaCnt ?? 0}}">
        <input type="hidden" name="listCnt_store" value="{{$storeQnaCnt ?? 0}}">
        <input type="hidden" name="pageNum" value="{{$pageNum ?? 1}}"/>
        <input type="hidden" name="type" value="{{$type ?? ''}}"/>
        <div class="tab-section">
            <ul class="tab-list2">
                <li onclick="location.href='/front/mypage/qna'" class="tabItem @if($type == 'product') active @endif">상품 Q&A</li>
                <li onclick="location.href='/front/mypage/qna?type=store'" class="tabItem @if($type == 'store') active @endif">매장 Q&A</li>
            </ul>
            <div class="target-wrap">
                <!-- 상품 Q&A -->
                @if($type == 'product')
                <div class="tabTarget active">
                    <div class="goodsData-container">
                    @forelse($productQna as $k => $v)
                        <div class="list-item">
                            @if(!empty($v->re_contents))
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list" onclick="PickupCommon.qnaProduct('{{$v->id}}', 'delete')">삭제</li>
                                </ul>
                            </div>
                            @else
                            <div class="custom-bar">
                                <p><span>답변대기</span></p>
                                <ul>
                                    <li onclick="PickupCommon.pageMoveTarget('/front/mypage/qna/product/{{$v->id}}', '.goodsData-container')">수정</li>
                                    <li class="delete-list" onclick="PickupCommon.qnaProduct('{{$v->id}}', 'delete')">삭제</li>
                                </ul>
                            </div>
                            @endif
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p>
                                            <span class="store">{{$v->product->fc_trader->companyName ?? ''}}</span>
                                            <span class="questionKinds">{{\App\Helper\Codes::qnaCategory($v->category ?? '')}}</span>
                                            <span class="date">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</span>
                                        </p>
                                    </div>
                                    @if(!empty($v->re_contents))
                                    <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                    @endif
                                </div>
                                <div class="title-bar">{{$v->product->origin_product->name ?? ''}}</div>
                                <div class="content-bar"><pre>{{$v->contents}}</pre>
                                </div>
                            </div>
                            @if(!empty($v->re_contents))
                            <div class="manager-section">
                                <p class="answer">답변.</p>
                                <pre class="contenttxt">{{$v->re_contents}}</pre>
                            </div>
                            @endif
                        </div>
                    @empty
                        <p class="none-list">Q&A가 없습니다.</p>
                    @endforelse
                    </div>
                </div>
                @endif
                <!-- 매장 Q&A -->
                @if($type == 'store')
                <div class="tabTarget active">
                    <div class="goodsData-container">
                    @forelse($storeQna as $k => $v)
                        <div class="list-item">
                            @if(!empty($v->re_contents))
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list" onclick="PickupCommon.qnaStore('{{$v->id}}', 'delete')">삭제</li>
                                </ul>
                            </div>
                            @else
                            <div class="custom-bar">
                                <p><span>답변대기</span></p>
                                <ul>
                                    <li onclick="PickupCommon.pageMoveTarget('/front/mypage/qna/store/{{$v->id}}', '.goodsData-container')">수정</li>
                                    <li class="delete-list" onclick="PickupCommon.qnaStore('{{$v->id}}', 'delete')">삭제</li>
                                </ul>
                            </div>
                            @endif
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p>
                                            <span class="store">{{$v->fc_trader->companyName ?? ''}}</span>
                                            <span class="questionKinds">{{\App\Helper\Codes::qnaCategory($v->category ?? '')}}</span>
                                            <span class="date">{{($v->created_at)? date_format($v->created_at,'Y-m-d') : ''}}</span>
                                        </p>
                                    </div>
                                    @if(!empty($v->re_contents))
                                    <button class="more-btn"><img src="/front/dist/img/icon_arrow_MD.png" alt=""></button>
                                    @endif
                                </div>
                                <div class="content-bar"><pre>{{$v->contents}}</pre>
                                </div>
                            </div>
                            @if(!empty($v->re_contents))
                            <div class="manager-section">
                                <p class="answer">답변.</p>
                                <pre class="contenttxt">{{$v->re_contents}}</pre>
                            </div>
                            @endif
                        </div>
                    @empty
                        <p class="none-list">Q&A가 없습니다.</p>
                    @endforelse
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var pageQna = {
            getQnaComponent : function(){
                PickupCommon._config.page++;
                pageModal.openProgressPopup();
                setTimeout(function() {
                    try{
                        var result = false;
                        $.get('/front/mypage/qna/list/component' + PickupCommon.defineSearchParameter(PickupCommon._config.page), function (res) {
                            if(res != ''){
                                $('.content-body .goodsData-container').append(res);
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
                $('html, body .goodsData-container').animate({scrollTop : scrollTop}, 400);
            }

            $('.goodsData-container').scroll(function(){
                if(PickupCommon._config.scrollAction){
                    if (Math.round($(window).scrollTop() + $(window).height()) > $(document).height() - 100) {
                        PickupCommon._config.scrollAction = false;
                        //component 호출
                        if($('.list-item').length < $('input[name=listCnt_product]').val() || $('.list-item').length < $('input[name=listCnt_store]').val()){
                            pageQna.getQnaComponent();
                        }
                    }
                }
            });

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
        });
    </script>
@endsection
