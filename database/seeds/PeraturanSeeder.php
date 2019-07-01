<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PeraturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('peraturan')->insert([
        [
          'id' => (string) Str::uuid(),
          'judul' => 'Peraturan Pertama',
          'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit quam nec condimentum sagittis.
                          Curabitur ac turpis turpis. Duis est urna, egestas sit amet sapien at, suscipit porta sapien.
                          Aliquam id semper ex. Vivamus a augue sapien. Suspendisse elementum diam orci, sed commodo augue malesuada
                          sit amet. Aenean aliquam imperdiet elit. Quisque non auctor justo. Donec ac pulvinar erat. Aenean ullamcorper
                          neque in ante interdum, ac auctor nunc posuere. Maecenas vestibulum tortor nec euismod ultricies. Nullam tempus
                          at est dictum posuere. Nulla laoreet diam dapibus nunc porttitor malesuada. Quisque fermentum metus eu mi
                          accumsan, sit amet dignissim velit volutpat. Donec interdum lectus tincidunt augue fringilla, et dictum felis
                          blandit.',
        ],
        [
          'id' => (string) Str::uuid(),
          'judul' => 'Peraturan Kedua',
          'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit quam nec condimentum sagittis.
                          Curabitur ac turpis turpis. Duis est urna, egestas sit amet sapien at, suscipit porta sapien.
                          Aliquam id semper ex. Vivamus a augue sapien. Suspendisse elementum diam orci, sed commodo augue malesuada
                          sit amet. Aenean aliquam imperdiet elit. Quisque non auctor justo. Donec ac pulvinar erat. Aenean ullamcorper
                          neque in ante interdum, ac auctor nunc posuere. Maecenas vestibulum tortor nec euismod ultricies. Nullam tempus
                          at est dictum posuere. Nulla laoreet diam dapibus nunc porttitor malesuada. Quisque fermentum metus eu mi
                          accumsan, sit amet dignissim velit volutpat. Donec interdum lectus tincidunt augue fringilla, et dictum felis
                          blandit.',
        ],
        [
          'id' => (string) Str::uuid(),
          'judul' => 'Peraturan Ketiga',
          'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit quam nec condimentum sagittis.
                          Curabitur ac turpis turpis. Duis est urna, egestas sit amet sapien at, suscipit porta sapien.
                          Aliquam id semper ex. Vivamus a augue sapien. Suspendisse elementum diam orci, sed commodo augue malesuada
                          sit amet. Aenean aliquam imperdiet elit. Quisque non auctor justo. Donec ac pulvinar erat. Aenean ullamcorper
                          neque in ante interdum, ac auctor nunc posuere. Maecenas vestibulum tortor nec euismod ultricies. Nullam tempus
                          at est dictum posuere. Nulla laoreet diam dapibus nunc porttitor malesuada. Quisque fermentum metus eu mi
                          accumsan, sit amet dignissim velit volutpat. Donec interdum lectus tincidunt augue fringilla, et dictum felis
                          blandit.',
        ],
        [
          'id' => (string) Str::uuid(),
          'judul' => 'Peraturan Keempat',
          'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit quam nec condimentum sagittis.
                          Curabitur ac turpis turpis. Duis est urna, egestas sit amet sapien at, suscipit porta sapien.
                          Aliquam id semper ex. Vivamus a augue sapien. Suspendisse elementum diam orci, sed commodo augue malesuada
                          sit amet. Aenean aliquam imperdiet elit. Quisque non auctor justo. Donec ac pulvinar erat. Aenean ullamcorper
                          neque in ante interdum, ac auctor nunc posuere. Maecenas vestibulum tortor nec euismod ultricies. Nullam tempus
                          at est dictum posuere. Nulla laoreet diam dapibus nunc porttitor malesuada. Quisque fermentum metus eu mi
                          accumsan, sit amet dignissim velit volutpat. Donec interdum lectus tincidunt augue fringilla, et dictum felis
                          blandit.',
        ]
      ]);
    }
}
