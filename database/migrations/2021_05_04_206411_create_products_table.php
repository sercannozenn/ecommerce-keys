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
            $table->id('product_id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('product_short_description')->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('price',13,2)->default(0.00);
            $table->tinyInteger('is_active')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories')
                ->onDelete('cascade');
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
