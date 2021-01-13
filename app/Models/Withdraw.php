<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    public function vendor(){
        return $this->belongsTo('App\models\Vendor', 'vendor_id');
    }    

    public function paymentmethod(){
        return $this->belongsTo('App\models\PaymentMethod', 'method_id');
    }

}
