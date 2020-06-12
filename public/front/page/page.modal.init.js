$(document).ready(function(){
    $('.close-box').click(function(){
        $(this).parents('.popup-wrapper').removeClass('active');
        $(this).closest('.content-body').removeClass('fixed-scroll');
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
