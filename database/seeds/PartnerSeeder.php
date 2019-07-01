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
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SURYA PUTRA SUKSES ',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. VERTICA LABORA SINERGI ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SHAFUTAMA INDONESIA',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. KHABAR BERITA INDONESIA ',
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. MITRA TEKNOLOGI INDONESIA ',
          'logo' => 'mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. SUMBER KREATIF IDE PRODUKSI ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. FORPHARM INDONESIA ',
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'PT. GRAHA SUPRA MANDIRI ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. AQILA SURYA PERDANA ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. HEXAGON MULTI-ENGINEERING ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. MAJU BERSAMA JAYA ',
          'logo' => 'mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. MITRA SUKSES USAHA BERSAMA',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. SURYA GEMILANG ',
          'logo' => 'alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'CV. SURYA PUTRA JAYA',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN AL HUSNAYAIN',
          'logo' => 'alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ANAK CERDAS BANGSA ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ALAZHAR BHAKTI BUDI ',
          'logo' => 'alazhar.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN BAITUL MAMUR ',
          'logo' => 'yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'nama' => 'YAYASAN ISLAM PUTRA TANJUNG',
          'logo' => 'yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
