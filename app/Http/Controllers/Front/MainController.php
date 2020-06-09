<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function getIndex()
	{
        $view = view('front.main');
        $view->div_class = 'ppMain-content';
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
