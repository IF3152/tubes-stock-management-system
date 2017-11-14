<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama'];
}
