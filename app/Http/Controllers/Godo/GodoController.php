<?php

namespace App\Http\Controllers\Godo;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use EnjoyWorks\core\ResultFunction;
use Illuminate\Http\Request;

class GodoController extends Controller
{
    use ResultFunction;

    public function postJoin(Request $request)
    {

        try {
            if (Customer::where('phone', $request->cellPhone)->count() > 0) {
                $model = Customer::where('phone', $request->cellPhone)->first();
            } else {
                $model = new Customer();
                $model->phone = $request->cellPhone;
                $model->point = 0;
            }
            $model->memId = $request->memId;
            $model->memPw = bcrypt($request->memPw);
            $model->save();

        } catch (\Exception $e) {
            return $this->returnFailed($e->getMessage());
        }
        return $this->returnSuccess();
    }

    public function login(Request $request)
    {
        $url = 'http://m.chaesukwoo1.godomall.com/member/login_ps.php';
        $post_field = array(
            'mode' => 'login',
            'loginId' => $request->loginId,
            'loginPwd' => $request->loginPwd
        );
        $result = $this->make_curl($url, $post_field);
        $cookie = $result['header']['Set-Cookie'];
        return $cookie;
    }

    function make_curl($url, $post_field)
    {
        $request_timeout = 10; // 1 second timeout
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($request, CURLOPT_TIMEOUT, $request_timeout);
        curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $request_timeout);
        curl_setopt($request, CURLOPT_COOKIEJAR, 'curl_cookie/cookie_' . $_SERVER['REMOTE_ADDR'] . '_.txt');
        curl_setopt($request, CURLOPT_COOKIEFILE, 'curl_cookie/cookie_' . $_SERVER['REMOTE_ADDR'] . '_.txt');
        curl_setopt($request, CURLOPT_POST, 1);
        curl_setopt($request, CURLOPT_HEADER, 1);//헤더를 포함한다.
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_field);
        curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Close'));
        $result = curl_exec($request);
        if ($result !== '') {
            $headers = array();
            list($header, $body) = explode("\r\n\r\n", $result, 2);
            $header_text = $header;

            foreach (explode("\r\n", $header_text) as $i => $line)
                if ($i === 0)
                    $headers['http_code'] = $line;
                else {
                    list ($key, $value) = explode(': ', $line);

                    $headers[$key] = $value;
                }
            $resJson['header'] = $headers;
            $resJson['body'] = json_decode($body);
        }
        return $resJson;
    }
}
