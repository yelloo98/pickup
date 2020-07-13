var pageMain = {
    _config : {},

    selProduct : function (product_id) {
        var $target = $(event.target);
        if($target.is("img")) {
            PickupCommon.selProduct(product_id, 'cart');
        }else{
            location.href = '/front/product/' + product_id;
        }
    }
};

$(document).ready(function(){
    var swiperMain = new Swiper('.swiper-container.mainSlide-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiperItem = new Swiper('.swiper-container.itemSlide-container', {
        slidesPerView: 'auto',
        spaceBetween: 10,
    });

    var swiperWide = new Swiper('.swiper-container.wideSlide-container', {
        slidesPerView: 'auto',
        spaceBetween: 10,
    });
    var swiperReview = new Swiper('.swiper-container.reviewSlide-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
    });
    var swiperCube = new Swiper('.swiper-container.cubeItem-container', {
        slidesPerView: 'auto',
        spaceBetween: 10,
    });

    var mainItemList = $('.cubeBox-wrapper .img-box').outerWidth();
    $('.cubeBox-wrapper .img-box').css('height',mainItemList);

    $('.red-link').click(function(){
        $('#storeSearch').addClass('slideIn').removeClass('slideOut');
        $(this).closest('.content-body').addClass('fixed-scroll');
    });

    $('.alarm-btn').click(function(){
        $('#PPalarm').addClass('slideIn').removeClass('slideOut');
        $(this).closest('.content-body').addClass('fixed-scroll');
    });




    $('.pin').click(function(){
        if ( $(this).hasClass('default-pin') ) {
            $(this).children('img').attr("src",$(this).children('img').attr("src").replace("_pin","_mainpin"));
            $(this).siblings().children('img').attr("src",$(this).siblings().children('img').attr("src").replace("_mainpin","_pin"));
            $(this).removeClass('default-pin').siblings().addClass('default-pin');
        }
    });

    $('.pin img').click(function(){
        $('.storeInfo-slide').slideDown(300);
    });

    $('.full-close').click(function(){
        $(this).closest('.fullPopup-wrapper').removeClass('slideIn').addClass('slideOut');
        $('.content-body').removeClass('fixed-scroll');
    });


    //관심매장 리스트 없는경우
    if( $('.enjoyStore-list ul li').length == 0 ) {
        $('.enjoyStore-list').append('<p class="none-list">관심매장이 없습니다.</p>');
    }

    //알림 리스트 없는경우
    if( $('.alarm-list ul li').length == 0 ) {
        $('.alarm-list').append('<p class="none-list">등록된 알림이 없습니다.</p>');
    }

    $('.delete-list').click(function(){
        $(this).closest('li').remove();
        if( $('.alarm-list ul li').length == 0 ) {
            $('.alarm-list').append('<p class="none-list">등록된 알림이 없습니다.</p>');
        }
    });

    /*$('.clicking-btn').click(function(){
        $(this).toggleClass('active');
        if ( $(this).hasClass('active') ) {
            $(this).children('img').attr('src','/front/dist/img/icon_star_on.png');
        } else {
            $(this).children('img').attr('src','/front/dist/img/icon_star.png');
        }
    });*/

});
