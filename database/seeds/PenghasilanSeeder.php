<?php

use Illuminate\Database\Seeder;

class PenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
