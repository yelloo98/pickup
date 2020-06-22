var pageModal = {
    _config : {},

    menuPopup : function(){
        $('.login-wrapper').addClass('active');
        $('.content-body').addClass('fixed-scroll');
    },

    cartPopup : function(){
        $('.purchase-wrapper').addClass('active');
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
                alert("재고가 없습니다.");
            }
        }else{
            cnt--;
            if(cnt >= 0){
                $('.purchase-wrapper .goodsAmount').text(cnt);
                $('.purchase-wrapper .totalNum span').text(pageModal.addComma(price * cnt));
            }else {
                alert("수량을 선택해주세요.");
            }
        }
    }
};
