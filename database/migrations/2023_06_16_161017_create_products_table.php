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
            $table->string('name');
            $table->string('added_by')->default('admin');
            $table->integer('user_id');
            $table->double('unit_price');
            $table->double('purchase_price')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('photo',2000)->nullable();
            $table->string('thumbnail_img');
            $table->string('tags',1000)->nullable(); 
            $table->tinyInteger('featured')->default(0)->comment("'0' = 'non-featured', '1' = 'featured'"); 
            $table->string('unit');
            $table->integer('min_qty');
            $table->double('discount')->nullable();
            $table->integer('shipping_cost')->default(0);
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
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
