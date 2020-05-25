<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('activite')->nullable();
            $table->integer('cible')->nullable();
            $table->float('cout_estimatif')->nullable();
            $table->boolean('t1')->default(FALSE);
            $table->boolean('t2')->default(FALSE);
            $table->boolean('t3')->default(FALSE);
            $table->boolean('t4')->default(FALSE);
            $table->string('contrainte_realisation')->nullable();

            $table->integer('objectif_specifique_id')->unsigned()->index();
            $table->foreign('objectif_specifique_id')
                ->references('id')
                ->on('objectif_specifiques')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('direction_id')->unsigned()->index();
            $table->foreign('direction_id')
                ->references('id')
                ->on('directions')
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
        Schema::dropIfExists('activites');
    }
}
