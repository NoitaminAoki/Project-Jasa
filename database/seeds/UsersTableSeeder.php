<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        'password' => bcrypt('adminebina'),
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
