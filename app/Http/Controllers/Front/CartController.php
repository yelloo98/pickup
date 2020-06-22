<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PickupCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

	public function getIndex()
	{
        $view = view('front.cart.cart');
        $view->page = 'cart';

        //# 임시 유저 아이디
        $customer_id = 399;
        $view->customer = Customer::find($customer_id);
        $cartList = PickupCart::where('customer_id',$customer_id)->leftjoin('product','product.id','pickup_cart.product_id')->select('pickup_cart.*', 'product.price', DB::raw('pickup_cart.count * product.price as price_sum'))->get();
        $view->cartList = $cartList;
        $view->cartListSum = number_format($cartList->sum('price_sum') ?? 0);
        return $view;
	}
}
