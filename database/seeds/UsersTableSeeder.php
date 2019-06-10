<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin E-Bina',
        'email' => 'admin@ebina.com',
        'profile_picture' => 'public/files/avatar5.png',
        'password' => bcrypt(Hash::make('adminebina')),
      ]);
      DB::table('members')->insert([
        'name' => 'Rizky',
        'code' => '017126756',
        'profile_picture' => 'public/files/avatar3.png',
        'noTelp' => '087776196047',
        'email' => 'rizky@ebina.com',
        'password' => bcrypt(Hash::make('rizkyebina')),
      ]);
    }
}
