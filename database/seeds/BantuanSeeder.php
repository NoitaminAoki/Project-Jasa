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
          'subjek' => 'subjek pertanyaan Pertama',
          'pertanyaan' => 'Pertanyaan Pertama',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'rizky@ebina.com',
          'subjek' => 'subjek pertanyaan Kedua',
          'pertanyaan' => 'Pertanyaan Kedua',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'subjek' => 'subjek pertanyaan Ketiga',
          'pertanyaan' => 'Pertanyaan Ketiga',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'subjek' => 'subjek pertanyaan Keempat',
          'pertanyaan' => 'Pertanyaan Keempat',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'email' => 'andi@ebina.com',
          'subjek' => 'subjek pertanyaan Kelima',
          'pertanyaan' => 'Pertanyaan Kelima',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
