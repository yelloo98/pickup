<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\FcTrader;
use App\Models\PickupOrders;
use App\Models\PickupOrdersProduct;
use App\Models\PickupProductReview;
use App\Models\PickupProductViews;
use App\Models\ProductStock;
use App\Models\StoreEvent;
use App\Models\StoreLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

	public function getIndex(Request $request)
	{
        $view = view('front.main');
        $view->page = 'main';
        $store_id = $request->input('store_id', 498);
        $view->store = FcTrader::find($store_id);

        //# 이벤트
        $event = StoreEvent::where([['type', 'store_owner'],['store_id', $store_id]])->orderBy('created_at', 'desc')->limit(3);
        $view->storeEvent = StoreEvent::where('type', 'admin')->orderBy('created_at', 'desc')->limit(2)->union($event)->get();

        //# 신규 상품 / 슬롯에 새로 들어온 상품
        $newProduct = ProductStock::leftjoin('product','product.id','product_stock.product_id')
            ->where('product.store_id', $store_id)->select('product_stock.*')->orderBy('product_stock.id','DESC')->limit(10)->get();
        foreach ($newProduct as $item){
            if(($item->slot_status ?? '') == 'DP-COMPLETE' && ($item->use_status ?? '') == 'use' && ($item->inserted_amount ?? '') > ($item->sale_amount ?? '')){
                $productStock = $item->inserted_amount - $item->sale_amount;
                $orderCnt = PickupOrdersProduct::where([['product_id', $item->product_id],['device_id', $item->device_id],['status','pay']])->sum('count');
                $item->stock = (!empty($productStock) && $productStock > $orderCnt)? $productStock - $orderCnt : 0;
            }
        }
        $view->newProduct = $newProduct;

        //# 인기 상품 / 구매량이 많은 상품
        $bestProduct = PickupOrdersProduct::leftjoin('product','product.id','pickup_orders_product.product_id')
            ->where('product.store_id', $store_id)->select('pickup_orders_product.*', DB::raw('sum(pickup_orders_product.count) AS cntSum'))
            ->groupBy('pickup_orders_product.product_id')->orderBy('cntSum','DESC')->limit(10)->get();
        foreach ($bestProduct as $item){
            $productStock = ProductStock::where([['product_id', $item->product_id],['device_id', $item->device_id],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
                ->select('device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as stock'))->first();
            $orderCnt = PickupOrdersProduct::where([['product_id', $item->product_id],['device_id', $item->device_id],['status','pay']])->sum('count');
            $item->stock = (!empty($productStock) && $productStock->stock > $orderCnt)? $productStock->stock - $orderCnt : 0;
        }
        $view->bestProduct = $bestProduct;

        //# 상품 리뷰 / 최신 순
        $view->productReview = PickupProductReview::leftjoin('product','product.id','pickup_product_review.product_id')->leftjoin('product_stock', 'product_stock.product_id','pickup_product_review.product_id')
            ->where('product.store_id', $store_id)->select('pickup_product_review.*', 'product_stock.device_id')->orderBy('created_at','DESC')->limit(6)->get();
        $shopAuth = new ShopAuth($request);
        if(!empty($shopAuth->user())){
            $view->customer = $shopAuth->user();

            //# 최근 본 상품
            $historyProduct = PickupProductViews::leftjoin('product','product.id','pickup_product_views.product_id')->where('product.store_id', $store_id)->where('customer_id', $shopAuth->user()->id)
                ->select('pickup_product_views.*')->groupBy('pickup_product_views.product_id')->orderBy('created_at','DESC')->limit(10)->get();
            foreach ($historyProduct as $item){
                $productStock = ProductStock::where([['product_id', $item->product_id],['device_id', $item->device_id],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
                    ->select('device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as stock'))->first();
                $orderCnt = PickupOrdersProduct::where([['product_id', $item->product_id],['device_id', $item->device_id],['status','pay']])->sum('count');
                $item->stock = (!empty($productStock) && $productStock->stock > $orderCnt)? $productStock->stock - $orderCnt : 0;
            }
            $view->historyProduct = $historyProduct;

            //# 관심매장 여부
            $view->store_like = StoreLikes::where('customer_id', $shopAuth->user()->id)->get();

            //# 주문 내역
            $view->orderCnt = PickupOrders::where([['customer_id', $shopAuth->user()->id],['pickup_until_at','>',now()],['status','pay']])->count();
        }

        return $view;
    }
}
