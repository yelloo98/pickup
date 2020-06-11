<footer>
    <div class="tab-footer">
        <div class="shadow-box"></div>
        <ul>
            <li class="active">
                <img src="/front/dist/img/icon_tab_01on.png" alt="">
                <p>픽업상품</p>
            </li>
            <li onclick="location.href='http://m.chaesukwoo1.godomall.com';">
                    <img src="/front/dist/img/icon_tab_02off.png" alt="">
                    <p>쇼핑몰</p>
            </li>
        </ul>
    </div>
</footer>

<script>
    $('.tab-footer ul li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        if ($(this).hasClass('active')) {
            $(this).children('img').attr("src", $(this).children('img').attr("src").replace("off.png", "on.png"));
            $(this).siblings().children('img').attr("src", $(this).siblings().children('img').attr("src").replace("on.png", "off.png"));
        }
    });
</script>
