<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_variation extends Model
{
    use HasFactory;
	public function var_attribute_value(){
		return $this->belongsTo('App\Models\Attribute_value', 'var_attribute_value_id');
	}	
	public function var_attribute_value2(){
		return $this->belongsTo('App\Models\Attribute_value', 'var_attribute_value_id2');
	}

}
