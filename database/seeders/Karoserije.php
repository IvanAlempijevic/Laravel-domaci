<?php

namespace Database\Seeders;

use App\Models\Karoserija;
use Illuminate\Database\Seeder;

class Karoserije extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karoserija::create([
            'karoserija' => 'Limuzina'
        ]);

        Karoserija::create([
            'karoserija' => 'Hecbek'
        ]);

        Karoserija::create([
            'karoserija' => 'Dzip'
        ]);

        Karoserija::create([
            'karoserija' => 'Kabriolet'
        ]);

    }
}
