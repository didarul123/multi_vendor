<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
	public function p_color(){
		return $this->hasMany('App\Models\Product_color', 'color_id');
	}	
	public function orderdetails(){
		return $this->hasMany('App\Models\OrderDetails', 'color_id');
	}

}
