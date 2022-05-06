<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'since',
        'owner',
        'email',
        'telephone',
        'address',
        'medsoc',
    ];

    protected $guarded = ['id'];
}