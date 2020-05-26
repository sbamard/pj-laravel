<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metiers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identifiant d\'un métier');
            $table->string('libelle', 120)->unique()->comment('Libelle du métier');
            $table->text('description')->comment('Court descriptif du métier');
            $table->string('slug', 120)->unique()->comment('Réecriture succincte du métier');
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
        Schema::dropIfExists('metiers');
    }
}
