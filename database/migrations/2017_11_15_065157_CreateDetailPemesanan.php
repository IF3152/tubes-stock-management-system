<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pemesanan_id')->unsigned();
            $table->integer('barang_id');
            $table->double('harga_satuan')->default(0);
            $table->integer('qty')->default(0);
            $table->double('harga_total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_pemesanan');
    }
}
