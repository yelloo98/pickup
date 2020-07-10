<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{

	public function getIndex(Request $request)
	{
        $view = view('front.search.search');
        $view->page = 'search';
        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        return $view;
	}
}
