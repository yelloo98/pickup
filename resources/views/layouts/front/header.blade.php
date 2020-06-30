<header>
    @if(($page ?? '') == 'main')
    <div class="transparent-header">
        <button class="list-btn" onclick="location.href='/front/mypage/order'">
            <img src="/front/dist/img/icon_Pup.png" alt="">
            <img class="black-img" src="/front/dist/img/icon_Pup_B.png" alt="">
            <span>1</span>
        </button>
        <img src="/front/dist/img/icon_mainlogo.png" alt="" class="logo-img">
        <img class="black-img" src="/front/dist/img/icon_mainlogo_B.png" alt="" class="logo-img">
        <div class="btns-wrap">
            <button onclick="location.href='/front/search'">
                <img src="/front/dist/img/icon_search.png" alt="">
                <img class="black-img" src="/front/dist/img/icon_search_B.png" alt="">
            </button>
            <button onclick="location.href='/front/cart'">
                <img src="/front/dist/img/icon_cart.png" alt="">
                <img class="black-img" src="/front/dist/img/icon_cart_B.png" alt="">
            </button>
            <button onclick="pageModal.menuPopup();">
                <img src="/front/dist/img/icon_menu.png" alt="">
                <img class="black-img" src="/front/dist/img/icon_menu_B.png" alt="">
            </button>
        </div>
    </div>
    @else
    <div class="default-header">
        <button class="back-btn" onclick="javascript:history.back()">
            <img src="/front/dist/img/icon_gnbback.png" alt="">
        </button>
        <p class="headerTitle">
        @if(($page ?? '') == 'search')
            구매한 픽업상품
        @elseif(($page ?? '') == 'latest')
            픽업상품
        @elseif(($page ?? '') == 'detail')
            픽업상품 상세
        @elseif(($page ?? '') == 'my_order')
            픽업 주문내역
        @elseif(($page ?? '') == 'my_coupon')
            픽업 쿠폰함
        @elseif(($page ?? '') == 'my_point')
            픽업 적립금
        @elseif(($page ?? '') == 'my_store')
            픽업 관심매장
        @elseif(($page ?? '') == 'my_product')
            픽업 관심상품
        @elseif(($page ?? '') == 'my_review')
            픽업 상품후기
        @elseif(($page ?? '') == 'my_qna')
            Q&A
        @elseif(($page ?? '') == 'cart')
            장바구니
        @elseif(($page ?? '') == 'storeQna')
            {{$store->fcTrader->companyName ?? '매장'}}에 문의하기
        @elseif(($page ?? '') == 'term')
            이용약관
        @elseif(($page ?? '') == 'notice')
            공지사항
        @endif
        </p>
    </div>
    @endif
</header>
