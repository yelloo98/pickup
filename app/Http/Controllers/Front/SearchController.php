<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{

	public function getIndex()
	{
        $view = view('front.search.search');
        $view->page = 'search';
        return $view;
	}
}
