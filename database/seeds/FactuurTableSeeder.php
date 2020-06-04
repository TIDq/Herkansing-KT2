<?php

use Illuminate\Database\Seeder;
use App\Factuur;

class FactuurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            DB::table('factuur')->insert([
                'omschrijving' => Str::random(10),
                'begin' => rand(0,10),
                'eind' => rand(0,10),
                'prijs' => rand(500,500),
                'totaal' => rand(1000,1000),
            ]);
        }
    }
}
