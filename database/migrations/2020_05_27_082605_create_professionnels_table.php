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
            $table->string('nom', 40)->comment('Nom du professionnel');
            $table->string('cp', 5)->comment('Code postal lieu d\'habitation du professionnel');
            $table->string('ville', 38)->comment('Lieu d\'habitation du professionnel');
            $table->string('telephone', 14)->comment('Téléphone fixe ou portable du professionnel');
            $table->string('email', 255)->unique()->comment('Email du professionnel');
            $table->boolean('formation')->comment('Activité de formation déjà réalisée');
            $table->set('domaine', ['S', 'R', 'D'])->comment('Domaine d\'activité Système, Réseau ou Développement du professionnel');
            $table->string('source', 255)->nullable()->comment('Source du profil (réseau, organisme partenaire, ...)');
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
