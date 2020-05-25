<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectifSpecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectif_specifiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('libelle')->nullable();

            $table->integer('objectif_strategique_id')->unsigned()->index();
            $table->foreign('objectif_strategique_id')
                ->references('id')
                ->on('objectif_strategiques')
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
        Schema::dropIfExists('objectif_specifiques');
    }
}
