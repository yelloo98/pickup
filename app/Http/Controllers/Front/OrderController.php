<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //# 주문/결제
	public function getOrderIndex(Request $request)
	{
        $view = view('front.order.order');
        $view->page = 'order';

        $shopAuth = new ShopAuth($request);
        $view->customer = Customer::find($shopAuth->user()->id);

        $product = $request->input('product', null);
        $productSum = 0;
        if(!empty($product)){
            foreach ($product as $k=>$v){
                $item = explode(',',$v);
                $product[$k] = Product::find($item[0] ?? 0);
                $product[$k]->count = $item[1] ?? 0;
                $price_sum = ($product[$k]->price ?? 0) * ($item[1] ?? 0);
                $product[$k]->price_sum = number_format($price_sum);
                $productSum = $productSum + $price_sum;

                $view->product[$k] = $product[$k];
            }
            $view->productSum = number_format($productSum);
        }

        return $view;
	}
}
