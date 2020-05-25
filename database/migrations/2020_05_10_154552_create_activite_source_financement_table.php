<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiviteSourceFinancementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_source_financement', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('activite_id')->index();
            $table->foreign('activite_id')
                ->references('id')
                ->on('activites')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('source_financement_id')->index();
            $table->foreign('source_financement_id')
                ->references('id')
                ->on('source_financements')
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
        Schema::dropIfExists('activite_source_financement');
    }
}
