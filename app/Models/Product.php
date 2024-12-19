<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'float',
        'discount_price' => 'float',
        'count'=>'float',
    ];

    public function category(){
        return $this->belongsTo(Category::class );
    }

    public function brend(){
        return $this->belongsTo(Brend::class);
    }

    public function imagePath(){
        return '/storage/product_img/';
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function sup(){
        return $this->belongsTo(SupCategory::class , 'sup_id');
    }
}
