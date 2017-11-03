<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
             $table->increments('id');    
             $table->timestamps();
             $table->string('nama');
             $table->integer('kategori_id')->nullable();
             $table->integer('merek_id')->nullable();
             $table->integer('supplier_id')->nullable();
             $table->double('berat');
             $table->string('deskripsi')->nullable();
             $table->string('sku')->nullable();
             $table->double('harga')->nullable();
             $table->integer('stok')->default(0);   
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
