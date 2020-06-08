<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customers;
use EnjoyWorks\core\ResultFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;


class AuthController extends Controller
{
    use ResultFunction;

    /**
     * Process Login system
     * @author winnie@enjoyworks.co.kr
     */
    public function postLogin(Request $request)
    {
        /*// get email and password from request
        $credentials = request(['memId', 'memPw']);

        // try to auth and get the token using api authentication
        if (!$token = auth('api')->attempt($credentials)) {
            // if the credentials are wrong we send an unauthorized error in json format
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'token' => $token,
            'type' => 'bearer', // you can ommit this
            'expires' => auth('api')->factory()->getTTL() * 60, // time to expiration

        ]);*/
        $validator = Validator::make($request->all(), [
            'memId' => 'required|string|max:255|unique:customer',
            'memPw'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        Customers::create([
            'memId' => $request->get('memId'),
            'memPw' => bcrypt($request->get('memPw')),
        ]);
        $user = Customers::orderBy('id','DESC')->first();
        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Logout system
     * @author winnie@enjoyworks.co.kr
     */
    public function getLogout()
    {
        Auth::guard('front')->logout();
        setcookie('auto_login', null, time() - 3600, '/');
        Cookie::queue(Cookie::forget('user_id', "/"));
        return redirect('/');
    }
}
