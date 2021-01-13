<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
	public function p_size(){
		return $this->hasMany('App\Models\Product_size', 'size_id');
	}
	public function orderdetails(){
		return $this->hasMany('App\Models\OrderDetails', 'size_id');
	}
}
