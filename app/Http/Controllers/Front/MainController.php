<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function getIndex()
	{
        $view = view('front.main');
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Accept: application/json';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.0.171/api/godo/join');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, []);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        $view->div_class = 'ppMain-content';
        $view->result = $result;
        return $view;
	}

    public function getProduct($id)
    {
        $view = view('front.product.detail');
        $view->div_class = 'ppGoodsDetail-content';
        return $view;
    }
}
