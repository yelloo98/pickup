var pageModal = {
    _config : {},

    menuPopup : function(){
        $('.login-wrapper').addClass('active');
        $('.content-body').closest('.content-body').addClass('fixed-scroll');
    },

    cartPopup : function(){
        $('.purchase-wrapper').addClass('active');
    },
};
