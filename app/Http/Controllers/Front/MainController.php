<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use EnjoyWorks\core\ResultFunction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AllowanceController extends Controller
{
    use ResultFunction;
    use FrontCommonFunc;

	/**
	 * Index
	 * winnie@enjoyworks.co.kr
	 * @return Factory|View
	 */
	public function getAllowance()
	{
        $user_id = $this->GetUserID();
        $view = view('front.allowance.allowance');
        if (isset($_COOKIE['case'])) {
            $case = $_COOKIE['case'];
            $allowances = Commission::where('users_id', $user_id)->where('type', $case)
                ->whereNotIn('type', ['7','8'])->orderBy('created_at','DESC')->paginate(10);
        } else {
            $allowances = Commission::where('users_id', $user_id)
                ->whereNotIn('type', ['7','8'])->orderBy('created_at','DESC')->paginate(10);
        }

        //확인상태 변경
        $models = Commission::where('users_id', Auth::guard('front')->user()->id)->whereNotIn('type',['7,8'])->where('check_status','N')->get();
        foreach ($models as $model) {
            $model->check_status = 'Y';
            $model->save();
        }

        $view->allowances = $allowances;
        return $view;
	}
}
