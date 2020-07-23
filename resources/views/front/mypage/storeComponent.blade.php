@if(count($storeList) > 0)
    @foreach($storeList as $k => $v)
        <div class="storeList-container storeList-{{$v->fc_trader->traderNo ?? 0}}">
            <div class="list-wrapper">
                <button class="delete-list" onclick="PickupCommon.storeLike('{{$v->fc_trader->traderNo ?? 0}}', 'delete')"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box" onclick="PickupCommon.pageMove('/front/main?store_id={{$v->fc_trader->traderNo ?? 0}}')">
                    <div class="store-category">
                        <span>{{$v->fc_trader->companyName ?? ''}}</span>
                    </div>
                    <div class="store-address">{{$v->fc_trader->address ?? ''}}</div>
                    <small>{{\App\Helper\Codes::formatPhone($v->fc_trader->tel ?? '')}}</small>
                </div>
            </div>
        </div>
    @endforeach
@endif
