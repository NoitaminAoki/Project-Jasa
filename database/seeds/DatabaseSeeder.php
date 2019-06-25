<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UserSeeder::class,
          HargaSeeder::class,
          PartnerSeeder::class,
          PeraturanSeeder::class,
          BantuanSeeder::class,
          PromosiSeeder::class,
          FiturSeeder::class,
          PenghasilanSeeder::class,
          MitraSeeder::class,
        ]);
    }
}
