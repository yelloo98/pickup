@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body listUp-content">
        <div class="listUp-container">
            <ul>
                <li onclick="location.href='/front/mypage/notice/1'">
                    <div class="listUp-warpper">
                        <p class="listUp-category">[<span>FRESHSTORE</span>]</p>
                        <p class="listUp-text" style="-webkit-box-orient: vertical;">서비스 구매회원 이용약관 프래쉬스토어 인터넷 개인정보통신 관련 사용하는 용어의 정의는 다음과 같습니다.</p>
                        <small class="listUp-date">2020-04-13</small>
                    </div>
                    <img src="/front/dist/img/icon_arrow_MR.png" alt="">
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script>
        if( $('.listUp-content ul').length == 0 ) {
            $('.listUp-content .listUp-container').append('<p class="none-list">등록된 공지사항이 없습니다.</p>');
        }
    </script>
@endsection
