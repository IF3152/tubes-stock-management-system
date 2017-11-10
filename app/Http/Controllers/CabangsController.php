<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabang;

class CabangsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabangs = Cabang::all();
        return view('cabangs.index')->with('cabangs', $cabangs);
    }

    /**
     * Show the form for creating a new resource.
     * * /cabang/create
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabangs.create');        
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
            'telp' => 'required',
        ]);
        
        $tambah = new Cabang();
        
        $tambah->nama =  $request->input('nama');
        $tambah->alamat =  $request->input('alamat');
        $tambah->telp =  $request->input('telp');

        $tambah->save();

        return redirect('/cabang');
    }

    /**
     * Display the specified resource.
     * /cabang/$id/
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabang = Cabang::find($id);
        return view('cabangs.show')->with('cabang', $cabang);
    }

    /**
     * Show the form for editing the specified resource.
     * /cabang/$id/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabang = Cabang::find($id);
        // Check for correct user
        //if(auth()->user()->id !== $post->user_id){
        //    return redirect('/posts')->with('error', 'Unauthorized page');
        //}

        return view('cabangs.edit')->with('cabang', $cabang);
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
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);
        // Create Cabang
        $cabang = Cabang::find($id);
        
        if(count($cabang)>0){
            
            $cabang->nama = $request->input('nama');
            $cabang->alamat = $request->input('alamat');
            $cabang->telp = $request->input('telp');
            
            $cabang->save();
        }
        else{
            echo "No data";
        }

        return redirect('/cabang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        $cabang = Cabang::find($id);
        
        if(count($cabang)>0){
            $cabang->delete();
        }
        else{
            echo "No data";
        }

        return redirect('/cabang');
    }
}
