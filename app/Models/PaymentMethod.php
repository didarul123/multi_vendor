<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    public function withdraw(){
        return $this->hasMany('App\models\Withdraw', 'method_id');
    }    
    public function order(){
        return $this->hasMany('App\models\Order', 'payment_method');
    }

}
