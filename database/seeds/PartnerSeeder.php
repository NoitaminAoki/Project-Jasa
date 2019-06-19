<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SURYA PUTRA SUKSES ',
          'logo' => 'public/files/suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. VERTICA LABORA SINERGI ',
          'logo' => 'public/files/verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SHAFUTAMA INDONESIA',
          'logo' => 'public/files/shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. KHABAR BERITA INDONESIA ',
          'logo' => 'public/files/jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. MITRA TEKNOLOGI INDONESIA ',
          'logo' => 'public/files/mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SUMBER KREATIF IDE PRODUKSI ',
          'logo' => 'public/files/verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. FORPHARM INDONESIA ',
          'logo' => 'public/files/jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. GRAHA SUPRA MANDIRI ',
          'logo' => 'public/files/shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. AQILA SURYA PERDANA ',
          'logo' => 'public/files/verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. HEXAGON MULTI-ENGINEERING ',
          'logo' => 'public/files/shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. MAJU BERSAMA JAYA ',
          'logo' => 'public/files/mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. MITRA SUKSES USAHA BERSAMA',
          'logo' => 'public/files/suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. SURYA GEMILANG ',
          'logo' => 'public/files/alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. SURYA PUTRA JAYA',
          'logo' => 'public/files/suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN AL HUSNAYAIN',
          'logo' => 'public/files/alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ANAK CERDAS BANGSA ',
          'logo' => 'public/files/shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ALAZHAR BHAKTI BUDI ',
          'logo' => 'public/files/alazhar.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN BAITUL MAMUR ',
          'logo' => 'public/files/yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ISLAM PUTRA TANJUNG',
          'logo' => 'public/files/yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
