<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DataUserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id','desc')->get();
        return view('admin.user',compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => "Sudah memiliki akun atau akun sudah digunakan",
            'max' => " :attribute harus diisi maksimal :max karakter"
        ];

        $request->validate([
            'nama' => 'required|unique:users',
            'level' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ],$messages);

        User::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

         return back()->with(['success' => 'Data Akun Berhasil Ditambahkan!']);
    }

    public function show(User $User)
    {
        
    }

    public function edit(User $User)
    {
        //
    }

    public function update(Request $request, User $User)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => "Sudah memiliki akun atau akun sudah digunakan",
            'max' => " :attribute harus diisi maksimal :max karakter"
        ];
        $request->validate([
            'nama' => 'required',
            'level' => 'required',
            'username' => 'required',
            'password' => 'required',
        ],$messages);

        User::where('id', $User->id)
            ->update([
                'nama' => $request->nama,
                'level' => $request->level,
                // 'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            // return dd($User);
        return redirect('/user')->with(['success' => 'Data Akun Berhasil Diubah!']);
    }

    public function destroy(User $User)
    {
        User::destroy($User->id);
        return redirect('/user')->with(['success' => 'Data Akun Berhasil Dihapus!']);
    }
}
