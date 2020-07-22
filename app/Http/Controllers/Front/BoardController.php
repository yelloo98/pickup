<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\PickupNotice;
use App\Models\StoreEvent;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * 이용약관
     */
    public function getTermList(Request $request)
    {
        $view = view('front.board.term');
        $view->page = 'term';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        return $view;
    }

    /**
     * 공지사항
     */
    public function getNoticeList(Request $request)
    {
        $view = view('front.board.notice');
        $view->page = 'notice';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $view->noticeList = PickupNotice::orderBy('created_at','desc')->get();
        return $view;
    }

    /**
     * 공지사항 상세
     */
    public function getNoticeDetail(Request $request, $id = 0)
    {
        $view = view('front.board.noticeDetail');
        $view->page = 'notice';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $view->notice = PickupNotice::find($id);
        return $view;
    }

    /**
     * 이벤트
     */
    public function getEventList(Request $request)
    {
        $view = view('front.board.event');
        $view->page = 'event';
        $store_id = $request->input('store_id', 498);

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();

        $eventList = StoreEvent::where('type','admin')->orWhere([['type','store_owner'],['store_id', $store_id]])->orderBy('created_at','desc');
        $view->eventListCnt = $eventList->get()->count();
        $view->eventList = $eventList->limit(10)->get();
        return $view;
    }

    /**
     * 이벤트 리스트
     */
    public function getEventListComponent(Request $request)
    {
        $view = view('front.board.eventComponent');
        $store_id = $request->input('store_id', 498);

        $view->eventList = StoreEvent::where('type','admin')->orWhere([['type','store_owner'],['store_id', $store_id]])->orderBy('created_at','desc')->paginate(10);
        return $view;
    }

    /**
     * 이벤트 상세
     */
    public function getEventDetail(Request $request, $id = 0)
    {
        $view = view('front.board.eventDetail');
        $view->page = 'event';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $view->event = StoreEvent::find($id);
        return $view;
    }

}
