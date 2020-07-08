@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body attention-content">
        @forelse($store_like as $k=>$v)
        <div class="storeList-container storeList-{{$v->fc_trader->traderNo ?? 0}}">
            <div class="list-wrapper">
                <button class="delete-list" onclick="PickupCommon.storeLike('{{$v->fc_trader->traderNo ?? 0}}', 'delete')"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box" onclick="location.href='/front/main?store_id={{$v->fc_trader->traderNo ?? 0}}'">
                    <div class="store-category">
                        <span>{{$v->fc_trader->companyName ?? ''}}</span>
                    </div>
                    <div class="store-address">{{$v->fc_trader->address ?? ''}}</div>
                    <small>{{\App\Helper\Codes::formatPhone($v->fc_trader->tel ?? '')}}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="storeList-container">
            <p class="none-list">관심매장이 없습니다.</p>
        </div>
        @endforelse
    </div>
@endsection
@section('script')
@endsection
