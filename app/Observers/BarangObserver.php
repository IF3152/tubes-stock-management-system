<?php
namespace App\Observers;

use App\Notifications\BarangRunOut;
use App\Barang;
use App\User;
use Auth;

class BarangObserver
{
    public function updated(Barang $barang)
    {
    	if ($barang->stok < 5 ) {
	        $user = Auth::user();
	        $user->notify(new BarangRunOut($barang));
	    }
    }
}