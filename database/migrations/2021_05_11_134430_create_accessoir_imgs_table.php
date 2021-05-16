<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoirImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessoir_imgs', function (Blueprint $table) {
            $table->id('id');
            $table->string('path');
            $table->bigInteger('acces_id')->unsigned();
            $table->foreign('acces_id')->references('id_acces')->on('accessoirs');
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
        Schema::dropIfExists('accessoir_imgs');
    }
}
