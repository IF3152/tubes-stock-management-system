<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RincianPemesanan extends Model
{
    protected $table = 'rincian_pemesanan';
    protected $primaryKey = 'id';
    protected $fillable = ['id','pemesanan_id','barang_id','harga_satuan','qty','harga_total'];

    
    public function pemesanannya() {
        return $this->belongsTo('\App\Pemesanan', 'pemesanan_id', 'id');
    }

    public function barangnya() {
        return $this->belongsTo('\App\Barang', 'barang_id', 'id');
    }

}
