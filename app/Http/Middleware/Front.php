<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $actionName = $request->route()->getActionName();
        if (!preg_match("/.*\\\AuthController@.*/i", $actionName) && !Auth::guard('admin')->check()) {
            if ($request->ajax()) {
                return response()->json(['code' => '401', 'message' => '로그인이 필요합니다.', 'path' => '/admin/login']);
            } else {
                return redirect('/admin/login');
            }
        }
        return $next($request);
    }
}