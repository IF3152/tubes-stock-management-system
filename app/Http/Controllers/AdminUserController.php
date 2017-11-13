<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cabang;
use App\UserRole;
use Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('isAdmin', 0)->get();
        $userrole = UserRole::all()->first(); // hanya agar fungsi dapat dipakai

        return view('admin.user.index', compact('users', 'userrole'));
    }

    /**
     * Show the form for creating a new resource.
     * * /cabang/create
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        $cabangs = Cabang::all();
        
        foreach($cabangs as $cabang){ 
            $cabang_map[$cabang->id] = $cabang->nama;
        }

        return view('admin.user.create', compact('cabang_map'));        
    }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'cabang' => 'required',
        ]);
        
        $user = (new User());
        $user->nama =  $request->input('nama');
        $user->cabang =  $request->input('cabang');
        $user->save();

        $userrole = new UserRole();
        $userrole->user_id = $user->id;
        $userrole->cabang_id = $cabang->id;
        $userrole->save();

        return redirect('/admin/user');
        
    }
    */
    /**
     * Display the specified resource.
     * /cabang/$id/
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $cabang = (new UserRole())->cabang($user);
        return view('admin.user.show', compact('user', 'cabang'));
    }

    /**
     * Show the form for editing the specified resource.
     * /admin/user/$id/edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabangs = Cabang::all();
        $user = User::find($id);
        
        foreach($cabangs as $cabang){ 
            $cabang_map[$cabang->id] = $cabang->nama;
        }

        return view('admin.user.edit', compact('user', 'cabang_map'));
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
            'name' => 'required',
            'cabang' => 'required',
        ]);
        
        // yang di pass adalah id cabang
        $user = User::find($id);
        $userrole = UserRole::where('user_id', $id);
        
        if($user->exists()){
            $user->name = $request->input('name');
            $user->save();
        
            // Kalau user terdapat di 2 cabang
            if(count($userrole)>=1){
                $userrole->delete();
            }

            $userrole = new UserRole();
            $userrole->user_id = (int)$id;
            $userrole->cabang_id = (int)$request->input('cabang'); 
            $userrole->ditetapkan_oleh = (int)Auth::user()->id; 
            $userrole->save();
        }
        else{
            echo "No data";
        }
        
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $userrole = UserRole::where('user_id', $id);

        $user->delete();
        $userrole->delete();

        return redirect('/admin/user');
    }
}
