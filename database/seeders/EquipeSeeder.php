<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Equipe::create([
            'location'=>"Casablanca",

        ]);
        \App\Models\Equipe::create([
            'location'=>"Abidjan",

        ]);
    }
}
