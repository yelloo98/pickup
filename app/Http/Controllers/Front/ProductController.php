<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Device;
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

class ProductController extends Controller
{

    public function getProductList(Request $request)
    {
        $view = view('front.product.list');
        $view->page = 'latest';
        $store = $request->input('store_id', 498);
        $device = $request->input('device_id', null);
        $searchSort = $request->input('searchSort', null);

        $view->deviceList = Device::where('store_id', $store)->orderBy('id','desc')->get();
        $view->productList = ProductStock::leftjoin('device','device.id','product_stock.device_id')
            ->select('product_stock.*','device.store_id')->where('device.store_id', $store)->orderBy('id','desc')->get();
        return $view;
    }

    public function getProduct($id)
    {
        $view = view('front.product.detail');
        $view->page = 'detail';

        $view->product = Product::find($id);
        //# 세일율
        $view->productSale = floor((1 - (($view->product->price ?? 0) / ($view->product->origin_product->price_cost ?? 1))) * 100);
        //# 재고량
        $productList = ProductStock::where('product_id', $id)->where('slot_status','DP-COMPLETE')->where('use_status','use')->whereColumn('inserted_amount', '>', 'sale_amount');
        $view->productCnt = $productList->sum('inserted_amount') - $productList->sum('sale_amount');
        //# 리뷰 평점
        $view->reviewScore = round(PickupProductReview::where('product_id',$id)->avg('score'), 1);
        return $view;
    }
}
