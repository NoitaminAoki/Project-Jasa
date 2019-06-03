<?php

use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('partner')->insert([
        [
          'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
          'logo' => 'public/files/jakartateknologi.svg',
        ],
        [
          'nama' => 'PT. SURYA PUTRA SUKSES ',
          'logo' => 'public/files/suryaputra.svg',
        ],
        [
          'nama' => 'PT. VERTICA LABORA SINERGI ',
          'logo' => 'public/files/verticalab.png',
        ],
        [
          'nama' => 'PT. SHAFUTAMA INDONESIA',
          'logo' => 'public/files/shafutama.png',
        ],
        [
          'nama' => 'PT. KHABAR BERITA INDONESIA ',
          'logo' => 'public/files/jakartateknologi.svg',
        ],
        [
          'nama' => 'PT. MITRA TEKNOLOGI INDONESIA ',
          'logo' => 'public/files/mbj.svg',
        ],
        [
          'nama' => 'PT. SUMBER KREATIF IDE PRODUKSI ',
          'logo' => 'public/files/verticalab.png',
        ],
        [
          'nama' => 'PT. FORPHARM INDONESIA ',
          'logo' => 'public/files/jakartateknologi.svg',
        ],
        [
          'nama' => 'PT. GRAHA SUPRA MANDIRI ',
          'logo' => 'public/files/shafutama.png',
        ],
        [
          'nama' => 'CV. AQILA SURYA PERDANA ',
          'logo' => 'public/files/verticalab.png',
        ],
        [
          'nama' => 'CV. HEXAGON MULTI-ENGINEERING ',
          'logo' => 'public/files/shafutama.png',
        ],
        [
          'nama' => 'CV. MAJU BERSAMA JAYA ',
          'logo' => 'public/files/mbj.svg',
        ],
        [
          'nama' => 'CV. MITRA SUKSES USAHA BERSAMA',
          'logo' => 'public/files/suryaputra.svg',
        ],
        [
          'nama' => 'CV. SURYA GEMILANG ',
          'logo' => 'public/files/alhusnain.svg',
        ],
        [
          'nama' => 'CV. SURYA PUTRA JAYA',
          'logo' => 'public/files/suryaputra.svg',
        ],
        [
          'nama' => 'YAYASAN AL HUSNAYAIN',
          'logo' => 'public/files/alhusnain.svg',
        ],
        [
          'nama' => 'YAYASAN ANAK CERDAS BANGSA ',
          'logo' => 'public/files/shafutama.png',
        ],
        [
          'nama' => 'YAYASAN ALAZHAR BHAKTI BUDI ',
          'logo' => 'public/files/alazhar.svg',
        ],
        [
          'nama' => 'YAYASAN BAITUL MAMUR ',
          'logo' => 'public/files/yipt.svg',
        ],
        [
          'nama' => 'YAYASAN ISLAM PUTRA TANJUNG',
          'logo' => 'public/files/yipt.svg',
        ]
      ]);




















    }
}
