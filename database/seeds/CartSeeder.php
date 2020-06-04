<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('cart')->insert([
                'nummer' => rand(1,100),
                'merk' => Str::random(10),
                'type' => Str::random(10),
                'omschrijving' => Str::random(10),
                'status' => 'Ready to race',
            ]);
        }
    }
}
