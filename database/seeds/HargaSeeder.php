<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
          'id' => (string) Str::uuid(),
          'harga' => 350,
          'tingkat' => 'bisnis',
        ],
        [
          'id' => (string) Str::uuid(),
          'harga' => 500,
          'tingkat' => 'profesional',
        ],
        [
          'id' => (string) Str::uuid(),
          'harga' => 200,
          'tingkat' => 'pemula',
        ]
      ]);
    }
}
