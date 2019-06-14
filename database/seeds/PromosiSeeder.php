<?php

use Illuminate\Database\Seeder;

class PromosiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('promosi')->insert([
        [
          'slug' => 'promosi-pertama',
          'title' => 'Promosi Pertama',
          'gambar' => 'public/files/promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-pertama/rizky',
          'startDate' => '14 June 2019',
          'endDate' => '18 June 2019',
        ],
        [
          'slug' => 'promosi-kedua',
          'title' => 'Promosi Kedua',
          'gambar' => 'public/files/promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-kedua/rizky',
          'startDate' => '14 June 2019',
          'endDate' => '18 June 2019',
        ],
        [
          'slug' => 'promosi-ketiga',
          'title' => 'Promosi Ketiga',
          'gambar' => 'public/files/promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-ketiga/rizky',
          'startDate' => '14 June 2019',
          'endDate' => '18 June 2019',
        ],
        [
          'slug' => 'promosi-keempat',
          'title' => 'Promosi Keempat',
          'gambar' => 'public/files/promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-keempat/rizky',
          'startDate' => '14 June 2019',
          'endDate' => '18 June 2019',
        ],
        [
          'slug' => 'promosi-kelima',
          'title' => 'Promosi kelima',
          'gambar' => 'public/files/promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-kelima/rizky',
          'startDate' => '14 June 2019',
          'endDate' => '18 June 2019',
        ]
      ]);
    }
}
