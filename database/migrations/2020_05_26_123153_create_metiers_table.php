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
            $table->bigIncrements('id')->comment('Identifiant du métier');
            $table->string('libelle', 120)->unique()->comment('Libellé du métier');
            $table->text('description')->comment('Court descriptif du métier');
            $table->string('slug', 120)->unique()->comment('Description succincte du métier');
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
