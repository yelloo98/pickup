$(document).ready(function(){
    $('.close-box').click(function(){
        $(this).parents('.popup-wrapper').removeClass('active');
        $('.content-body').removeClass('fixed-scroll');
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
});
