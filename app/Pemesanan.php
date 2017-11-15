<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $fillable = ['id','cabang_id','kode_pemesanan','harga','status'];

    
    public function cabangnya() {
        return $this->belongsTo('\App\Cabang', 'cabang_id', 'id');
    }
}
