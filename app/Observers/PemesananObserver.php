<?php
namespace App\Observers;

use App\Notifications\NewOrder;
use App\Pemesanan;
use App\User;
use Auth;

class PemesananObserver
{
    public function created(Pemesanan $pemesanan)
    {
        //$user = Auth::user();
        $admin = User::where('isAdmin',1)->get();
        //$user->notify(new NewOrder($pemesanan));
        foreach ($admin as $a) {
            $a->notify(new NewOrder($pemesanan));
        }
        
        
    }
}