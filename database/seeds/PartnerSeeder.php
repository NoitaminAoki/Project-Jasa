<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
          'id' => (string) Str::uuid(),
          'nama' => 'PT. JAKARTA TEKNOLOGI SOLUSINDO ',
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. SURYA PUTRA SUKSES ',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. VERTICA LABORA SINERGI ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. SHAFUTAMA INDONESIA',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. KHABAR BERITA INDONESIA ',
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. MITRA TEKNOLOGI INDONESIA ',
          'logo' => 'mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. SUMBER KREATIF IDE PRODUKSI ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. FORPHARM INDONESIA ',
          'logo' => 'jakartateknologi.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'PT. GRAHA SUPRA MANDIRI ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. AQILA SURYA PERDANA ',
          'logo' => 'verticalab.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. HEXAGON MULTI-ENGINEERING ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. MAJU BERSAMA JAYA ',
          'logo' => 'mbj.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. MITRA SUKSES USAHA BERSAMA',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. SURYA GEMILANG ',
          'logo' => 'alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'CV. SURYA PUTRA JAYA',
          'logo' => 'suryaputra.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'YAYASAN AL HUSNAYAIN',
          'logo' => 'alhusnain.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'YAYASAN ANAK CERDAS BANGSA ',
          'logo' => 'shafutama.png',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'YAYASAN ALAZHAR BHAKTI BUDI ',
          'logo' => 'alazhar.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'YAYASAN BAITUL MAMUR ',
          'logo' => 'yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ],
        [
          'id' => (string) Str::uuid(),
          'nama' => 'YAYASAN ISLAM PUTRA TANJUNG',
          'logo' => 'yipt.svg',
          'created_at' => Carbon::now('Asia/Jakarta'),
        ]
      ]);
    }
}
