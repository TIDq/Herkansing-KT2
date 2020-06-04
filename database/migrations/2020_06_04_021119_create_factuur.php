<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactuur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factuur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('omschrijving');
            $table->string('begin');
            $table->string('eind');
            $table->integer('prijs');
            $table->integer('totaal');
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
        Schema::dropIfExists('factuur');
    }
}
