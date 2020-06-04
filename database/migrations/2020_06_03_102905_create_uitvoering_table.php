<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUitvoeringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uitvoering', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('begin_datum');
            $table->date('eind_datum');
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
        Schema::dropIfExists('uitvoering');
    }
}
