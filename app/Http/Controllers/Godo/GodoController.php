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
            if(Customer::where('phone', $request->cellPhone)->count()>0) {
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
}
