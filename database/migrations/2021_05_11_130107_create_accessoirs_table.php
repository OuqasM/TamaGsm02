<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessoirs', function (Blueprint $table) {
            $table->id('id_acces');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('type');
            $table->double('prix')->nullable();
            $table->decimal('nbr_visite');
            $table->decimal('per_solde')->default(0);
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users');
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
        Schema::dropIfExists('accessoirs');
    }
}
