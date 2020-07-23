@if(count($productList) > 0)
    @foreach($productList as $k => $v)
        <div class="wish-wrapper wish-wrapper-{{$v->product->id}}">
            <button class="delete-list" onclick="PickupCommon.productLike('{{$v->product->id ?? 0}}', 'delete')"><img src="/front/dist/img/icon_popup_x01.png" alt=""></button>
            <div class="img-box" @if(!empty($v->product->origin_product->image_path)) style="background-image: url('{{env('IMAGE_URL').$v->product->origin_product->image_path}}'); background-size:cover;" @endif></div>
            <div class="word-box" onclick="PickupCommon.pageMove('/front/product/{{$v->product->id ?? 0}}')">
                <div class="toTop">
                    <p><span>{{$v->product->fc_trader->companyName ?? ''}}</span></p>
                </div>
                <div class="menuInfo">
                    <p>{{$v->product->origin_product->name ?? ''}}</p>
                </div>
                <div class="price">
                    <p class="priceNum"><span>{{number_format($v->product->price ?? 0)}}</span>원</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
