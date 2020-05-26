<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\Competence::create(
            [
                'libelle' => 'Wordpress',
                'description' => 'Wordpress est un système de gestion de contenu gratuit, libre et opensource',
            ]
        );

        App\Competence::create(
            [
                'libelle' => 'HTML',
                'description' => 'Hyper Text Markup Language',
            ]
        );
    }
}
