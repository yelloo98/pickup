$('.tab-footer ul li').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
    if ($(this).hasClass('active')) {
        $(this).children('img').attr("src", $(this).children('img').attr("src").replace("off.png", "on.png"));
        $(this).siblings().children('img').attr("src", $(this).siblings().children('img').attr("src").replace("on.png", "off.png"));
    }
});
