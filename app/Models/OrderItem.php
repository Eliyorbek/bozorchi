<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts=[
        'product_id'=>'array',
        'count'=>'array',
        'price'=>'array',
        'total_sum'=>'array',
    ];
}
