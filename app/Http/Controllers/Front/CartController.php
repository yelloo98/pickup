<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

	public function getIndex()
	{
        $view = view('front.cart.cart');
        return $view;
	}
}
