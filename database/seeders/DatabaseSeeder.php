<?php

namespace Database\Seeders;

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
        $this->call(Karoserije::class);
        $this->call(Marke::class);
        $this->call(Automobili::class);
        $this->call(Korisnici::class);
    }
}
