@extends('layouts.front')
@section('title', $title ?? '')
@section('header')
    <header>
        <div class="default-header">
            <button class="back-btn" onclick="javascript:history.back()">
                <img src="/front/dist/img/icon_gnbBack.png" alt="">
            </button>
            <p class="headerTitle">이용약관</p>
            <!-- <div class="btns-wrap">
                <button>
                    <img src="img/icon_search.png" alt="">
                    <img class="black-img" src="img/icon_search_B.png" alt="">
                </button>
                <button>
                    <img src="img/icon_cart.png" alt="">
                    <img class="black-img" src="img/icon_cart_B.png" alt="">
                </button>
                <button>
                    <img src="img/icon_menu.png" alt="">
                    <img class="black-img" src="img/icon_menu_B.png" alt="">
                </button>
            </div> -->
        </div>
    </header>
@endsection
@section('content')
    <div class="content-body listUp-detailContent">
        <div class="listUp-container">
            <div class="listUp-header">
                <p class="listUp-title">서비스 구매회원 이용약관 프래쉬스토어 인터넷 개인정보통신 관련 사용하는 용어의 정의는 다음과 같습니다.</p>
                <small class="listUp-date">2020-04-13</small>
            </div>
            <div class="listUp-text">
                <pre>이용 약관

제 1조 (목적)
서비스 이용약관(이하 “약관”이라 합니다)은 (주)프래
쉬스토어(이하 “회사”라 합니다)가 제공하는 인터넷 관련
서비스와 관련하여 회사와 이용 고객(또는 회원) 간에 서비
스의 이용 조건 및 절차, 회사와 회원 간의 권리, 의무 및
책임 사항 기타 필요한 사항을 규정함을 목적으로 합니다.

제 2조 (용어)
본 약관에서 사용하는 용어의 정의는 다음 각 호와 같으며,
정의되지 않은 용어에 대한 해석은 관계법령 및 서비스별
안내에서 정하는 바에 따릅니다.
1. 서비스: 이용 고객 또는 회원이 PC, 휴대형 단말기,
태블릿PC 등 각종 유무선 기기 또는 프로그램을
통하여 이용할 수 있도록 회사가 제공하는 컨텐츠,
커뮤니티, SNS 및 그 외 관련된 서비스를 말합니다.
2. 회원: 회사의 서비스에 접속하여 본 약관에 동의하고
ID와 PASSWORD를 발급 받았으며 회사가 제공하는
서비스를 이용하는 고객을 포괄적으로 의미합니다.
3. 회원정보: 회사가 가입신청자에게 회원가입 신청양식
(이하 “신청양식"이라 합니다)에 기재를 요청하는 가입
신청자의 개인정보와 회원의 식별과 서비스 이용을 위하여
회원이 입력하고 서비스 내 공개된 개인정보를 의미합니다.
4. ID(고유번호): 회원 식별과 회원의 본 서비스 이용을
위하여 회원이 선정하고 회사가 승인하는 문자와 숫자의
조합을 말합니다. 본 서비스에서는 E-mail
주소를 ID로 사용합니다.</pre>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
