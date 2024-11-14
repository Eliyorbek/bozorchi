<?php

namespace App\Services;

use App\Models\ProductIncomeItem;

class ProductIncomeItemService
{

    public function getSave($data){
        return ProductIncomeItem::create($data);
    }

}
