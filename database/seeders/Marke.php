<?php

namespace Database\Seeders;

use App\Models\Marka;
use Illuminate\Database\Seeder;

class Marke extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marka::create([
            'marka' => 'Audi'
        ]);

        Marka::create([
            'marka' => 'BMW'
        ]);

        Marka::create([
            'marka' => 'Jeep'
        ]);

        Marka::create([
            'marka' => 'Mercedes Benz'
        ]);

        Marka::create([
            'marka' => 'Nissan'
        ]);

        Marka::create([
            'marka' => 'Rover'
        ]);
    }
}
