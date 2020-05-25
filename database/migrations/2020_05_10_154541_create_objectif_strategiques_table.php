<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectifStrategiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectif_strategiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('libelle')->nullable();

            $table->integer('entite_id')->unsigned()->index();
            $table->foreign('entite_id')
                ->references('id')
                ->on('entites')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('objectif_strategiques');
    }
}
