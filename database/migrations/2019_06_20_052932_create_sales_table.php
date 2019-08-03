<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->string("nama")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->text("alamat")->nullable();
            $table->string("bank")->nullable();
            $table->string('bukti')->nullable();
            $table->enum("status", ['Terkirim', 'Tidak terkirim', 'Di Proses'])->default('Di Proses');
            $table->timestamps();
        });

        Schema::create('sale_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("sale_id")->refrences('id')->on('sales')->onDelete('cascade');
            $table->bigInteger("product_id");
            $table->integer("qty");
            $table->integer("price");
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
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sale_items');
    }
}
