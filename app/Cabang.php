<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $primaryKey =  'id'; // to declare a primary key
    protected $fillable = ['id','nama', 'alamat','telp'];
}
