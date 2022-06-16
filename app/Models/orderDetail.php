<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    public function product()
	{
	      return $this->belongsTo('App\Models\Product','product_id', 'id');
	}

    public function order()
	{
	      return $this->belongsTo('App\Models\Order','order_id', 'id');
	}
}