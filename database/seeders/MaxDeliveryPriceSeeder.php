<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MaxDeliveryPrice;

class MaxDeliveryPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaxDeliveryPrice::create([
            'price'=>400000
        ]);
    }
}
