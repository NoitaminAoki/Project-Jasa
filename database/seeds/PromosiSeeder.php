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
          'gambar' => 'promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-pertama/rizky',
          'startDate' => '2019-06-14 14:05:00',
          'endDate' => '2019-07-13 23:59:59',
        ],
        [
          'slug' => 'promosi-kedua',
          'title' => 'Promosi Kedua',
          'gambar' => 'promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-kedua/rizky',
          'startDate' => '2019-06-14 14:05:00',
          'endDate' => '2019-07-13 23:59:59',
        ],
        [
          'slug' => 'promosi-ketiga',
          'title' => 'Promosi Ketiga',
          'gambar' => 'promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-ketiga/rizky',
          'startDate' => '2019-06-14 14:05:00',
          'endDate' => '2019-07-13 23:59:59',
        ],
        [
          'slug' => 'promosi-keempat',
          'title' => 'Promosi Keempat',
          'gambar' => 'promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-keempat/rizky',
          'startDate' => '2019-06-14 14:05:00',
          'endDate' => '2019-07-13 23:59:59',
        ],
        [
          'slug' => 'promosi-kelima',
          'title' => 'Promosi kelima',
          'gambar' => 'promos.png',
          'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam non justo nec risus feugiat sagittis ac vel nunc.
                    Integer turpis urna, aliquet non enim id, ultrices pharetra orci. Suspendisse convallis sapien libero,
                    sit amet vestibulum.',
          'kode' => 'www.e-bina.id/promo/promosi-kelima/rizky',
          'startDate' => '2019-05-14 14:05:00',
          'endDate' => '2019-06-13 23:59:59',
        ]
      ]);
    }
}
