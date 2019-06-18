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

      DB::table('penghasilans')->insert([
        [
          'idHarga' => 1,
          'point' => 5,
          'fee' => 4000000
        ],
        [
          'idHarga' => 2,
          'point' => 10,
          'fee' => 5000000
        ],
        [
          'idHarga' => 3,
          'point' => 2,
          'fee' => 2000000
        ]
      ]);
    }
}
