<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
	public function product(){
		return $this->belongsTo('App\Models\Product', 'product_id');
	}		
	public function color(){
		return $this->belongsTo('App\Models\Color', 'color_id');
	}		
	public function size(){
		return $this->belongsTo('App\Models\Size', 'size_id');
	}	

}
