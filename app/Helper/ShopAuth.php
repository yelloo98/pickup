<?php


namespace App\Helper;

use App\Models\Customer;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ShopAuth
{
    protected $user;

    public function __construct(Request $request) {
        try {
//            $sessVal = $request->cookie(env("SESS_COOKIE_NAME", "GD5SESSID"));    // not work ?? return null
//            $sessVal = $_COOKIE[env("SESS_COOKIE_NAME", "GD5SESSID")];
//            if($sessVal == null)  $sessVal = env("SESS_COOKIE_VALUE", "m07mjcpvm61gqk6h0din7ah33pb4s88vv3rm4hhbsi93a9e5iqpblpc9pl8so99auneibs2oftj6bh3odiogjm9k0q94ciro45619v1");
            $sessVal = (!empty($_COOKIE["GD5SESSID"]))? $_COOKIE[env("SESS_COOKIE_NAME", "GD5SESSID")] : null;
            $http = new Client(['cookies' => true]);
            $cookieJar = CookieJar::fromArray([
                env("SESS_COOKIE_NAME", "GD5SESSID") => $sessVal
            ], env("SESSION_DOMAIN", ".chaesukwoo1.godomall.com"));
            $res = $http->get(env("SHOP_URL", "http://m.chaesukwoo1.godomall.com/")."member/memberCheck.php", ['cookies' => $cookieJar, 'debug' => false]);
            $body = json_decode($res->getBody()->getContents());
            if($body->res->code == 200 && $body->data != null) {
                $this->user = Customer::where('memNo', $body->data->memNo)->first();
            }
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return response()->json(['code' => 400, 'msg' => '쇼핑몰 연동 에러']);
        }
    }

    // return user
    public function user() {
        return $this->user;
    }

    // login check
    public function check() {

        return $this->user != null;
    }
}
