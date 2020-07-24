$(document).ready(function(){
    $.ajaxSetup({
        //ajax IE, Edge 통신을 위한 cache 세팅
        cache : false,
        //ajax 중복 호출 방지
        async : false,
        //ajax 통신을 위한 csrf-token 세팅
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
});

var PickupCommon = {
    _config : {
        SUBMIT_WRITE : true,
        page: 1,
        scrollAction : true,
    },

    pageMove : function(url){
        var baseUrl = location.origin + location.pathname + PickupCommon.defineSearchParameter(PickupCommon._config.page);
        history.pushState({scrollTop : $(window).scrollTop()}, null, baseUrl);
        location.href = url;
    },

    pageMoveTarget : function(url, target){
        var baseUrl = location.origin + location.pathname + PickupCommon.defineSearchParameter(PickupCommon._config.page);
        history.pushState({scrollTop : $(target).scrollTop()}, null, baseUrl);
        location.href = url;
    },

    defineSearchParameter : function(page){
        var baseUrl = '?';
        var searchValue = '';
        if(location.search != ''){
            searchValue = location.search.substring(1, location.search.length).split(/\?|\&/);
            var issetPage = false;
            for(var i = 0; i < searchValue.length ; i++){
                if(searchValue[i].indexOf('page=') != -1){
                    issetPage = true;
                    searchValue[i] = 'page='+page;
                }
            }
            baseUrl = baseUrl + searchValue.join('&');
            if(!issetPage){
                baseUrl = baseUrl + '&page='+page;
            }
        }else{
            baseUrl = baseUrl + 'page='+page;
        }
        return baseUrl;
    },

    //# 관심매장 추가 / 삭제
    storeLike : function(store_id, status){
        $.get('/front/api/add/store', {'store_id':store_id, 'status':status}, function(res) {
            if(res.code == 600){
                pageModal.alertPopup(res.msg);
                return false;
            }
            if(res.code == 200){
                //# 메인 관심매장 등록
                $('.storeTitle-container .clicking-btn').attr('onclick', "PickupCommon.storeLike('" + res.store_id + "', 'delete')");
                $('.storeTitle-container .clicking-btn').children('img').attr('src','/front/dist/img/icon_star_on.png');
                if( $('.enjoyStore-list ul li').length == 0 ) {
                    $('.enjoyStore-list p').remove();
                }
                var html = '<li onclick="location.href=\'/front/main?store_id=' + res.store_id + '\'" class="store_' + res.store_id + '">';
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
            }else if(res.code == 300){
                //# 메인 관심매장 취소
                $('.storeTitle-container .clicking-btn').attr('onclick', "PickupCommon.storeLike('" + res.store_id + "', 'add')");
                $('.storeTitle-container .clicking-btn').children('img').attr('src','/front/dist/img/icon_star.png');
                $('.store_' + store_id).remove();
                if( $('.enjoyStore-list ul li').length == 0 ) {
                    $('.enjoyStore-list').append('<p class="none-list">관심매장이 없습니다.</p>');
                }
                //# 마이페이지 관심매장 취소
                $('.attention-content .storeList-'+res.store_id).remove();
                if( $('.attention-content .storeList-container').length == 0 ) {
                    $('.attention-content').append('<div class="storeList-container"><p class="none-list">관심매장이 없습니다.</p></div>');
                }
            }else{
                pageModal.alertPopup(res.msg);
                return false;
            }
        });
    },

    //# 관심상품 추가 / 삭제
    productLike : function(product_id, status){
        $.get('/front/api/add/product', {'product_id':product_id, 'status':status}, function(res) {
            //# 로그인 요청
            if(res.code == 600){
                pageModal.alertPopup(res.msg);
                return false;
            }
            //# 추가
            if(res.code == 200){
                $('.clicking').addClass('active');
                $('.clicking').children('img').attr('src',$('.clicking').children('img').attr('src').replace('.png','_on.png'));
                $('.clicking').attr('onclick','PickupCommon.productLike(' +  res.product_id + ', \'delete_2\')');
            }
            //# 메인에서 삭제
            else if(res.code == 300){
                $('.wishList-container .wish-wrapper-'+res.product_id).remove();
                $('.wish-content .total-info span').text(Number($('.wish-content .total-info span').text())-1);
                if( $('.wishList-container .wish-wrapper').length == 0 ) {
                    $('.wishList-container').append('<p class="none-list">등록된 상품이 없습니다.</p>');
                    $('.wish-content .total-info span').text(0).removeClass('colorNum');
                }
            }
            //# 상품에서 삭제
            else if(res.code == 302){
                $('.clicking').removeClass('active');
                $('.clicking').children('img').attr('src',$('.clicking').children('img').attr('src').replace('_on.png','.png'));
                $('.clicking').attr('onclick','PickupCommon.productLike(' +  res.product_id + ', \'add\')');
            }
            //# 전체 삭제
            else if(res.code == 301){
                $('.wishList-container').empty();
                $('.wishList-container').append('<p class="none-list">등록된 상품이 없습니다.</p>');
                $('.wish-content .total-info span').text(0).removeClass('colorNum');
            }
            //# 에러
            else{
                pageModal.alertPopup(res.msg);
                return false;
            }
        });
    },

    //# 상품 선택
    selProduct : function (product_id, device_id, status='cart') {
        $.get('/front/cart/sel', {'product_id':product_id, 'device_id':device_id}, function(res) {
            if(res.code == 200){
                $('.purchase-wrapper .header-section p').html(res.name);
                $('.purchase-wrapper .totalNum span').html(res.price);
                $('.purchase-wrapper .goodsAmount').text(1);
                $('.purchase-wrapper .up-btn').attr('onclick', 'pageModal.cntNum(' + res.cnt + ', \'plus\',' + res.price.replace(/,/gi,'') + ')');
                $('.purchase-wrapper .down-btn').attr('onclick', 'pageModal.cntNum(' + res.cnt + ', \'minus\',' + res.price.replace(/,/gi,'') + ')');
                if(status == 'pay'){
                    $('.purchase-wrapper .footer-section').attr('onclick', 'PickupCommon.addOrder('+ product_id + ', '+ device_id + ', \'product\')');
                    $('.purchase-wrapper .footer-section button').text('구매하기');
                }else{
                    $('.purchase-wrapper .footer-section').attr('onclick', 'PickupCommon.addCart('+ product_id + ', '+ device_id + ', \'add\')');
                    $('.purchase-wrapper .footer-section button').text('장바구니 추가하기');
                }
                pageModal.cartPopup();
            }else{
                pageModal.alertPopup(res.msg);
                return false;
            }
        });
    },

    //# 장바구니 추가 / 삭제
    addCart : function (product_id, device_id, status) {
        var cnt = $('.purchase-wrapper .goodsAmount').text();

        $.get('/front/cart/add', {'product_id':product_id, 'device_id':device_id, 'status':status, 'cnt':cnt}, function(res) {
            if(res.code == 600){
                pageModal.alertPopup(res.msg);
                return false;
            }
            if(res.code == 200){
                $('.popup-wrapper').removeClass('active');
                pageModal.cartSavePopup();
            }else if(res.code == 300){
                //# 매장 유일값일 경우, 매장 제거
                if($('.content-area .product_'+res.product_id).parent('.store-wrap').find('.content-wrap').length == 1){
                    //# 체크박스 체크되어 있을 경우, 금액 재계산
                    if($("#check_item_" + res.product_id).prop("checked")){
                        $('.content-area .product_'+res.product_id).parent('.store-wrap').remove();
                        PickupCart.totalPrice();
                    }else{
                        $('.content-area .product_'+res.product_id).parent('.store-wrap').remove();
                    }
                }else{
                    if($("#check_item_" + res.product_id).prop("checked")){
                        $('.content-area .product_'+res.product_id).remove();
                        PickupCart.totalPrice();
                    }else{
                        $('.content-area .product_'+res.product_id).remove();
                    }
                }
                if( $('.content-area .content-wrap').length == 0 ) {
                    $('.content-area').append('<p class="none-list">등록된 상품이 없습니다.</p>');
                }
            }else if(res.code == 301){
                $('.content-area').empty();
                $('.content-area').append('<p class="none-list">등록된 상품이 없습니다.</p>');
                $(".totalPrice span").text(0);
                $(".totalPrice_m").text(0);
                $('.totalCnt').text(0);
                $("input[type=checkbox]").prop("checked",false);
            }else{
                pageModal.alertPopup(res.msg);
                return false;
            }
        });
    },

    //# 구매하기 버튼 클릭
    addOrder : function (product_id = '', device_id = '', type = 'cart') {
        var data = new FormData();
        if(type == 'cart'){
            //# 장바구니에서 구매하기
            data.append('product', JSON.stringify(PickupCart._config.productList));
        }else{
            //# 상품에서 구매하기
            var num = $('.purchase-wrapper .goodsAmount').text();
            data.append('product', JSON.stringify([[product_id,device_id,num]]));
        }
        data.append('type', type);
        $.ajax({
            type: 'POST',
            url: "/front/cart/pay",
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.code == 200) {
                    location.href = res.url;
                }else{
                    pageModal.alertPopup(res.msg);
                    return false;
                }
            }
        });
    },

    //# 결제하기 버튼 클릭
    addPay : function () {
        if (PickupCommon._config.SUBMIT_WRITE) {
            PickupCommon._config.SUBMIT_WRITE = false;
            var data = new FormData();
            data.append('product_all', $('input[name="product_all"]').val());
            data.append('user_name', $("input[name='user_name']").val());
            data.append('user_phone_1', $("input[name='user_phone_1']").val());
            data.append('user_phone_2', $("input[name='user_phone_2']").val());
            data.append('user_phone_3', $("input[name='user_phone_3']").val());
            data.append('user_email_1', $("input[name='user_email_1']").val());
            if ($('select[name="user_email_2"]').val() == 'direct') {
                data.append('user_email_2', $('input[name="user_email_2"]').val());
            } else {
                data.append('user_email_2', $('select[name="user_email_2"]').val());
            }
            data.append('coupon', $('select[name="coupon"]').val());
            data.append('user_point', $('input[name="user_point"]').val());
            data.append('price', $('.price-total').text());
            data.append('agree', $("input[name='agree']:checked").val());

            $.ajax({
                type: 'POST',
                url: "/front/order",
                data: data,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.code == 200) {
                        //# 결제 API 호출
                        $.get('/front/api/order/' + res.order_id, function (res_2) {
                            if (res_2.code == 200) {
                                location.href = '/front/order/result/' + res.order_id;
                            } else {
                                pageModal.alertPopup(res_2.msg);
                                PickupCommon._config.SUBMIT_WRITE = true;
                                return false;
                            }
                        });
                    } else {
                        pageModal.alertPopup(res.msg);
                        PickupCommon._config.SUBMIT_WRITE = true;
                        return false;
                    }
                }
            });
        }
    },

    //# 매장 문의하기
    qnaStore : function (qna_id = '0', status = 'add') {
        var data = new FormData();
        data.append('store_id', $("input[name='store_id']").val());
        data.append('category', $('select[name="category"]').val());
        data.append('contents', $('[name=contents]').val());
        data.append('qna_id', qna_id);
        data.append('status', status);
        $.ajax({
            type: 'POST',
            url: "/front/mypage/qna/store",
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if(res.code == 600){
                    pageModal.alertPopup(res.msg);
                    return false;
                }

                if (res.code == 200) {
                    location.href='/front/mypage/qna?store';
                }else{
                    pageModal.alertPopup(res.msg);
                    return false;
                }
            }
        });
    },

    //# 상품 문의하기
    qnaProduct : function (qna_id = '0', status = 'add') {
        var data = new FormData();
        data.append('product_id', $("input[name='product_id']").val());
        data.append('category', $('select[name="category"]').val());
        data.append('contents', $('[name=contents]').val());
        data.append('secret', $('input[name=secret]:checked').val());
        data.append('qna_id', qna_id);
        data.append('status', status);
        $.ajax({
            type: 'POST',
            url: "/front/mypage/qna/product",
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if(res.code == 600){
                    pageModal.alertPopup(res.msg);
                    return false;
                }

                if (res.code == 200) {
                    location.href='/front/mypage/qna';
                }else{
                    pageModal.alertPopup(res.msg);
                    return false;
                }
            }
        });
    },

    //# 쿠폰 등록하기
    addCoupon : function () {
        var data = new FormData();
        data.append('coupon_num', $('input[name="coupon"]').val());
        $.ajax({
            type: 'POST',
            url: "/front/mypage/coupon",
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.code == 600) {
                    alert("로그인 해주세요.");
                    return false;
                }

                if (res.code == 200) {
                    var html = '';
                    html    += '<div class="coupon-section">';
                    html    += '    <div class="sale-box">';
                    html    += '        <div class="word-item">';
                    html    += '            <div class="toTop">';
                    html    += '                <p class="storeName"><span>' + res.name + '</span></p>';
                    html    += '                <p class="couponTerm">' + res.date + '</p>';
                    html    += '            </div>';
                    html    += '            <div class="mainTxt"><span>' + res.price + '</span>원 할인</div>';
                    html    += '            <div class="subTxt">' + res.price_min + '원 이상 구매시 사용가능</div>';
                    html    += '        </div>';
                    html    += '    </div>';
                    html    += '    <div class="dDay-box">';
                    html    += '        <div class="dDay-item">';
                    html    += '            <div class="countNumber">D-6</div>';
                    html    += '            <div class="countDate">남은기간</div>';
                    html    += '        </div>';
                    html    += '    </div>';
                    html    += '</div>';
                    $('.coupon-container').append(html);
                    $('.none-list').remove();
                    $('.word-box .colorNum').text(Number($('.word-box .colorNum').text())+1);
                    $('input[name="coupon"]').val('');
                    $('.btn-box button').removeClass('active');
                    $('.btn-box button').attr('onclick', "");
                    pageModal.alertPopup(res.msg);
                    return false;
                } else {
                    $('input[name="coupon"]').val('');
                    pageModal.alertPopup(res.msg);
                    return false;
                }
            }
        });
    },

    //# 상품후기 등록 / 수정 / 삭제
    addReview : function(review_id, status='add'){
        var data = new FormData();
        if(status != 'delete'){
            data.append('product_id', $('input[name="product_id"]').val());
            data.append('score', $("input:radio[name='star-input']:checked").val());
            data.append('contents', $('[name=contents]').val());
        }
        data.append('review_id', review_id);
        data.append('status', status);
        $.ajax({
            type: 'POST',
            url: "/front/mypage/review/save",
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                if(res.code == 600){
                    pageModal.alertPopup(res.msg);
                    return false;
                }
                if (res.code == 200) {
                    location.href='/front/mypage/review';
                }else if (res.code == 300) {
                    $('.review_' + res.review_id).remove();
                    if( $('.delete-list').closest('.has-review').children().length == 0 ) {
                        $('.review-content .has-review').append('<p class="none-list">내가쓴 후기가 없습니다.</p>');
                    }
                }else{
                    pageModal.alertPopup(res.msg);
                    return false;
                }
            }
        });
    }
}




