$(document).ready(function(){
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 8,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
        },
    });

    $(".popup-wrapper").hide();

    $('.pp').click(function(){
        var btnIndex = $(this).index();
        $(".popup-wrapper").eq(btnIndex).show().sibling().hide();

    });

    $('.close-box').click(function(){
        $(this).parents('.popup-wrapper').hide();
    });
});
