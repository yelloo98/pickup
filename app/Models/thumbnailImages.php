<?php

namespace App\Models;

use EnjoyWorks\core\ModelAdminInterface;
use EnjoyWorks\core\ModelFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class thumbnailImages extends Model
{
    protected $connection = 'mysql';
    protected $table = 'thumbnail_images';

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
