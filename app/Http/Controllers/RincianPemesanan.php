<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RincianPemesanan extends Controller
{
    public function show($id)
    {
        $data = \App\RincianPemesanan::where('pemesanan_id',$id)->get();
        
        if (isset($data)) {        
        foreach ($data as $key ) {
            if (isset($key->barang_id))
                $key->barang_id = $key->barangnya->nama;        
            } 
        }
        
        return $data;

    }

    public function all()
    {
        $data = \App\Barang::all();
        return $data;

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'barang_id' => 'required',
            'pemesanan_id' => 'required',
            'qty' => 'required',
        ]);

        $barang = \App\Barang::findOrFail($request['barang_id']);


        $tambah = new \App\RincianPemesanan();
        $tambah->pemesanan_id =  $request['pemesanan_id'];
        $tambah->barang_id =  $request['barang_id'];
        $tambah->harga_satuan =  $barang->harga;
        $tambah->qty =  $request['qty'];
        $tambah->harga_total =  $barang->harga * $request['qty'] ;
        $tambah->save();

        return $tambah;
    }

    public function destroy($id)
    {
        $task = \App\RincianPemesanan::findOrFail($id);
        $task->delete();
        return 204;
    }
}