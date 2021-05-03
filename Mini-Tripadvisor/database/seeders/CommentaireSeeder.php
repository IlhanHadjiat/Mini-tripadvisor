<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaire')->insert([
            'Commentaire' => "super nice",
            'auteur' => "Mahmoud",
            'note' => "5/5",
        ]);

        DB::table('commentaire')->insert([
            'Commentaire' => "nice",
            'auteur' => "Albert",
            'note' => "3/5",
        ]);

        DB::table('etablissement')->insert([
            'Commentaire' => "pas nice",
            'auteur' => "Cariped",
            'note' => "1/5",
        ]);    }
}
