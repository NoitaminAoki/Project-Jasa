<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
          'id' => (string) Str::uuid(),
          'email' => 'rizky@ebina.com',
          'subjek' => 'subjek pertanyaan Pertama',
          'pertanyaan' => 'Pertanyaan Pertama',
          'created_at' => Carbon::now('Asia/Jakarta'),
          'status_terbalas' => 'belum',
          'tampilkan' => 'tidak',
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'rizky@ebina.com',
          'subjek' => 'subjek pertanyaan Kedua',
          'pertanyaan' => 'Pertanyaan Kedua',
          'created_at' => Carbon::now('Asia/Jakarta'),
          'status_terbalas' => 'belum',
          'tampilkan' => 'tidak',
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'andi@ebina.com',
          'subjek' => 'subjek pertanyaan Ketiga',
          'pertanyaan' => 'Pertanyaan Ketiga',
          'created_at' => Carbon::now('Asia/Jakarta'),
          'status_terbalas' => 'belum',
          'tampilkan' => 'tidak',
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'andi@ebina.com',
          'subjek' => 'subjek pertanyaan Keempat',
          'pertanyaan' => 'Pertanyaan Keempat',
          'created_at' => Carbon::now('Asia/Jakarta'),
          'status_terbalas' => 'belum',
          'tampilkan' => 'tidak',
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'barqi@ebina.com',
          'subjek' => 'subjek pertanyaan Kelima',
          'pertanyaan' => 'Pertanyaan Kelima',
          'status_terbalas' => 'sudah',
          'tampilkan' => 'iya',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'adit@ebina.com',
          'subjek' => 'subjek pertanyaan Keenam',
          'pertanyaan' => 'Pertanyaan Kelima',
          'status_terbalas' => 'sudah',
          'tampilkan' => 'iya',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'email' => 'megi@ebina.com',
          'subjek' => 'subjek pertanyaan Ketujuh',
          'pertanyaan' => 'Pertanyaan Kelima',
          'status_terbalas' => 'sudah',
          'tampilkan' => 'iya',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
