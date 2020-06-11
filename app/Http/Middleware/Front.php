<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Front
{
    public function handle($request, Closure $next)
    {
//        $actionName = $request->route()->getActionName();
//        if (!preg_match("/.*\\\AuthController@.*/i", $actionName) && !Auth::guard('front')->check()) {
//            if ($request->ajax()) {
//                return response()->json(['code' => '401', 'message' => '로그인이 필요합니다.', 'path' => '/front/main']);
//            } else {
//                return Redirect::to('http://m.chaesukwoo1.godomall.com/member/login.php');
//            }
//        }
        return $next($request);
    }
}
