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
                    @forelse($productQna as $k => $v)
                        <div class="list-item">
                            @if(!empty($v->re_contents))
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            @else
                            <div class="custom-bar">
                                <p><span>답변대기</span></p>
                                <ul>
                                    <li>수정</li>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            @endif
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p>
                                            <span class="store">{{$v->store->fcTrader->companyName ?? ''}}</span>
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
                <div class="tabTarget">
                    <div class="goodsData-container">
                    @forelse($storeQna as $k => $v)
                        <div class="list-item">
                            @if(!empty($v->re_contents))
                            <div class="custom-bar complete">
                                <p><span>답변완료</span></p>
                                <ul>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            @else
                            <div class="custom-bar">
                                <p><span>답변대기</span></p>
                                <ul>
                                    <li>수정</li>
                                    <li class="delete-list">삭제</li>
                                </ul>
                            </div>
                            @endif
                            <div class="user-section">
                                <div class="info-bar">
                                    <div class="user-info">
                                        <p>
                                            <span class="store">{{$v->store->fcTrader->companyName ?? ''}}</span>
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
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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
