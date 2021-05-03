<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etablissement')->insert([
            'nom' => "Formule 1",
            'adresse' => "1 Rue Général de Gaulle",
            'ville' => "Paris",
            'code_postal' => "75001",
            'pays' => "France",

        ]);

        DB::table('etablissement')->insert([
            'nom' => "Ibis",
            'adresse' => "2 Rue Général de Gaulle",
            'ville' => "Paris",
            'code_postal' => "75003",
            'pays' => "France",

        ]);

        DB::table('etablissement')->insert([
            'nom' => "mcdo",
            'adresse' => "5 Rue Général de Gaulle",
            'ville' => "Paris",
            'code_postal' => "75007",
            'pays' => "France",

        ]);
    }
}
