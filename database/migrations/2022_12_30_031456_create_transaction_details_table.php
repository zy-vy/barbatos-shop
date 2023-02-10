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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('transaction_id')->foreign()->references('id')
            ->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->foreign()->references('id')
            ->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sub_quantity');
            $table->integer('sub_total');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
