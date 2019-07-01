<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      $firstName = [
        'Ahmad',
        'Agus',
        'Hari',
        'Irfan',
        'Sugeng',
        'Ika',
        'Supriyadi',
        'Jono',
        'Ikbal',
        'Achmad',
        'Ginjar',
        'Joko'
      ];
      $lastName = [
        'Mukti',
        'Anwar',
        'Sudrajat',
        'Akbar',
        'Sartino',
        'Sudibjo',
        'Ira',
        'Aryati',
        'Ferdiansyah',
        'Rusdi',
        'Anto',
        'Anton',
        'Rusdiyanto',
        'Yatno'
      ];
    $arrIdMember = ['1','2',null];
    $arrTempatTinggal = [
      'DKI Jakarta',
      'Depok',
      'Bogor',
      'Bekasi',
      'Bali',
      'Magelang',
      'Banten',
      'Aceh',
      'Lampung',
      'Tangerang'
    ];
    $arrStatus = [
      'pending',
      'negosiasi',
      'deal'
    ];

    DB::table('users')->insert([
      'name' => 'Admin E-Bina',
      'email' => 'admin@ebina.com',
      'password' => Hash::make('adminebina'),
    ]);
    DB::table('members')->insert([
      [
        'id' => (string) Str::uuid(),
        'code' => 'id-Rizky',
        'name' => 'Rizky',
        'noTelp' => '0899912371',
        'email' => 'rizky@ebina.com',
        'password' => bcrypt('rizky123'),
        'status' => 'active',
      ],
      [
        'id' => (string) Str::uuid(),
        'code' => 'id-BariqDharmawan',
        'name' => 'Bariq Dharmawan',
        'noTelp' => '0858919113',
        'email' => 'bariq.dharmawan@ebina.com',
        'password' => bcrypt('bariq123'),
        'status' => 'active',
      ]

    ]);
    for ($i=0; $i < 25; $i++) {
      $fullname = array_random($firstName).' '.array_random($lastName);
      $idHarga = rand(1, 3);
      $idMember = array_random($arrIdMember);
      $tempatTinggal = array_random($arrTempatTinggal);
      $email = Str::slug($fullname, '.').'@gmail.com';
      $noTelp = '08';
      $status = array_random($arrStatus);

      for ($tlp=0; $tlp < 10; $tlp++) {
        $noTelp =$noTelp.rand('1','9');
      }

      DB::table('kliens')->insert([
        'id' => (string) Str::uuid(),
        'nama' => $fullname,
        'idHarga' => $idHarga,
        'idMember' => $idMember,
        'tempatTinggal' => $tempatTinggal,
        'noTelp' => $noTelp,
        'email' => $email,
        'status' => $status,
        'created_at' => date("Y-m-d", strtotime("-".rand(0,6)." days"))
    ]);
    }
  }
}
