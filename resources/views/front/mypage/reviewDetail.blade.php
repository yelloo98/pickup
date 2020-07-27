@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body write-content">
        <input type="hidden" name="product_id" value="{{$_GET['product_id'] ?? 0}}">
        <div class="goodsHeader-container">
            <div class="img-box" @if(!empty($product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$product->origin_product->image_path}}'); background-size:cover;" @endif></div>
            <div class="word-box">
                <p class="goods-subject">{{$product->origin_product->name ?? ''}}</p>
                <div class="goods-price"><p><span>{{number_format($product->price ?? 0)}}</span>원</p></div>
            </div>
        </div>
        <div class="goodsScore-container starArea">
            <span class="star-input">
                <output for="star-input"><b>{{number_format(($review->score ?? 0), 1)}}</b></output>
                <span class="input">
                    @for($i=1; $i<=10; $i++)
                    <input type="radio" name="star-input" id="p{{$i}}" value="{{$i/2}}" @if(($review->score ?? 0) == $i/2) checked @endif><label for="p{{$i}}">{{number_format($i/2, 1)}}</label>
                    @endfor
                </span>
            </span>
        </div>
        <div class="goodsWord-container">
            <textarea class="hasPhoto" name="contents" id="" cols="30" rows="10" placeholder="상품 후기를 작성해주세요.">{{$review->contents ?? ''}}</textarea>
            <div class="upload-btn">
                <input type="file" id="review_img" name="review_img" accept="image/png, image/jpeg, image/jpg">
                @if(!empty($review->img1))
                <label id="review_img_view" for="review_img" style="background-image: url('{{env('IMAGE_URL').$review->img1}}'); background-size:cover;">
                    <button class="delete-btn" onclick="pageReviewDetail.deleteImg();"><img src="/front/dist/img/icon_image_x.png" alt=""></button>
                </label>
                @else
                <label id="review_img_view" for="review_img"></label>
                @endif
            </div>
        </div>
        @if(!empty($review))
        <div class="fixed-footer">
            <button class="cancel" onclick="javascript:history.back()">취소</button>
            <button onclick="PickupCommon.addReview('{{$review->id ?? 0}}', 'update')">수정</button>
        </div>
        @else
        <div class="fixed-footer full-btn">
            <button onclick="PickupCommon.addReview('{{$review->id ?? 0}}')">상품후기 등록하기</button>
        </div>
        @endif
    </div>
@endsection
@section('script')
    <script>
        var pageReviewDetail = {
            deleteImg : function() {
                if(PickupCommon._config.CURRENT_BROWSER == 'IE'){
                    // ie 일때 input[type=file] init.
                    $("#review_img").replaceWith( $("#filename").clone(true) ); }
                else {
                    // other browser 일때 input[type=file] init.
                    $("#review_img").val("");
                }

                $('#review_img_view').remove();
                $('.upload-btn').append('<label id="review_img_view" for="review_img"></label>');
            }
        }
        // 이벤트를 바인딩해서 input에 파일이 올라올때 위의 함수를 this context로 실행합니다.
        $("#review_img").change(function(){
            PickupCommon.readURL(this, '#review_img_view');
            $("#review_img_view").append('<button class="delete-btn" onclick="pageReviewDetail.deleteImg();"><img src="/front/dist/img/icon_image_x.png" alt=""></button>');
        });
    </script>
@endsection
