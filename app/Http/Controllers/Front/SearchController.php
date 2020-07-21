<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\OriginProduct;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class SearchController extends Controller
{

	public function getIndex(Request $request)
	{
        $view = view('front.search.search');
        $view->page = 'search';
        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $searchText = $request->input('searchText', null);

        if(!empty($searchText)){
            $productList = ProductStock::leftjoin('product', 'product.id', 'product_stock.product_id')
                ->leftjoin('origin_product', 'origin_product.id', 'product.product_id')->select('product_stock.*', 'origin_product.name')
                ->where('product_stock.product_id','!=','0')->groupBy('product_stock.product_id')->orderBy('product_stock.created_at','desc')
                ->where('origin_product.name', 'like', '%'.$searchText.'%')->get();
        }else{
            $productList = null;
        }

        $view->productList = $productList;
        return $view;
	}
}
