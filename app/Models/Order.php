<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $fillable = [
        'user_id',
        'tanggal',
        'image'
    ];

    public function user()
	{
	      return $this->belongsTo('App\Models\User','user_id', 'id');
	}

    public function orderDetail() 
    {
         return $this->hasMany('App\Models\orderDetail','order_id', 'id');
    }

    public function statusOrder() 
    {
         return $this->belongsTo('App\Models\statusOrder', 'status_id', 'id');
    }
}