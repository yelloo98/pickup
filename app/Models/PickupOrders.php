<?php

namespace App\Models;

use EnjoyWorks\core\ModelAdminInterface;
use EnjoyWorks\core\ModelFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class PickupOrders extends Model implements ModelAdminInterface
{
    use SoftDeletes, ModelFunction;

    protected $connection = 'mysql';
    protected $table = 'pickup_orders';


    public function coupon()
    {
        return $this->belongsTo('App\Models\PickupCoupon', 'pickup_coupon_id');
    }
    /**
     * Override : DataTableList
     * -----------------------------------------------------------------------------------------------------------------
     * @param Request $request
     * @param $result Collections
     * @return array
     */
    public function dataTableList(Request $request, $result)
    {
    }

    /**
     * Override : converterModel
     * -----------------------------------------------------------------------------------------------------------------
     * @param Request $request
     */
    public function converterModel(Request $request){ }
}
