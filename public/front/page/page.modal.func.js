var pageModal = {
    _config : {},

    menuPopup : function(){
        $('.login-wrapper').addClass('active');
        $('.content-body').addClass('fixed-scroll');
    },

    cartPopup : function(){
        $('.purchase-wrapper').addClass('active');
    },

    alertPopup : function(msg){
        $('.alert-wrapper .content-section p').text(msg);
        $('.alert-wrapper').addClass('active');
    },

    cartSavePopup : function(){
        $('.cart-save-wrapper').addClass('active');
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
