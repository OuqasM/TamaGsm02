<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telephones', function (Blueprint $table) {
            $table->id('id_tele');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('marque');
            $table->double('prix')->nullable();
            $table->decimal('nbr_visite');
            $table->decimal('ram')->nullable();
            $table->double('stockage')->nullable();
            $table->decimal('selfy_cam_resolution')->nullable();
            $table->decimal('back_cam_reslolution')->nullable();
            $table->double('taille_ecron')->nullable();
            $table->decimal('battery')->nullable();
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
        Schema::dropIfExists('telephones');
    }
}
