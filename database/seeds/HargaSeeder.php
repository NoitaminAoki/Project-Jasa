<?php

use Illuminate\Database\Seeder;

class HargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('harga')->insert([
        [
          'harga' => 350,
          'tingkat' => 'bisnis',
        ],
        [
          'harga' => 500,
          'tingkat' => 'profesional',
        ],
        [
          'harga' => 200,
          'tingkat' => 'pemula',
        ]
      ]);
    }
}
