<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function getIndex()
	{
        $view = view('front.main');
        return $view;
	}

    public function getProduct($id)
    {
        $view = view('front.product.detail');
        return $view;
    }
}
