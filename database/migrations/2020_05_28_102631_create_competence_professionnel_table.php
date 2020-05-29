<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceProfessionnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_professionnel', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identifiant relation professionnel-competence');
            $table->timestamps();

            $table->unsignedBigInteger('competence_id')->comment('Identifiant de la competence');
            $table->foreign('competence_id')
                ->references('id')
                ->on('competences')
                ->onDelete('cascade') //Suppression en cascade
                ->onUpdate('cascade'); //Modification en cascade

            $table->unsignedBigInteger('professionnel_id')->comment('Identifiant du professionnel');
            $table->foreign('professionnel_id')
                ->references('id')
                ->on('professionnels')
                ->onDelete('cascade') //Suppression en cascade
                ->onUpdate('cascade'); //Modification en cascade


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_professionnel');
    }
}
