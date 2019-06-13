<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKliensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kliens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idHarga');
            $table->bigInteger('idMember')->unsigned()->nullable();
            $table->string('nama');
            $table->string('tempatTinggal');
            $table->string('noTelp', 20);
            $table->string('email');
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
        Schema::dropIfExists('kliens');
    }
}
