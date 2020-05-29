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
	        $model->memId = $request->memId;
	        $model->cellPhone = $request->cellPhone;
	        $model->log = '1.'.$request->memId.' 2.'.$request['memId'];
            $model->save();

        } catch (\Exception $e) {
            return $this->returnFailed($e->getMessage());
        }
        return $this->returnSuccess();
	}
}
