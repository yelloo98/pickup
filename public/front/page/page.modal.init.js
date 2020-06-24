$(document).ready(function(){
    $('.close-box').click(function(){
        $(this).parents('.popup-wrapper').removeClass('active');
        $('.content-body').removeClass('fixed-scroll');
    });

    $('.close-btn').click(function(){
        $(this).parents('.popup-wrapper').removeClass('active');
    });

    $('.continue').click(function(){
        $(this).parents('.popup-wrapper').removeClass('active');
    });

    $('#priceBtn').click(function(){
        var swiperPrice = new Swiper('.swiper-container.price-container', {
            slidesPerView: 'auto',
            spaceBetween: 8,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
            },
        });
    });

    /* 카테고리 메뉴 */
    $('.category_side li a').on({
        'click':function(){
            $(this).siblings('ul').slideToggle(300);
            $(this).toggleClass('on');
        }
    });
});
