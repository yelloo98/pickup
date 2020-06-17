<?php


namespace App\Helper;


use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;


class Codes extends Model
{
    /**
     * 20200612
     * 전화번호 처리
     */
    public static function formatPhone($phone) {
        if(strlen($phone) == 11){
            $phone = substr($phone, 0, 3).'-'.substr($phone, 3, 4).'-'.substr($phone, 7, 4);
        }elseif(strlen($phone) == 10){
            $phone = substr($phone, 0, 2).')'.substr($phone, 3, 4).'-'.substr($phone, 7, 4);
        }elseif(strlen($phone) == 9){
            $phone = substr($phone, 0, 2).')'.substr($phone, 3, 3).'-'.substr($phone, 6, 4);
        }

        return $phone;
    }
}
