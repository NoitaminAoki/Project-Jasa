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
        'password' => Hash::make('adminebina'),
      ]);
      DB::table('members')->insert([
        'code' => 'id-Rizky',
        'name' => 'Rizky',
        'noTelp' => '0899912371',
        'email' => 'rizky@ebina.com',
        'password' => bcrypt('rizky123'),
        'status' => 'active',
      ]);
    }
}
