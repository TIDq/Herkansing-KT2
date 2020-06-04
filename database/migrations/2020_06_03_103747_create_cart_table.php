<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nummer');
            $table->string('merk');
            $table->string('type');
            $table->string('status');
            $table->string('omschrijving');
            $table->unsignedBigInteger('cursus_id')->nullable();
            $table->foreign('cursus_id')->references('id')->on('cursus');
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
        Schema::dropIfExists('cart');
    }
}
