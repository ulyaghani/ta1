<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Primary key with auto increment
            $table->binary('picture')->nullable(); // To store image
            $table->string('product_name', 255); // Product name
            $table->text('spesification')->nullable(); // Product specification
            $table->decimal('price', 10, 2); // Product price
            $table->timestamps(); // Created_at and updated_at columns
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
};
