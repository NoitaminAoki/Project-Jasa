<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitur', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('fitur');
            $table->integer('harga_id');
            $table->enum('ada', ['iya', 'tidak', 'kosong'])->default('kosong');
            $table->enum('menu', ['sub', 'besar', 'biasa'])->default('biasa');
            $table->enum('tampilkan', ['iya', 'tidak'])->default('iya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiturs');
    }
}
