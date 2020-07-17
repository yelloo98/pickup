<?php


namespace App\Http\Middleware;


use App\Helper\ShopAuth;
use Closure;


class ShopAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shopAuth = new ShopAuth($request);

        if (!$shopAuth->check()) {  // login 필요
            if ($request->ajax()) {
                return response()->json(['code' => 600, 'msg' => '로그인이 필요합니다.', 'path' => env('SHOP_URL','http://m.chaesukwoo1.godomall.com/').'member/memberCheck.php']);
            } else {
                return redirect(env('SHOP_URL', 'http://m.chaesukwoo1.godomall.com/') . 'member/login?return_url=/');
            }
        }else{  // login 사용자

        }
        return $next($request);
    }
}
