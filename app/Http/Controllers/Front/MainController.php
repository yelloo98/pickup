<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OriginProduct;
use App\Models\PickupOrders;
use App\Models\PickupOrdersProduct;
use App\Models\PickupProductReview;
use App\Models\PickupProductViews;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Store;
use App\Models\StoreLikes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

	public function getIndex($id)
	{
        $view = view('front.main');
        $view->div_class = 'ppMain-content';
        if($id <= 0) $id = 1;
        $view->store = Store::find($id);
        //# 신규 상품
        $view->newProduct = ProductStock::leftjoin('product','product.id','product_stock.product_id')->where('product.store_id', $id)->select('product_stock.*')->orderBy('id','DESC')->limit(10)->get();
        //# 인기 상품
        $view->bestProduct = PickupOrdersProduct::leftjoin('product','product.id','pickup_orders_product.product_id')->where('product.store_id', $id)->select('pickup_orders_product.*')->orderBy('id','DESC')->limit(10)->get();
        //# 상품 리뷰
        $view->ProductReview = PickupProductReview::orderBy('created_at','DESC')->limit(6)->get();

        if(auth()->guard()->check()){
            //# 최근 본 상품 / 유저 where 추가해야됨
            $view->historyProduct = PickupProductViews::leftjoin('product','product.id','pickup_product_views.product_id')->where('product.store_id', $id)->select('pickup_product_views.*')->orderBy('id','DESC')->limit(10)->get();
        }

        return $view;
	}

    public function getProduct($id)
    {
        $view = view('front.product.detail');
        $view->div_class = 'ppGoodsDetail-content';
        return $view;
    }

    public function getLatestProduct(){
        $view = view('front.product.latest');
        $view->div_class = 'allPickup-content';
        return $view;
    }
}
