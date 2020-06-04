<?php

use Illuminate\Database\Seeder;

class UitvoeringTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('uitvoering')->insert([
                'begin_datum' => '2020-'.rand(1,6).'-'.rand(1,30),
                'eind_datum' => '2020-'.rand(6,12).'-'.rand(1,30),
                'cursus_id' => rand(1, 10),
            ]);
        }
    }
}
