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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('sub_sub_category_id');
            $table->string('pro_name_en');
            $table->string('pro_slug_en');
            $table->string('pro_slug_hin');
            $table->string('pro_cde');
            $table->string('pro_qty');
            $table->string('pro_tag_en');
            $table->string('pro_tag_hin');
            $table->string('pro_size_en')->nullable();
            $table->string('pro_size_hin')->nullable();
            $table->string('pro_color_en');
            $table->string('pro_color_hin');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_des_en');
            $table->string('short_des_hin');
            $table->string('long_des_en');
            $table->string('long_des_hin');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_price')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
