<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    use HasFactory;

	public function attribute(){
		return $this->belongsTo('App\Models\Attribute', 'attribute_id');
	}

	public function product_attribute_attribute_value(){
		return $this->hasOne('App\Models\Product_attribute_attribute_value', 'product_attribute_id');
	}

}
