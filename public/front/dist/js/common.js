"use strict";

//페이지 타이틀체인지
var pageHtml = ["/gnb_pet_main.html", "/comment.html", "/gnb_basic_main.html", "/gnb_qna_main.html", "/gnb_qna_detail.html", "/mypage.html", "/nav_scraped.html", "/nav_alarm.html", "/index_write.html", "/index_search.html", "/mypage_addPet_cat.html", "/mypage_addPet_dog.html", "/mypage_addPet.html", "/mypage_detailPet_cat.html", "/mypage_detailPet_dog.html", "/footer_CS_notice.html", "/footer_CS_write.html", "/footer_CS.html", "/footer_conditions.html", "/footer_privacy.html", "/footer_policy.html"];
var pageTitle = ["강아지게시판", "댓글", "게시판", "댕냥 Q&A", "강아지 Q&A", "마이페이지", "스크랩북", "알림", "댕냥 한컷", "검색", "고양이 정보 입력", "강아지 정보 입력", "반려동물 등록", "반려동물 상세", "반려동물 상세", "공지사항", "고객센터", "고객센터", "이용약관", "개인정보처리방침", "운영정책"];

pageHtml.forEach(function (item, index, array) {
    if (item == location.pathname) {
        var pageTitleName = pageTitle[index];
        $(".pageTitle").text(pageTitleName);
    }
});

//푸터 액티브
$('.footer-wrapper li').click(function () {
    $(this).addClass('active').siblings('li').removeClass('active');
});

//탭
$('.tab-container li').click(function () {
    $(this).addClass('active').siblings('li').removeClass('active');

    var tabItem = $('.tab-container li.active').index();

    $('.list-wrapper').eq(tabItem).addClass('active').siblings('.list-wrapper').removeClass('active');
});

// window.__scrollPosition = document.documentElement.scrollTop || 0;


// document.addEventListener('scroll', function() {
//     let _documentY = document.documentElement.scrollTop;
//     let direction = _documentY - window.__scrollPosition >= 0 ? 1 : -1;
//     console.log(direction); // 콘솔창에 스크롤 방향을 출력

//     window.__scrollPosition = _documentY; // Update scrollY
//     if ( direction == 1 ) {
//         $('header').slideUp(100);
//     } else if ( direction == -1 ) {
//         $('header').slideDown(100);
//     }
// });

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function (event) {
    // didScroll = true; 

    if ($(window).scrollTop() > 0) {
        $('.transparent-header').addClass('active').removeClass('passive');
    } else {
        $('.transparent-header').removeClass('active').addClass('passive');
    }
});

setInterval(function () {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 100);

function hasScrolled() {
    var st = $(window).scrollTop();

    if (Math.abs(lastScrollTop - st) <= delta) return;

    if (st > lastScrollTop) {
        $('header').slideUp(100);
        // alert('Up');
    } else {
        if (st + $(window).height() < $(document).height()) {
            $('header').slideDown(100);
            // alert('down');
        }
    }
    lastScrollTop = st;
}
//# sourceMappingURL=common.js.map
