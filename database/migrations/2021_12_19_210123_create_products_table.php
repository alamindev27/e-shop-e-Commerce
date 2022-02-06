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
            $table->text('slug');
            $table->integer('vendor_id');
            $table->integer('category_id');
            $table->text('product_name');
            $table->integer('product_price');
            $table->string('product_image');
            $table->longText('description');
            $table->longText('long_description');
            $table->integer('stock');
            $table->string('sku');
            $table->string('brand');
            $table->string('weight')->nullable();
            $table->string('dimension')->nullable();
            $table->string('material')->nullable();
            $table->text('others_info')->nullable();
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
