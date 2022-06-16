<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    // protected $fillable = [
    //     'tanggal_transaksi',
    //     'nominal',
    //     'deskripsi'
    // ];

    protected $guarded = [];

    public function transactionType() 
    {
         return $this->belongsTo('App\Models\transactionType', 'jenisTransaksi_id', 'id');
    }
}
