<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultatAttendusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultat_attendus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->nullable();

            $table->integer('activite_id')->unsigned()->index();
            $table->foreign('activite_id')
                ->references('id')
                ->on('activites')
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
        Schema::dropIfExists('resultat_attendus');
    }
}
