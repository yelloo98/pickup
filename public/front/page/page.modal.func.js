var pageModal = {
    _config : {},

    menuPopup : function(){
        $('.login-wrapper').addClass('active');
        $('.content-body').addClass('fixed-scroll');
    },

    cartPopup : function(){
        $('.purchase-wrapper').addClass('active');
    },

    orderResultPopup : function(){
        $('.payment-wrapper').addClass('active');
    },

    alertPopup : function(msg){
        $('.alert-wrapper .content-section p').text(msg);
        $('.alert-wrapper').addClass('active');
    },

    cartSavePopup : function(){
        $('.alert-wrapper-two .content-section p').text('장바구니에 담았습니다.');
        $('.alert-wrapper-two .footer-section .continue').text('계속쇼핑하기');
        $('.alert-wrapper-two .footer-section .continue').attr('onclick','');
        $('.alert-wrapper-two .footer-section .go').attr('onclick',"location.href='/front/cart'");
        $('.alert-wrapper-two').addClass('active');
    },

    payCancelPopup : function(){
        $('.alert-wrapper-two .content-section p').text('입력한 정보가 사라집니다.');
        $('.alert-wrapper-two .footer-section .continue').text('취소');
        $('.alert-wrapper-two .footer-section .continue').attr('onclick','');
        $('.alert-wrapper-two .footer-section .go').text('확인');
        $('.alert-wrapper-two .footer-section .go').attr('onclick','javascript:history.back()');
        $('.alert-wrapper-two').addClass('active');
    },

    openProgressPopup : function(){
        $('.progress-wrapper').addClass('active');
    },

    closeProgressPopup : function(){
        $('.progress-wrapper').removeClass('active');
    },

    addComma : function (num) {
        var regexp = /\B(?=(\d{3})+(?!\d))/g;
        return num.toString().replace(regexp, ',');
    },

    cntNum : function(max, type, price){
        var cnt = $('.purchase-wrapper .goodsAmount').text();
        if(type == 'plus'){
            cnt++;
            if(cnt <= max){
                $('.purchase-wrapper .goodsAmount').text(cnt);
                $('.purchase-wrapper .totalNum span').text(pageModal.addComma(price * cnt));
            }else {
                pageModal.alertPopup('재고가 부족합니다.');
            }
        }else{
            cnt--;
            if(cnt >= 1){
                $('.purchase-wrapper .goodsAmount').text(cnt);
                $('.purchase-wrapper .totalNum span').text(pageModal.addComma(price * cnt));
            }else {
                pageModal.alertPopup('1개 이하는 선택할 수 없습니다.');
            }
        }
    }
};
