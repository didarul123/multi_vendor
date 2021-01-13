<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attribute_attribute_value extends Model
{
    use HasFactory;

	public function attribute_value(){
		return $this->belongsTo('App\Models\Attribute_value', 'attribute_value_id');
	}
}
