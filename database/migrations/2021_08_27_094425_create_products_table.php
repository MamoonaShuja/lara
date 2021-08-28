<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('scat_id');
            $table->string('name');
            $table->string('slug');
            $table->string('price');
            $table->string('dicsount');
            $table->string('whole_sale_price');
            $table->string('sales_price');
            $table->string('min_whole_sale_quan');
            $table->string('image');
            $table->text('description');
            $table->text('size');
            $table->text('color');
            $table->integer('brand_id');
            $table->timestamps();
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
