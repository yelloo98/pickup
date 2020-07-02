<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

	public function getIndex(Request $request)
	{
        $view = view('front.cart.cart');
        $view->page = 'cart';

        $shopAuth = new ShopAuth($request);
        $view->customer = Customer::find($shopAuth->user()->id);
        $cartList = PickupCart::leftjoin('product','product.id','pickup_cart.product_id')->leftjoin('product_stock','product_stock.product_id', 'pickup_cart.product_id')
            ->select('pickup_cart.*', 'product.price', DB::raw('pickup_cart.count * product.price as price_sum'), DB::raw('sum(product_stock.inserted_amount)-sum(product_stock.sale_amount) AS product_res'))
            ->where('pickup_cart.customer_id',$shopAuth->user()->id)
            ->where([['product_stock.slot_status','DP-COMPLETE'],['product_stock.use_status','use'],['product_stock.inserted_amount','>','product_stock.sale_amount']])
            ->groupBy('pickup_cart.product_id')->orderBy('pickup_cart.created_at', 'desc')->get();
        $view->cartList = $cartList;
        $view->cartListSum = number_format($cartList->sum('price_sum') ?? 0);
        return $view;
	}
}
