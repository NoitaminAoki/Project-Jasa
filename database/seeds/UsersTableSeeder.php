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
        'name' => 'Rizky',
        'email' => 'rizky@ebina.com',
        'password' => bcrypt('rizky123'),
      ]);
    }
}
