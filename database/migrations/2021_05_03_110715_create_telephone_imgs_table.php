<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephoneImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephone_imgs', function (Blueprint $table) {
            $table->id('id');
            $table->string('path');
            $table->bigInteger('tele_id')->unsigned();
            $table->foreign('tele_id')->references('id_tele')->on('telephones');
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
        Schema::dropIfExists('telephone_imgs');
    }
}
