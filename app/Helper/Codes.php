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
            $phone = substr($phone, 0, 2).')'.substr($phone, 2, 4).'-'.substr($phone, 6, 4);
        }elseif(strlen($phone) == 9){
            $phone = substr($phone, 0, 2).')'.substr($phone, 2, 3).'-'.substr($phone, 5, 4);
        }

        return $phone;
    }

    /**
     * 20200630
     * Q&A 카테고리
     */
    public static function qnaCategory($type) {
        if($type == 'store'){
            $type = '매장문의';
        }elseif($type == 'device'){
            $type = '기기문의';
        }elseif($type == 'product'){
            $type = '상품문의';
        }elseif($type == 'etc'){
            $type = '기타문의';
        }elseif($type == 'pay'){
            $type = '결제문의';
        }elseif($type == 'delivery'){
            $type = '배송문의';
        }

        return $type;
    }

    /**
     * 20200708
     * 디바이스 타입
     */
    public static function deviceType($type) {
        if($type == 'frozen'){
            $type = '<span class="blue-box option-box">냉장</span>';
        }elseif($type == 'cold'){
            $type = '<span class="green-box option-box">냉동</span>';
        }

        return $type;
    }

    /**
     * 20200709
     * 디바이스 타입 텍스트
     */
    public static function deviceTypeText($type) {
        if($type == 'frozen'){
            $type = '냉장';
        }elseif($type == 'cold'){
            $type = '냉동';
        }

        return $type;
    }

    /**
     * 20200709
     * 주문 상태
     */
    public static function orderStatus($status) {
        if($status == 'pay'){
            $status = '픽업대기';
        }elseif($status == 'cancel'){
            $status = '결제취소';
        }elseif($status == 'wait'){
            $status = '결제대기';
        }elseif($status == 'done'){
            $status = '픽업완료';
        }elseif($status == 'p_cancel'){
            $status = '부분취소';
        }

        return $status;
    }
}
