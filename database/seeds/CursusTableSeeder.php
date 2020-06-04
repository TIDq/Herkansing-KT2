<?php

use Illuminate\Database\Seeder;

class CursusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('cursus')->insert([
                'cursuscode' => rand(1, 100),
                'omschrijving' => Str::random(10),
                'prijs' => rand(100, 800),
            ]);
        }
    }
}
