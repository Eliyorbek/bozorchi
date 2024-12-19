<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
//            $table->json('qr_code')->nullable();
            $table->float('price')->nullable();
//            $table->bigInteger('sale_price')->nullable();
            $table->float('discount_price')->nullable();
//            $table->string('color')->nullable();
            $table->longText('description')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('brend_id')->unsigned()->nullable();
            $table->float('count')->nullable();
            $table->string('status')->default('nofaol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
