<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	protected $table = 'barang';
  	protected $primaryKey = 'id';
  	protected $fillable = ['id','nama','kategori_id','supplier_id','merek_id','berat','stok','deskripsi','sku','harga'];



  	public function kategorinya() {
	    return $this->belongsTo('\App\Kategori', 'kategori_id', 'id');
	}

	public function mereknya() {
	    return $this->belongsTo('\App\Merek', 'merek_id', 'id');
	}

	public function suppliernya() {
	    return $this->belongsTo('\App\Supplier', 'supplier_id', 'id');
	}
}
