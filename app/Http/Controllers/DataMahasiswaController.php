<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use App\User;

class DataMahasiswaController extends Controller
{
    public function index()
    {


        // $mhs = Mahasiswa::where('level',auth()->user()->level,'desc')->get();
        // $mhs = Mahasiswa::where('level', auth()->user()->level,'desc')->get();
        // $mhs = Mahasiswa::where('level',auth()->user()->level,'desc')->get();
        // $mhs = Mahasiswa::where('level',auth()->user()->level,'desc')->get();
        $user = User::orderBy('id','desc')->get();
        $mhs = Mahasiswa::orderBy('idMahasiswa','desc')->get();
        // return dd($mhs);
        return view('admin.mahasiswa',compact('mhs','user'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
            'max' => ":attribute harus diisi maksimal :max karakter",
            'min' => ":attribute harus diisi minimal :min karakter",
        ];
        $request->validate([
            'user_id' => 'required',
            'nim' => 'required',
            'univ' => 'required',
            'noTelp' => 'required|max:13|min:11',
            'email' => 'email',
            'alamat' => 'required',
        ],$messages);

            $mahasiswa = new Mahasiswa;
            $mahasiswa->user_id = $request->user_id;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->univ = $request->univ;
            $mahasiswa->noTelp = $request->noTelp;
            $mahasiswa->email = $request->email;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->level = auth()->user()->level;
            $mahasiswa->save();

            return back()->with(['success' => 'Data Mahasiswa Berhasil Ditambahkan!']);
    }


    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
            'max' => ":attribute harus diisi maksimal :max karakter",
            'min' => ":attribute harus diisi minimal :min karakter",
        ];
        $request->validate([
            // 'user_id' => 'required',
            'nim' => 'required',
            'univ' => 'required',
            'noTelp' => 'required|max:13|min:11',
            'email' => 'email',
            'alamat' => 'required',
        ],$messages);

        Mahasiswa::where('idMahasiswa',$mahasiswa->idMahasiswa)
        ->update([
            // 'user_id' => $request->user_id,
            'nim' => $request->nim,
            'univ' => $request->univ,
            'noTelp' => $request->noTelp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        return redirect('/mahasiswa')->with(['success' => 'Data Mahasiswa Berhasil Diubah!']);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->idMahasiswa);
        return redirect('/mahasiswa')->with(['success' => 'Data Mahaiswa Berhasil Dihapus!']);
    }
}


