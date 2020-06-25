@extends('layouts.front')
@section('title', $title ?? '')
@section('content')
    <div class="content-body attention-content">
        @forelse($store_like as $k=>$v)
        <div class="storeList-container storeList-{{$v->store->id ?? 0}}">
            <div class="list-wrapper">
                <button class="delete-list" onclick="PickupCommon.storeLike('{{$v->store->id ?? 0}}', 'delete')"><img src="/front/dist/img/icon_x_S.png" alt=""></button>
                <div class="word-box">
                    <div class="store-category">
                        <span>{{$v->store->fcTrader->companyName ?? ''}}</span>
                    </div>
                    <div class="store-address">{{$v->store->fcTrader->address ?? ''}}</div>
                    <small>{{\App\Helper\Codes::formatPhone($v->store->fcTrader->tel ?? '')}}</small>
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
