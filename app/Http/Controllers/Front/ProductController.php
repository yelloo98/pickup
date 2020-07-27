<?php

namespace App\Http\Controllers\Front;

use App\Helper\ShopAuth;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\PickupOrdersProduct;
use App\Models\PickupProductLikes;
use App\Models\PickupProductReview;
use App\Models\PickupProductViews;
use App\Models\PickupQna;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     *  상품 리스트
     */
    public function getProductList(Request $request)
    {
        $view = view('front.product.product');
        $view->page = 'latest';
        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $store = $request->input('store_id', 498);
        $searchDevice = $request->input('searchDevice', null);
        $searchSort = $request->input('searchSort', null);

        //# 기기 리스트
        $view->deviceList = Device::where('store_id', $store)->orderBy('id','desc')->get();

        //# 상품 리스트
        $productList = ProductStock::leftjoin('device','device.id','product_stock.device_id')->select('product_stock.*')
            ->where('device.store_id', $store)->where('product_stock.product_id','!=','0')->groupBy('product_stock.product_id')
            ->groupBy('product_stock.device_id')->orderBy('created_at','desc')->get();
        foreach ($productList as $item){
            $item->hit = PickupOrdersProduct::where('product_id', $item->product_id)->sum('count');
        }

        //# 기기 선택
        if(!empty($searchDevice)){
            $productList = $productList->where('device_id', $searchDevice);
        }

        //# 정렬 선택
        if(!empty($searchSort)){
            $productList = $productList->sortByDesc($searchSort);
        }

        $view->productList = $productList;
        return $view;
    }

    /**
     * 상품 상세
     */
    public function getProduct(Request $request, $id)
    {
        $view = view('front.product.detail');
        $view->page = 'detail';

        $shopAuth = new ShopAuth($request);
        $view->customer = $shopAuth->user();
        $device_id = $request->input('device_id', null);

        //# 상품
        $view->product = Product::find($id);
        //# 세일율
        $view->productSale = floor((1 - (($view->product->price ?? 0) / ($view->product->origin_product->price_cost ?? 1))) * 100);
        //# 재고량
        $productStock = ProductStock::where([['product_id', $id],['device_id', $device_id],['slot_status','DP-COMPLETE'],['use_status','use'],['inserted_amount','>','sale_amount']])
            ->select('device_id',DB::raw('sum(inserted_amount) - sum(sale_amount) as product_res'))->first();
        $orderCnt = PickupOrdersProduct::where([['product_id', $id],['device_id', $device_id],['status','pay']])->sum('count');
        $view->productCnt = (!empty($productStock) && $productStock->product_res > $orderCnt)? $productStock->product_res - $orderCnt : 0;
        //# 상품후기
        $view->reviewList = PickupProductReview::where('product_id',$id)->orderBy('created_at', 'desc')->get();
        $view->photoReviewList = PickupProductReview::where('product_id',$id)->whereNotNull('img1')->orderBy('created_at', 'desc')->get();
        $view->reviewScore = round($view->reviewList->avg('score'), 1);
        //# Q&A
        $view->qnaList = PickupQna::where('product_id',$id)->orderBy('created_at', 'desc')->get();
        //# 상품 좋아요
        $view->productLike = PickupProductLikes::where([['customer_id', $shopAuth->user()->id],['product_id', $id]])->get();
        //# 최근 본 상품 추가
        if(PickupProductViews::where([['customer_id',$shopAuth->user()->id],['product_id', $id],['device_id', $device_id]])->count() == 0){
            $pickupProductViews = new PickupProductViews();
            $pickupProductViews->customer_id = $shopAuth->user()->id;
            $pickupProductViews->product_id = $id;
            $pickupProductViews->device_id = $device_id;
            $pickupProductViews->save();
        }

        return $view;
    }

    /**
     * 상품 포토 후기
     */
    public function getPhotoReview($id)
    {
        $view = view('front.product.photo');
        $view->page = 'photo';
        $view->photoReviewList = PickupProductReview::where('product_id',$id)->whereNotNull('img1')->orderBy('created_at', 'desc')->get();
        return $view;
    }
}
