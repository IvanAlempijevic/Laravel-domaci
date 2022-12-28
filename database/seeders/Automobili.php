<?php

namespace Database\Seeders;

use App\Models\Automobil;
use Illuminate\Database\Seeder;

class Automobili extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++){
            Automobil::create([
                'markaID' => $faker->numberBetween(1,6),
                'model' => strtoupper($faker->bothify('?#')),
                'karoserijaID' => $faker->numberBetween(1,4),
                'cena' => $faker->numberBetween(1500,40000),
                'brojVrata' => $faker->randomElement(['2/3', '4/5'])
            ]);
        }
    }
}
