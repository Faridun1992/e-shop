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
            $table->string('title');
            $table->string('slug');
            $table->string('content');
            $table->integer('quantity')->unsigned()->nullable();
            $table->float('price')->unsigned();
            $table->float('old_price')->unsigned();
            $table->boolean('status')->default(false);
            $table->string('images');
            $table->string('description');
            $table->boolean('hit')->default(false);
            $table->foreignId('category_id')->unsigned()->nullable()->constrained('categories');
            $table->foreignId('brand_id')->unsigned()->nullable()->constrained('brands');
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
