<?php

namespace App\Services;

use App\Models\ProductIncome;

class ProductIncomeService
{

    public function getSave($data){
        return ProductIncome::create([
            'supplier_id' => $data['supplier_id'],
            'date' => $data['date'],
            'comment' => $data['comment'],
        ]);
    }

    public function getUpdate($data , $id){
        $income = ProductIncome::find($id);
        return $income->update([
            'supplier_id' => $data['supplier_id'],
            'date' => $data['date'],
            'comment' => $data['comment'],
        ]);
    }

}
