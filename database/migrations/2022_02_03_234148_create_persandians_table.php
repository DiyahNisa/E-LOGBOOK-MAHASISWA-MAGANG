<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersandiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persandians', function (Blueprint $table) {
            $table->increments('idPersandian');
            // $table->integer('mahasiswa_id')->unsigned();
            // $table->foreign('mahasiswa_id')->references('idMahasiswa')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kegiatanPersandian',100);
            $table->date('tglPersandian');
            $table->string('lokasiPersandian',50);
            $table->string('buktiPersandian',100);
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
        Schema::dropIfExists('persandians');
    }
}
