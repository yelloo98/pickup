<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class GodoController extends Controller
{

	public function postJoin(Request $request)
	{
	    $model = new Customer();
	    $model->log = $request;
	    $model->save();
	}
}
