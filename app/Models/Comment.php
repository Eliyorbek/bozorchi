<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function client(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function order(){
        return $this->belongsTo(Order::class , 'order_id');
    }
}
