<?php

namespace App\Models;

use EnjoyWorks\core\ModelAdminInterface;
use EnjoyWorks\core\ModelFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class PickupProductViews extends Model implements ModelAdminInterface
{
    use ModelFunction;

    protected $connection = 'mysql';
    protected $table = 'pickup_product_views';


    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function origin_product()
    {
        return $this->belongsTo('App\Models\OriginProduct', 'origin_product_id');
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
