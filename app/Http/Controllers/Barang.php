<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = \App\Kategori::all();
        $supplier = \App\Supplier::all();
        $merek = \App\Merek::all();
        $data = \App\Barang::all();
        
        return view('admin.barang.index',compact('data','merek','kategori','supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = \App\Kategori::all();
        $supplier = \App\Supplier::all();
        $merek = \App\Merek::all();
        
        return view('admin.barang.create',compact('merek','kategori','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sku' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'supplier' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);
        
        $tambah = new \App\Barang();
        $tambah->sku =  $request['sku'];
        $tambah->nama =  $request['nama'];
        $tambah->deskripsi =  $request['deskripsi'];
        $tambah->kategori_id =  $request['kategori'];
        $tambah->merek_id =  $request['merek'];
        $tambah->supplier_id =  $request['supplier'];
        $tambah->berat =  $request['berat'];
        $tambah->harga =  $request['harga'];
        $tambah->save();

        return redirect()->route('barang.index')->with('pesan','Berhasil membuat baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Barang::findOrFail($id);
                
        return view('admin.barang.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = \App\Kategori::all();
        $supplier = \App\Supplier::all();
        $merek = \App\Merek::all();
        
        $data = \App\Barang::findOrFail($id);

        return view('admin.barang.edit',compact('data','merek','kategori','supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'sku' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'supplier' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);
        
        $edit = \App\Barang::findOrFail($id);
        $edit->sku =  $request['sku'];
        $edit->nama =  $request['nama'];
        $edit->deskripsi =  $request['deskripsi'];
        $edit->kategori_id =  $request['kategori'];
        $edit->merek_id =  $request['merek'];
        $edit->supplier_id =  $request['supplier'];
        $edit->berat =  $request['berat'];
        $edit->harga =  $request['harga'];
        $edit->save();

        return redirect()->route('barang.index')->with('pesan','Berhasil membuat baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = \App\Barang::findOrFail($id);
        $delete->delete();
        return redirect()->route('barang.index')->with('pesan','Berhasil dihapus');
    }

    public function StokBarangIndex($id)
    {
        $data = \App\Barang::findOrFail($id);
        $stokbarang = \App\StokBarang::where('barang_id',$id)->get();
        return view('admin.barang.stok-index',compact('data','stokbarang'));
    }
    public function StokBarangCreate($id)
    {
        $data = \App\Barang::findOrFail($id);
        return view('admin.barang.stok-add', compact('data'));   
    }

    public function StokBarangStore(Request $request, $id)
    {
        $data = \App\Barang::findOrFail($id);
        $stokbarang = \App\StokBarang::where('barang_id',$id)->get();

        $this->validate($request, [
            'stok_masuk' => 'required',
            'stok_keluar' => 'required',
        ]);
        
        $tambah = new \App\StokBarang();
        $tambah->barang_id =  $id;
        $tambah->stok_masuk =  $request['stok_masuk'];
        $tambah->stok_keluar =  $request['stok_keluar'];
        $tambah->deskripsi =  $request['deskripsi'];
        $tambah->save();

        $data->stok = $request['stok_masuk'] - $request['stok_keluar'];
        $data->save();

        return redirect()->route('stok-barang',$id)->with('pesan','Berhasil membuat baru');
    }
}
