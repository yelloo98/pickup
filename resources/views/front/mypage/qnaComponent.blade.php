<!-- 상품 Q&A -->
@if($type == 'product')
@foreach($productQna as $k => $v)
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
@endforeach
@endif

<!-- 매장 Q&A -->
@if($type == 'store')
@foreach($storeQna as $k => $v)
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
@endforeach
@endif
