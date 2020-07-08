<?php

namespace App\Models;

use EnjoyWorks\core\ModelAdminInterface;
use EnjoyWorks\core\ModelFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model implements ModelAdminInterface
{
    use SoftDeletes, ModelFunction;

    protected $connection = 'mysql';
    protected $table = 'product';

    public function origin_product()
    {
    return $this->belongsTo('App\Models\OriginProduct', 'product_id');
    }

    //# fc_trader 정보
    public function fc_trader(){
        return $this->belongsTo('App\Models\FcTrader', 'store_id','traderNo');
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
