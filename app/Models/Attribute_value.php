<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    use HasFactory;
	public function attribute(){
		return $this->belongsTo('App\Models\Attribute', 'attribute_id');
	}	
	public function product_variation(){
		return $this->hayMany('App\Models\Product_variation', 'var_attribute_value_id');
	}

}
