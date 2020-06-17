var PickupCommon = {
    _config : {},
    storeLike : function(store, customer){
        $.get('/front/add/store', {'store_id':store, 'customer_id':customer}, function(res) {
            if(res.code == 600){
                alert("로그인 해주세요.");
                return false;
            }
            if(res.code == 200){
                $('.clicking-btn').children('img').attr('src','/front/dist/img/icon_star_on.png');
            }else{
                $('.clicking-btn').children('img').attr('src','/front/dist/img/icon_star.png');
            }
        });
    }
}



