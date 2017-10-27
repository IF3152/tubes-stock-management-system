<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sample()
    {
 
 	$data = ['number' => 5, 'total' => 12 ];
    // "emails.hello" adalah nama view.
    Mail::send('emails.sample', $data, function ($mail)
    {
      // Email dikirimkan ke address "momo@deviluke.com" 
      // dengan nama penerima "Momo Velia Deviluke"
      $mail->to('condro@outlook.co.id', 'Condro');
 
      // Copy carbon dikirimkan ke address "haruna@sairenji" 
      // dengan nama penerima "Haruna Sairenji"

      $mail->subject('Sample!');
    });
 
	}

}
