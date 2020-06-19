var PickupCommon = {
    _config : {},

    //# 관심매장 추가 / 삭제
    storeLike : function(store_id){
        var customer_id = $("input[name='customer_id']").val();

        $.get('/front/add/store', {'store_id':store_id, 'customer_id':customer_id}, function(res) {
            if(res.code == 600){
                alert("로그인 해주세요.");
                return false;
            }
            if(res.code == 200){
                $('.clicking-btn').children('img').attr('src','/front/dist/img/icon_star_on.png');
                if( $('.enjoyStore-list ul li').length == 0 ) {
                    $('.enjoyStore-list p').remove();
                }
                var html = '<li onclick="location.href=\'/front/main/' + res.store_id + '\'" class="store_' + res.store_id + '">';
                html    += '    <div class="store-info">';
                html    += '        <div class="store-header">';
                html    += '            <span>' + res.store_name + '</span>';
                html    += '        </div>';
                html    += '        <div class="store-address">';
                html    += '            <p>' + res.store_address + '</p>';
                html    += '            <small>' + res.store_tel + '</small>';
                html    += '        </div>';
                html    += '    </div>';
                html    += '    <img src="/front/dist/img/icon_arrow_MR.png" alt="">';
                html    += '</li>';
                $('.enjoyStore-list ul').append(html);
            }else{
                $('.clicking-btn').children('img').attr('src','/front/dist/img/icon_star.png');
                $('.store_' + store_id).remove();
                if( $('.enjoyStore-list ul li').length == 0 ) {
                    $('.enjoyStore-list').append('<p class="none-list">관심매장이 없습니다.</p>');
                }
            }
        });
    },

    //# 장바구니 선택
    selCart : function (product_id) {
        $.get('/front/sel/cart', {'product_id':product_id}, function(res) {
            if(res.code == 200){
                $('.purchase-wrapper .header-section p').html(res.name);
                $('.purchase-wrapper .totalNum span').html(res.price);
                $('.purchase-wrapper .goodsAmount').text(1);
                $('.purchase-wrapper .up-btn').attr('onclick', 'pageModal.cntNum(' + res.cnt + ', \'plus\',' + res.price.replace(/,/gi,'') + ')');
                $('.purchase-wrapper .down-btn').attr('onclick', 'pageModal.cntNum(' + res.cnt + ', \'minus\',' + res.price.replace(/,/gi,'') + ')');
                $('.purchase-wrapper .footer-section').attr('onclick', 'PickupCommon.addCart('+ product_id + ', \'add\')');
                pageModal.cartPopup();
            }else{
                alert(res.msg);
            }
        });
    },

    //# 장바구니 추가 / 삭제
    addCart : function (product_id, status) {
        var cnt = $('.purchase-wrapper .goodsAmount').text();
        var customer_id = $("input[name='customer_id']").val();

        $.get('/front/add/cart', {'product_id':product_id, 'status':status, 'cnt':cnt, 'customer_id':customer_id}, function(res) {
            if(res.code == 600){
                alert("로그인 해주세요.");
                return false;
            }
            if(res.code == 200){
                alert(res.msg);
            }else{
                alert(res.msg);
            }
        });
    }
}



