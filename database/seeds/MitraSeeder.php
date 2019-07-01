<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mitra')->insert([
          [
            'id' => (string) Str::uuid(),
            'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
            'email' => 'mitra@kesatu.com',
            'status' => 'pending',
            'hp' => '087776196047',
            'alamat' => 'lskaj klsaj flaswmnd,moi ausfyui d,afna,smfn saf sajkhfjks alkffu uiqeeqfqef',
            'created_at' => Carbon::now('Asia/Jakarta'),
          ],
          [
            'id' => (string) Str::uuid(),
            'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
            'email' => 'mitra@kedua.com',
            'status' => 'pending',
            'hp' => '087776196047',
            'alamat' => 'lskaj klsaj flaswmnd,moi ausfyui d,afna,smfn saf sajkhfjks alkffu uiqeeqfqef',
            'created_at' => Carbon::now('Asia/Jakarta'),
          ],
          [
            'id' => (string) Str::uuid(),
            'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
            'email' => 'mitra@ketiga.com',
            'status' => 'pending',
            'hp' => '087776196047',
            'alamat' => 'lskaj klsaj flaswmnd,moi ausfyui d,afna,smfn saf sajkhfjks alkffu uiqeeqfqef',
            'created_at' => Carbon::now('Asia/Jakarta'),
          ],
          [
            'id' => (string) Str::uuid(),
            'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
            'email' => 'mitra@keempat.com',
            'status' => 'pending',
            'hp' => '087776196047',
            'alamat' => 'lskaj klsaj flaswmnd,moi ausfyui d,afna,smfn saf sajkhfjks alkffu uiqeeqfqef',
            'created_at' => Carbon::now('Asia/Jakarta'),
          ]
        ]);
    }
}
