<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\OriginProduct;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
//            $view->productList = ProductStock::leftjoin('product', 'product.id', 'product_stock.product_id')
//                ->leftjoin('origin_product', 'origin_product.id', 'product.product_id')
//                ->select('product_stock.device_id', 'product_stock.product_id', 'product_stock.slot_status', 'product_stock.use_status', DB::raw('sum(product_stock.inserted_amount) as inserted_amount'), DB::raw('sum(product_stock.sale_amount) as sale_amount'), 'origin_product.name')
//                ->where('product_stock.product_id','!=','0')->groupBy('product_stock.product_id')->groupBy('product_stock.device_id')->orderBy('product_stock.created_at','desc')
//                ->where('origin_product.name', 'like', '%'.$searchText.'%')->get();

            $productList = ProductStock::leftjoin('product', 'product.id', 'product_stock.product_id')
                ->leftjoin('origin_product', 'origin_product.id', 'product.product_id')
                ->select('product_stock.*', 'origin_product.name')->where('product_stock.product_id','!=','0')->groupBy('product_stock.product_id')->groupBy('product_stock.device_id')->orderBy('product_stock.created_at','desc')
                ->where('origin_product.name', 'like', '%'.$searchText.'%')->get();
            foreach ($productList as $item){
                $productStock = ProductStock::where([['product_id', $item->product_id], ['device_id', $item->device_id], ['slot_status', 'DP-COMPLETE'], ['use_status', 'use']])->whereColumn('inserted_amount', '>', 'sale_amount')->get();
                //# 상태값 및 재고 파악
                if($productStock->count() > 0){
                    $item->slot_status = 'DP-COMPLETE';
                    $item->use_status = 'use';
                    $item->inserted_amount = $productStock->sum('inserted_amount');
                    $item->sale_amount = $productStock->sum('sale_amount');
                }
            }
        }
        $view->productList = $productList;

        return $view;
	}
}
