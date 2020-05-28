"use strict";

$(document).ready(function () {
    //페이지 타이틀체인지
    var pageHtml = ["/MP_conditions.html", "/MP_notice.html", "/MP_listUp_detail.html", "/PP_goodsDetail.html"];
    var pageTitle = ["이용약관", "공지사항", "공지약관상세페이지", "픽업상품"];

    pageHtml.forEach(function (item, index, array) {
        if (item == location.pathname) {
            var pageTitleName = pageTitle[index];
            $(".headerTitle").text(pageTitleName);
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

    $('.tabItem').click(function () {
        var tabItem = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $(this).parent('ul').siblings('.target-wrap').children('.tabTarget').eq(tabItem).addClass('active').siblings().removeClass('active');
    });
});
//# sourceMappingURL=common.js.map
