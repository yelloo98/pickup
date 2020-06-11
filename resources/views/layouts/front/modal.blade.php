
<div class="fullPopup-wrapper">
    <div class="header-section">
        <p>매장검색</p>
        <button>
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
                        <select name="" id="">
                            <option value="" disabled selected hidden>지역</option>
                            <option value="">서울시</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                    <li>
                        <select name="" id="">
                            <option value="" disabled selected hidden>시/군/구</option>
                            <option value="">광진구</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                    <li>
                        <select name="" id="">
                            <option value="" disabled selected hidden>읍/면/동</option>
                            <option value="">군자동</option>
                        </select>
                        <img src="/front/dist/img/icon_select01.png" alt="">
                    </li>
                </ul>
                <div class="map-area">
                    <div class="etc-text">
                        <p>주소를 선책하시면<br>이곳에 매장이 표시됩니다.</p>
                    </div>
                </div>
            </div>
            <div class="tabTarget"></div>
            <div class="tabTarget"></div>
        </div>
    </div>
</div>

<div class="index-box">
    {{-- 로그인 메뉴 --}}
    <div class="popup-wrapper login-wrapper">
        <div class="popup-inner">
            <button class="close-box" onclick="pageModal.closePopup();"><img src="/front/dist/img/icon_X_B.png" alt=""></button>
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
                            <div class="user-header">
                                <p class="user-name"><strong><span>신유미</span>님</strong>환영합니다.</p>
                                <button class="edit-info">내 정보 수정하기 <img src="/front/dist/img/icon_arrow_S.png" alt=""></button>
                            </div>
                            <div class="user-items">
                                <button>
                                    <img src="/front/dist/img/icon_menu01.png" alt="">
                                    <p>주문내역</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu02.png" alt="">
                                    <p>쿠폰함</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu03.png" alt="">
                                    <p>적립금</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu04.png" alt="">
                                    <p>관심매장</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu05.png" alt="">
                                    <p>관심상품</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu06.png" alt="">
                                    <p>상품후기</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu07.png" alt="">
                                    <p>Q&A</p>
                                </button>
                                <button>
                                    <img src="/front/dist/img/icon_menu08.png" alt="">
                                    <p>장바구니</p>
                                </button>
                            </div>
                            <div class="userBar-items">
                                <ul>
                                    <li>알림 수신 동의<div class="custom-box"><input type="checkbox" id="toggleing01"><label for="toggleing01" class="radio"><span class="checkbox-custom"></span></label></div></li>
                                    <li>이용약관<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                    <li>공지사항<img src="/front/dist/img/icon_arrow_MR.png" height="13px" width="8px" alt=""></li>
                                </ul>
                            </div>
                            <div class="telephone-item">
                                <p class="phoneNum">1811-6359</p>
                                <p class="operatingTime">평일 <span>09:00~19:00</span> / 토요일 <span>09:00~13:00</span></p>
                                <p class="copyRight">© FRESHSTORE All rights reserved</p>
                                <div class="btn-section">
                                    <button>로그아웃<img src="/front/dist/img/icon_logout.png" width="12px" height="12px" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabTarget ">
                        <div class="user-area logout-form">
                            <div class="user-header logOut">
                                <pre>로그인하셔서 더 많은<br>혜택을 만나보세요!</pre>
                                <div class="btn-area">
                                    <button class="loginBtn">로그인</button>
                                    <button class="joinBtn">회원가입</button>
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
</div>

<script src="/front/dist/js/modal.func.js"></script>
