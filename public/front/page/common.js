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
                $('.store_' + store).remove();
                if( $('.enjoyStore-list ul li').length == 0 ) {
                    $('.enjoyStore-list').append('<p class="none-list">관심매장이 없습니다.</p>');
                }
            }
        });
    }
}



