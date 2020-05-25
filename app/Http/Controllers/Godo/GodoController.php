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
	    $model = new Customer();
	    try {
            $model->log = json_encode($request->all());
            $model->save();

        } catch (\Exception $e) {
            $model->log = json_decode($e->getMessage());
            $model->save();
            return $this->returnFailed('저장에 실패 헀습니다.');
        }
        return $this->returnSuccess();
	}
}
