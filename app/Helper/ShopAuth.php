<?php


namespace App\Helper;

use App\Models\Customer;
use Illuminate\Http\Request;

class ShopAuth
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = Customer::find(399);
    }

    // return user
    public function user() {
        return $this->user;
    }

    // login check
    public function check() {
        return $this->user != null;
    }
}
