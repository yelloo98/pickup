$(document).ready(function(){
    var machineItem = $('.machine-tabItem .img-box').outerWidth();
    $('.machine-tabItem .img-box').css('height',machineItem);

    $('.machine-tab li').click(function(){
        $(this).addClass('active').siblings('li').removeClass('active');
        var machineTarget = $(this).index();
        $('.machine-list li').eq(machineTarget).addClass('active').siblings('li').removeClass('active');
    });

});
