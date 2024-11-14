<?php

namespace App\Models;

use Alvarofpp\Masks\Traits\MaskAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    use MaskAttributes;
    protected $guarded = ['id'];

    protected $masks = [
        'cpf'=>'###.##.###.##.##',
    ];
}
