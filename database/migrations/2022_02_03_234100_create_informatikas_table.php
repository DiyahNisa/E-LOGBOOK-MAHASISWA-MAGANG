<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatikasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatikas', function (Blueprint $table) {
            $table->increments('idInformatika');
            // $table->integer('mahasiswa_id')->unsigned();
            // $table->foreign('mahasiswa_id')->references('idMahasiswa')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kegiatanInformatika',100);
            $table->date('tglInformatika');
            $table->string('lokasiInformatika',50);
            $table->string('buktiInformatika',100);
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
        Schema::dropIfExists('informatikas');
    }
}
