<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionnels', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identifiant du professionnel');
            $table->string('prenom', 25)->comment('Prénom du professionnel');
            $table->string('nom', 50)->comment('Nom du professionnel');
            $table->string('cp', 50)->comment('Code postal lieu d\'habitation du professionnel');
            $table->string('ville', 38)->comment('Lieu d\'habitation du professionnel');
            $table->string('telephone', 14)->comment('Téléphone du professionnel');
            $table->string('mail', 255)->unique()->comment('Adresse mail du professionnel');
            $table->boolean('formation')->comment('Activité de formation déjà réalisée');
            $table->set('domaine', ['S', 'R', 'D'])->comment('Domaine d\'activité système, réseau ou développement');
            $table->string('source', 255)->nullable()->comment('Source du profil (réseaux, organisme partenaire...)');
            $table->text('observation')->nullable()->comment('Zone de commentaires');
            $table->timestamps();
            $table->unsignedBigInteger('metier_id')->comment('Identifiant du métier du profil');
            $table->foreign('metier_id')
                ->references('id')
                ->on('metiers')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionnels');
    }
}
