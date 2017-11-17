<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily() {
        $day = count(\App\Pemesanan::whereDay('created_at', '=', date('d'))->get());
        $dayminus1 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-1)->get());
        $dayminus2 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-2)->get());
        $dayminus3 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-3)->get());
        $dayminus4 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-4)->get());
        $dayminus5 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-5)->get());
        $dayminus6 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-6)->get());
        $data = [
            'day' => $day,
            'dayminus1' => $dayminus1,
            'dayminus2' => $dayminus2,
            'dayminus3' => $dayminus3,
            'dayminus4' => $dayminus4,
            'dayminus5' => $dayminus5,
            'dayminus6' => $dayminus6,

        ];
        return json_encode($data);
    }
    public function index()
    {   
        $data = [] ;

        $barang = \App\Barang::orderBy('stok', 'asc')->get();
        $cabang = \App\Cabang::all();
        $pemesananselesai = \App\Pemesanan::where('status',1)->get(); 
        $pemesanan = \App\Pemesanan::all();
        $persen = 0;
        if (count($pemesanan)>0)
            $persen = (count($pemesananselesai) / count($pemesanan)) * 100;

        $pemesananbulan = \App\Pemesanan::whereMonth('created_at', '=', date('m'))->get();

        $pendapatanbulan = 0;
        foreach ($pemesananbulan as $q) {
            $pendapatanbulan = $pendapatanbulan + $q->harga; 
        }

        $totalpendapatan = 0;
        foreach ($pemesanan as $q) {
            $totalpendapatan = $totalpendapatan + $q->harga;
        }

        $recentpemesanan = \App\Pemesanan::latest()->limit(5)->get();
        $runoutbarang = $barang = \App\Barang::orderBy('stok', 'asc')->limit(5)->get();
        $data = [
            'totalbarang' => count($barang),
            'totalcabang' => count($cabang),
            'totalpemesanan' => count($pemesanan),
            'persen' => $persen,
            'pesanbulan' => count($pemesananbulan),
            'pendapatanbulan' => $pendapatanbulan,
            'totalpendapatan' => $totalpendapatan,
        ];

        $day = count(\App\Pemesanan::whereDay('created_at', '=', date('d'))->get());
        $dayminus1 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-1)->get());
        $dayminus2 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-2)->get());
        $dayminus3 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-3)->get());
        $dayminus4 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-4)->get());
        $dayminus5 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-5)->get());
        $dayminus6 = count(\App\Pemesanan::whereDay('created_at', '=', date('d')-6)->get());
        $trends = [
            'day' => $day,
            'dayminus1' => $dayminus1,
            'dayminus2' => $dayminus2,
            'dayminus3' => $dayminus3,
            'dayminus4' => $dayminus4,
            'dayminus5' => $dayminus5,
            'dayminus6' => $dayminus6,

        ];
        
        return view('home',compact('data','recentpemesanan','runoutbarang','trends'));
    }
}
