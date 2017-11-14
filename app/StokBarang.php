<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    protected $table = 'stok_barang';
    protected $primaryKey = 'id';
    protected $fillable = ['id','barang_id','admin_id','stok_masuk','stok_keluar','deskripsi'];
    
    public function barangnya() {
        return $this->belongsTo('\App\Barang', 'barang_id', 'id');
    }
    
    public function adminnya() {
        return $this->belongsTo('\App\User', 'admin_id', 'id');
    }
}
