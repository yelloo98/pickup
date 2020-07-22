<?php

namespace App\Models;

use EnjoyWorks\core\ModelAdminInterface;
use EnjoyWorks\core\ModelFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class StoreEvent extends Model implements ModelAdminInterface
{
    use SoftDeletes, ModelFunction;

    protected $table = 'store_event';

    public function thumbnailImages(){
        return $this->belongsTo('App\Models\thumbnailImages', 'thumbnail_images_id');
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
