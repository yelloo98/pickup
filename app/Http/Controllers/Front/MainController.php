<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupOrdersProduct;
use App\Models\PickupProductReview;
use App\Models\PickupProductViews;
use App\Models\ProductStock;
use App\Models\Store;
use App\Models\StoreEvent;
use App\Models\StoreLikes;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function getIndex(Request $request, $id)
	{
        $view = view('front.main');
        $view->page = 'main';
        if($id <= 0) $id = 498;
        $view->store = Store::find($id);
        //# 이벤트
        $view->storeEvent = StoreEvent::where('store_id', $id)->get();
        //# 신규 상품 / 슬롯에 새로 들어온 상품
        $view->newProduct = ProductStock::leftjoin('product','product.id','product_stock.product_id')->where('product.store_id', $id)->select('product_stock.*')->orderBy('id','DESC')->limit(10)->get();
        //# 인기 상품 / 구매량이 많은 상품
        $view->bestProduct = PickupOrdersProduct::leftjoin('product','product.id','pickup_orders_product.product_id')->where('product.store_id', $id)->select('pickup_orders_product.*')->orderBy('id','DESC')->limit(10)->get();
        //# 상품 리뷰 / 최신 순
        $view->ProductReview = PickupProductReview::leftjoin('product','product.id','pickup_product_review.product_id')->where('product.store_id', $id)->select('pickup_product_review.*')->orderBy('created_at','DESC')->limit(6)->get();

        $shopAuth = new ShopAuth($request);
        if(Customer::find($shopAuth->user()->id) != null){
            $view->customer = Customer::find($shopAuth->user()->id);
            //# 최근 본 상품 / 유저 where 추가해야됨
            $view->historyProduct = PickupProductViews::leftjoin('product','product.id','pickup_product_views.product_id')->where('product.store_id', $id)->select('pickup_product_views.*')->where('customer_id', $shopAuth->user()->id)->orderBy('id','DESC')->limit(10)->get();
            //# 관심매장 여부
            $view->store_like = StoreLikes::where('customer_id', $shopAuth->user()->id)->get();
        }

        return $view;
    }
}
