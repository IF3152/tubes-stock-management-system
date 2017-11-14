<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Supplier extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Supplier::all();
        
        return view('admin.supplier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'numeric|required',
        ]);
        
        $tambah = new \App\Supplier();
        $tambah->nama =  $request['nama'];
        $tambah->alamat =  $request['alamat'];
        $tambah->telp =  $request['telp'];
        $tambah->save();

        return redirect()->route('supplier.index')->with('pesan','Berhasil membuat baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Supplier::findOrFail($id);
                
        return view('admin.supplier.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Supplier::findOrFail($id);
                
        return view('admin.supplier.edit',compact('data'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'numeric|required',
        ]);

        $edit = \App\Supplier::findOrFail($id);
        $edit->nama =  $request['nama'];
        $edit->alamat =  $request['alamat'];
        $edit->telp =  $request['telp'];
        $edit->save();

        return redirect()->route('supplier.index')->with('pesan','Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = \App\Supplier::findOrFail($id);
        $delete->delete();
        return redirect()->route('supplier.index')->with('pesan','Berhasil dihapus');
    }
}
