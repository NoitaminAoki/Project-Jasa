<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('support')->insert([
        [
          'email' => 'rizky@ebina.com',
          'pertanyaan' => 'Pertanyaan Pertama',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'rizky@ebina.com',
          'pertanyaan' => 'Pertanyaan Kedua',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'pertanyaan' => 'Pertanyaan Pertama',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'pertanyaan' => 'Pertanyaan Kedua',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'pertanyaan' => 'Pertanyaan Ketiga',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
