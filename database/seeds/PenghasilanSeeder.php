<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
          'id' => (string) Str::uuid(),
          'idHarga' => 1,
          'point' => 5,
          'fee' => 4000000
        ],
        [
          'id' => (string) Str::uuid(),
          'idHarga' => 2,
          'point' => 10,
          'fee' => 5000000
        ],
        [
          'id' => (string) Str::uuid(),
          'idHarga' => 3,
          'point' => 2,
          'fee' => 2000000
        ]
      ]);
    }
}
