<div id="storeSearch" class="fullPopup-wrapper">
    <div class="header-section">
        <p>매장검색</p>
        <button class="full-close">
            <img src="/front/dist/img/icon_X_B.png" alt="">
        </button>
    </div>

    <div class="tab-section">
        <ul>
            <li class="tabItem active">주소로 찾기</li>
            <li class="tabItem">현재위치</li>
            <li class="tabItem">관심매장</li>
        </ul>
        <div class="target-wrap">
            <div class="tabTarget active">
                <ul>
                    <li>
                        <select class="noneVal" name="" id="">
                            <option value="" disabled selected hidden>지역</option>
                            <option value="">서울시</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                    <li>
                        <select class="noneVal" name="" id="">
                            <option value="" disabled selected hidden>시/군/구</option>
                            <option value="">광진구</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                    <li>
                        <select class="noneVal" name="" id="">
                            <option value="" disabled selected hidden>읍/면/동</option>
                            <option value="">군자동</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                </ul>
                <div class="map-area">
                    <div class="etc-text">
                        <p>주소를 선택하시면<br>이곳에 매장이 표시됩니다.</p>
                    </div>
                </div>
            </div>
            <div class="tabTarget ">
                <ul>
                    <li class="full-size">
                        <select name="" id="">
                            <option value="" selected>내주변 1km</option>
                            <option value="">내주변 3km</option>
                            <option value="">내주변 5km</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                </ul>
                <div class="map-area fake-box">
                    <div class="research-box">
                        <p>여기에서 재검색</p>
                        <img src="/front/dist/img/icon_refresh.png" alt="">
                    </div>
                    <div class="pin-wrap">
                        <button class="pin default-pin">
                            <img src="/front/dist/img/icon_pin.png" alt="">
                        </button>
                        <button class="pin focus-pin">
                            <img src="/front/dist/img/icon_mainpin.png" alt="">
                        </button>
                    </div>
                </div>
                <div class="storeInfo-slide">
                    <div class="store-header">
                        <span>군자점</span>
                        <button>매장선택</button>
                    </div>
                    <div class="store-address">
                        <p>경상남도 경기도 성남시 중현구 양원2로 11번길 21345호21345호</p>
                        <small>02)234-1234</small>
                    </div>
                </div>
            </div>
            <div class="tabTarget ">
                <div class="enjoyStore-list">
                    <ul>
                        @if(isset($store_like) && $store_like->count() > 0)
                            @foreach($store_like as $k=>$v)
                            <li onclick="location.href='/front/main?store_id={{$v->fc_trader->traderNo ?? 0}}'" class="store_{{$v->fc_trader->traderNo ?? 0}}">
                                <div class="store-info">
                                    <div class="store-header">
                                        <span>{{$v->fc_trader->companyName ?? ''}}</span>
                                    </div>
                                    <div class="store-address">
                                        <p>{{$v->fc_trader->address ?? ''}}</p>
                                        <small>{{\App\Helper\Codes::formatPhone($v->fc_trader->tel ?? '')}}</small>
                                    </div>
                                </div>
                                <img src="/front/dist/img/icon_arrow_MR.png" alt="">
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="PPalarm" class="fullPopup-wrapper">
    <div class="header-section">
        <p>알림</p>
        <button class="full-close">
            <img src="/front/dist/img/icon_X_B.png" alt="">
        </button>
    </div>
    <div class="list-section alarm-list">
        <ul>
            <li>
                <button class="delete-list">
                    <img src="/front/dist/img/icon_x_S.png" alt="">
                </button>
                <div class="list-date">
                    <p>2020-03-22</p>
                </div>
                <div class="list-subject">
                    <p>삼겹살이 2000원!!</p>
                </div>
                <div class="list-content">
                    <p>오직 프래쉬스토어 성남점에서만 볼 수 있는 이벤트를 진행합니다! 삼겹살이 2000원! 오직 프래쉬스토어 성남점에서만 볼 수 있는 이벤트를 진행합니다! 삼겹살이 2000원!</p>
                </div>
            </li>
            <li>
                <button class="delete-list">
                    <img src="/front/dist/img/icon_x_S.png" alt="">
                </button>
                <div class="list-date">
                    <p>2020-03-22</p>
                </div>
                <div class="list-subject">
                    <p>삼겹살이 2000원!!</p>
                </div>
                <div class="list-content">
                    <p>오직 프래쉬스토어 성남점에서만 볼 수 있는 이벤트를 진행합니다! 삼겹살이 2000원! 오직 프래쉬스토어 성남점에서만 볼 수 있는 이벤트를 진행합니다! 삼겹살이 2000원!</p>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="index-box">
    <div class="popup-wrapper basic-wrapper alert-wrapper-two">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="content-section">
                <p>장바구니에 담았습니다.</p>
            </div>
            <div class="footer-section">
                <button class="continue">계속쇼핑하기</button>
                <button class="go">장바구니 보러가기</button>
            </div>
        </div>
    </div>

    <div class="popup-wrapper basic-wrapper alert-wrapper" style="z-index: 999">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="content-section">
                <p>기본 팝업</p>
            </div>
            <div class="footer-section one-btn">
                <button class="go close-btn">확인</button>
            </div>
        </div>
    </div>

    <div class="popup-wrapper review-wrapper ">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="header-section">
                <p>포토후기</p>
            </div>
            <div class="content-section">
                <div class="star-box">
                    <div class="starImg">
                        <img src="/front/dist/img/icon_star_on_B.png" alt="">
                        <img src="/front/dist/img/icon_star_on_B.png" alt="">
                        <img src="/front/dist/img/icon_star_on_B.png" alt="">
                        <img src="/front/dist/img/icon_star_off_B.png" alt="">
                        <img src="/front/dist/img/icon_star_off_B.png" alt="">
                    </div>
                    <div class="nickname">
                        <p><span>김OO</span>님</p>
                    </div>
                </div>
                <div class="content-box">
                    <div class="img-area">
                        <img src="/front/dist/img/food.png" alt="">
                    </div>
                    <p>두번째 주문입니다.보기엔 생각보다 작아 보이는 데 먹어보니 은근 양이 꽤
                        많아요ㅎㅎ 쫀쫀하고 고소해서 그냥 냠냠 호로록 호로록 후루룩 ㅎ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-wrapper complete-wrapper ">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="header-section">
                <p>결제완료</p>
            </div>
            <div class="content-section">
                <div class="content-area">
                    <div class="info-box">
                        <div class="detailItem">
                            <p class="tableTitle">상품명</p>
                            <p class="goodsContent">미트박스 1인용 루꼴라에그토마토
                                자취생 취향저격 키트 200G
                            </p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">거래일시</p>
                            <p class="goodsContent">2020.01.31 13:00:22</p>
                        </div>
                        <div class="detailItem ">
                            <p class="tableTitle">결제금액</p>
                            <p class="goodsContent"><span>5,000</span>원</p>
                        </div>
                        <div class="detailItem ">
                            <div class="dashedImg"></div>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">총 결제금액</p>
                            <p class="goodsContent total"><span>12,500</span>원</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="detailItem">
                            <p class="tableTitle">매장명</p>
                            <p class="goodsContent">성남점</p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">매장위치</p>
                            <p class="goodsContent">경기도 성남시 중원구</p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">매장 전화번호</p>
                            <p class="goodsContent">031-320-1234</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <div class="detailItem">
                            <p class="tableTitle">상품 주문번호</p>
                            <p class="goodsContent num">1111-1234-1111</p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">픽업위치</p>
                            <p class="goodsContent">광진점 편의점</p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">기기번호</p>
                            <p class="goodsContent device">3번</p>
                        </div>
                        <div class="detailItem">
                            <p class="tableTitle">픽업마감일시</p>
                            <p class="goodsContent num">2020.01.31 24:00:00</p>
                        </div>
                    </div>
                </div>
                <div class="notice-area">
                    <p class="orderNum">주문번호:1111-1234-1111</p>
                    <p class="subText">(픽업 마감 일시를 꼭 준수해주시기 바랍니다.)</p>
                </div>
            </div>
            <div class="footer-section">
                <button>확인</button>
            </div>
        </div>
    </div>

    <div class="popup-wrapper access-wrapper ">
        <div class="popup-inner">
            <button class="close-box" ><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="header-section">
                <p>고객님의 편리한<br>이용을 위해 접근 권한의<br>허용이 필요합니다.</p>
            </div>
            <div class="content-section">
                <div class="allowInfo">
                    <img src="/front/dist/img/icon_position.png" alt="">
                    <div class="text-area">
                        <p class="main-text">위치</p>
                        <p class="sub-text">현재 위치 자동 수신</p>
                    </div>
                </div>
                <div class="allowInfo">
                    <img src="/front/dist/img/icon_camera.png" alt="">
                    <div class="text-area">
                        <p class="main-text">카메라</p>
                        <p class="sub-text">사진 리뷰 작성 시 사진 촬영,<br>
                            픽업상품 주문시 QR코드 스캔</p>
                    </div>
                </div>
                <div class="allowInfo">
                    <img src="/front/dist/img/icon_photo.png" alt="">
                    <div class="text-area">
                        <p class="main-text">사진</p>
                        <p class="sub-text">사진 리뷰 설정시 이미지 첨부</p>
                    </div>
                </div>
            </div>
            <div class="footer-section">
                <button>확인</button>
            </div>
        </div>
    </div>

    <div class="popup-wrapper purchase-wrapper">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="header-section">
                <p>미트박스 1인용 루꼴라 에그토마토 신선 식품 200G</p>
            </div>
            <div class="content-section">
                <div class="btnBlock">
                    <button class="up-btn"><img src="/front/dist/img/icon_up.png" alt=""></button>
                    <div class="goodsAmount"><span>1</span></div>
                    <button class="down-btn"><img src="/front/dist/img/icon_down.png" alt=""></button>
                </div>
                <div class="priceBlock">
                    <p class="totalText">총 합계</p>
                    <p class="totalNum"><span>22,950</span>원</p>
                </div>
            </div>
            <div class="footer-section">
                <button>장바구니 추가하기</button>
            </div>
        </div>
    </div>

    <div class="popup-wrapper login-wrapper">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_X_B.png" alt=""></button>
            <div class="header-section">
                <img src="/front/dist/img/icon_mainlogo_B.png" height="18px" width="150px" alt="">
            </div>
            <div class="content-section">
                <ul class="tab-list2">
                    <li class="tabItem active">픽업상품</li>
                    <li class="tabItem ">쇼핑몰</li>
                </ul>
                <div class="target-wrap">
                    <div class="tabTarget active">
                        <div class="user-area login-form">
                        @if(!empty($customer))
                            <div class="user-header">
                                <p class="user-name"><strong><span>{{$customer->name ?? ''}}</span>님</strong>환영합니다.</p>
                                <button class="edit-info" onclick="location.href='{{env('SHOP_URL')}}/mypage/my_page_password.php'">내 정보 수정하기<img src="/front/dist/img/icon_arrow_S.png" alt=""></button>
                            </div>
                            <div class="user-items">
                                <button onclick="location.href='/front/mypage/order'">
                                    <img src="/front/dist/img/icon_menu01.png" alt="">
                                    <p>주문내역</p>
                                </button>
                                <button onclick="location.href='/front/mypage/coupon'">
                                    <img src="/front/dist/img/icon_menu02.png" alt="">
                                    <p>쿠폰함</p>
                                </button>
                                <button onclick="location.href='/front/mypage/point'">
                                    <img src="/front/dist/img/icon_menu03.png" alt="">
                                    <p>적립금</p>
                                </button>
                                <button onclick="location.href='/front/mypage/store'">
                                    <img src="/front/dist/img/icon_menu04.png" alt="">
                                    <p>관심매장</p>
                                </button>
                                <button onclick="location.href='/front/mypage/product'">
                                    <img src="/front/dist/img/icon_menu05.png" alt="">
                                    <p>관심상품</p>
                                </button>
                                <button onclick="location.href='/front/mypage/review'">
                                    <img src="/front/dist/img/icon_menu06.png" alt="">
                                    <p>상품후기</p>
                                </button>
                                <button onclick="location.href='/front/mypage/qna'">
                                    <img src="/front/dist/img/icon_menu07.png" alt="">
                                    <p>Q&A</p>
                                </button>
                                <button onclick="location.href='/front/cart'">
                                    <img src="/front/dist/img/icon_menu08.png" alt="">
                                    <p>장바구니</p>
                                </button>
                            </div>
                        @else
                            <div class="user-header logOut">
                                <pre>로그인하셔서 더 많은<br>혜택을 만나보세요!</pre>
                                <div class="btn-area">
                                    <button class="loginBtn" onclick="location.href='{{env('SHOP_URL')}}/member/login.php'">로그인</button>
                                    <button class="joinBtn" onclick="location.href='{{env('SHOP_URL')}}/member/join_method.php'">회원가입</button>
                                </div>
                            </div>
                        @endif
                            <div class="userBar-items">
                                <ul>
                                    <li>알림 수신 동의<div class="custom-box"><input type="checkbox" id="toggleing01"><label for="toggleing01" class="radio"><span class="checkbox-custom"></span></label></div></li>
                                    <li onclick="location.href='/front/board/term'">이용약관<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                    <li onclick="location.href='/front/board/notice'">공지사항<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                    <li onclick="location.href='/front/board/event'">이벤트<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                </ul>
                            </div>
                            <div class="telephone-item">
                                <p class="phoneNum">1811-6359</p>
                                <p class="operatingTime">평일 <span>09:00~19:00</span> / 토요일 <span>09:00~13:00</span></p>
                                <p class="copyRight">© FRESHSTORE All rights reserved</p>
                                <div class="btn-section">
                                    <button onclick="location.href='{{env('SHOP_URL')}}/member/logout.php'">로그아웃<img src="/front/dist/img/icon_logout.png" width="12px" height="12px" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabTarget ">
                        <div class="user-area logout-form">
                            @if(!empty($customer))
                            <div class="user-header">
                                <p class="user-name"><strong><span>{{$customer->name ?? ''}}</span>님</strong>환영합니다.</p>
                                <button class="edit-info" onclick="location.href='{{env('SHOP_URL')}}/mypage/my_page_password.php'">내 정보 수정하기<img src="/front/dist/img/icon_arrow_S.png" alt=""></button>
                            </div>
                            <div class="user-items">
                                <button onclick="location.href='{{env('SHOP_URL')}}/mypage/index.php'">
                                    <img src="/front/dist/img/icon_menu09.png" alt="">
                                    <p>마이페이지</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/order/cart.php'">
                                    <img src="/front/dist/img/icon_menu08.png" alt="">
                                    <p>장바구니</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/mypage/wish_list.php'">
                                    <img src="/front/dist/img/icon_menu05.png" alt="">
                                    <p>찜리스트</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/board/list.php?bdId=goodsreview'">
                                    <img src="/front/dist/img/icon_menu06.png" alt="">
                                    <p>상품후기</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/service/faq_list.php'">
                                    <img src="/front/dist/img/icon_menu07.png" alt="">
                                    <p>FAQ</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/board/list.php?bdId=goodsqa'">
                                    <img src="/front/dist/img/icon_menu10.png" alt="">
                                    <p>상품문의</p>
                                </button>
                                <button onclick="location.href='{{env('SHOP_URL')}}/goods/goods_today.php'">
                                    <img src="/front/dist/img/icon_menu11.png" alt="">
                                    <p>최근본상품</p>
                                </button>
                            </div>
                            @else
                            <div class="user-header logOut">
                                <pre>로그인하셔서 더 많은<br>혜택을 만나보세요!</pre>
                                <div class="btn-area">
                                    <button class="loginBtn" onclick="location.href='{{env('SHOP_URL')}}/member/login.php'">로그인</button>
                                    <button class="joinBtn" onclick="location.href='{{env('SHOP_URL')}}/member/join_method.php'">회원가입</button>
                                </div>
                            </div>
                            @endif
                            <div class="nav_category">
                                <div class="nav_tabmenu_box">
                                    <div class="tab_menu0">
                                        <div class="prd_cate">
                                            <ul class="category_side">
                                                <li>
                                                    <a href="#;">축산물<span class="icon_plus">ICON</span></a>
                                                    <ul>
                                                        <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001" class="icon_arrow">전체보기</a></li>
                                                        <li>
                                                            <a href="#;">돼지고기<span class="icon_plus">ICON</span> </a>
                                                            <ul>
                                                                <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001001" class="icon_arrow">전체보기</a></li>
                                                                <li>
                                                                    <a href="#;">앞다리<span class="icon_plus">ICON</span> </a>
                                                                    <ul>
                                                                        <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001001001" class="icon_arrow"> - 전체보기</a></li>
                                                                        <li>
                                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001001001001" class="icon_arrow"> - 테스트1</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001001002" class="icon_arrow">뒷다리</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=001002" class="icon_arrow">소고기</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#;">가공품<span class="icon_plus">ICON</span></a>
                                                    <ul>
                                                        <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=002" class="icon_arrow">전체보기</a></li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=002001" class="icon_arrow">냉동</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=002002" class="icon_arrow">냉장</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#;">농산물<span class="icon_plus">ICON</span></a>
                                                    <ul>
                                                        <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=003" class="icon_arrow">전체보기</a></li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=003001" class="icon_arrow">채소</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#;">수산물<span class="icon_plus">ICON</span></a>
                                                    <ul>
                                                        <li><a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=004" class="icon_arrow">전체보기</a></li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=004001" class="icon_arrow">냉동</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{env('SHOP_URL')}}/goods/goods_list.php?cateCd=004002" class="icon_arrow">냉장</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- //prd_cate -->
                                    </div>
                                </div>
                            </div>
                            <div class="userBar-items">
                                <ul>
                                    <li>비회원 주문 조회<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                    <li>알림 수신 동의<div class="custom-box"><input type="checkbox" id="toggleing02"><label for="toggleing02" class="radio"><span class="checkbox-custom"></span></label></div></li>
                                    <li>이용약관<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                    <li>공지사항<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                </ul>
                            </div>
                            <div class="telephone-item">
                                <p class="phoneNum">1811-6359</p>
                                <p class="operatingTime">평일 <span>09:00~19:00</span> / 토요일 <span>09:00~13:00</span></p>
                                <p class="copyRight">© FRESHSTORE All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 결제완료 -->
    <div class="popup-wrapper payment-wrapper">
        <div class="popup-inner">
            <button class="close-box"><img src="/front/dist/img/icon_X_B.png" alt=""></button>
            <div class="header-section">
                <p>결제완료</p>
            </div>
            @if(!empty($orderResult))
            <div class="content-section">
                @if($orderResult->status == 'cancel')
                <div class="canceled-alarm">
                    <p>결제승인이 취소되었습니다.</p>
                </div>
                @endif
                <div class="price-title">
                    <p>총 결제금액</p>
                    <strong><span>{{number_format($orderResult->price ?? 0)}}</span>원</strong><!-- strong에 canceled 클래스 추가시 컬러변경 -->
                </div>
                <div class="table-container">
                    <p class="table-title">결제정보</p>
                    <ul class="price-table">
                        <li>
                            <ul>
                                <li>결제수단</li>
                                <li>{{$orderResult->approve_type ?? '자동결제'}}</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>결제금액</li>
                                <li><span>{{number_format($orderResult->price ?? 0)}}</span>원</li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>결제일시</li>
                                <li><span>{{$orderResult->created_at ?? now()}}</span>@if($orderResult->status == 'cancel')<small>승인취소</small>@endif</li>
                            </ul>
                        </li>
                        @if($orderResult->approve_type == 'card')
                        <li>
                            <ul>
                                <li>카드명</li>
                                <li><span>{{$orderResult->card_type ?? ''}}</span></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>할부개월</li>
                                <li><span>일시불</span></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
                @if($orderResult->approve_type == 'auto')
                <div class="alert-msg">
                    <span>※ 주의사항</span>
                    <ul>
                        <li><span>2020년 7월 5일 12:00:23시</span>까지 입금해 주시기바랍니다.</li>
                        <li>결제를 완료하시면 픽업번호가 생성됩니다.</li>
                    </ul>
                </div>
                @endif
                <div class="swiper-container price-container">
                    <div class="swiper-wrapper">
                        @foreach($orderProductList as $k => $v)
                        <div class="swiper-slide">
                                <ul class="numberling">
                                    @for($i=1; $i<=$orderProductList->count(); $i++)
                                        <li @if($k+1 == $i) class="active" @endif>{{$i}}</li>
                                    @endfor
                                </ul>
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <p>상품정보</p>
                                    </div>
                                    <ul class="table-content">
                                        <li>상품명<strong><span>{{$v->product->origin_product->name ?? ''}}</span></strong></li>
                                        <li>거래일시<strong><span>{{$v->created_at ?? ''}}</span></strong></li>
                                        <li>결제금액<strong class="price"><span>{{number_format($v->price ?? 0)}}</span>원</strong></li>
                                    </ul>
                                </div>
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <p>매장정보</p>
                                    </div>
                                    <ul class="table-content">
                                        <li>매장명<strong><span>{{$v->product->fc_trader->companyName ?? ''}}</span></strong></li>
                                        <li>매장위치<strong><span>{{$v->product->fc_trader->address ?? ''}}</span></strong></li>
                                        <li>매장전화번호<strong><span>{{\App\Helper\Codes::formatPhone($v->product->fc_trader->tel ?? '')}}</span></strong></li>
                                    </ul>
                                </div>
                                <div class="order-detail">
                                    <span>{{\App\Helper\Codes::deviceTypeText($v->device->frozen_type ?? '').($v->device->store_order_no ?? '')}}</span>
                                    <p class="order-number">픽업번호<span>{{$orderResult->pickup_num ?? ''}}</span></p>
                                    <p class="order-counting"><span>{{$orderResult->pickup_until_at ?? ''}}</span>까지</p>
                                    <p class="warning-text">(픽업가능시간안에 상품을 픽업하지 않으시면</p>
                                    <p class="warning-text"><span>결제가 자동취소</span>되오니 유의해주시기 바랍니다.)</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="popup-wrapper progress-wrapper">
        <div class="loading-inner">
            <img class="spinner" src="/front/dist/img/loading.png" alt="">
            <p class="loading-text">로딩중입니다, 잠시만 기다려주세요.</p>
        </div>
    </div>
</div>

<script src="/front/page/page.modal.func.js"></script>
<script src="/front/page/page.modal.init.js"></script>

