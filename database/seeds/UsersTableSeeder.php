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
<<<<<<< HEAD
        'noTelp' => '0899912371',
        'email' => 'rizky@ebina.com',
        'password' => bcrypt('rizky123'),
        'status' => 'active',
=======
        'code' => '017126756',
        'profile_picture' => 'public/files/avatar3.png',
        'noTelp' => '087776196047',
        'email' => 'rizky@ebina.com',
        'password' => Hash::make('rizkyebina'),
>>>>>>> 043e8359ef7ea3b6bc6fcbd4b97d4f29615f7bd3
      ]);
    }
}
