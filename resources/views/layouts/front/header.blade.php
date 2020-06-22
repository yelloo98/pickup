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
            <img src="/front/dist/img/icon_gnbBack.png" alt="">
        </button>
        <p class="headerTitle">
        @if(($page ?? '') == 'cart')
            장바구니
        @elseif(($page ?? '') == 'search')
            구매한 픽업상품
        @elseif(($page ?? '') == 'latest')
            최신 픽업상품
         @elseif(($page ?? '') == 'order')
            구매한 픽업상품
        @elseif(($page ?? '') == 'detail')
            구매한 픽업상품
        @elseif(($page ?? '') == 'mypage')
            마이 페이지
        @endif
        </p>
    </div>
    @endif
</header>
