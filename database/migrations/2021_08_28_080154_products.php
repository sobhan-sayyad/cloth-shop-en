<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('product_code');
            $table->integer('category_id');
            $table->text('image');
            $table->string('type');
            $table->decimal('price');
            $table->integer('discount')->nullable();
            $table->timestamps();

            $table->unique('title');
            $table->unique('product_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
