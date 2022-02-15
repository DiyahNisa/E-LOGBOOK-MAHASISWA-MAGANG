<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataKaryawanController extends Controller
{
    public function index()
    {
        $kry = Karyawan::orderBy('idKaryawan','desc')->get();
        $user = User::orderBy('id','desc')->get();
        // return dd($kry);
        return view('admin.karyawan',compact('kry','user'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
            'max' => " :attribute harus diisi maksimal :max karakter",
            'min' => " :attribute harus diisi minimal :min karakter"
        ];
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            'jabatan' => 'required',
            'noTelp' => 'required|max:13|min:11',
            'alamat' => 'required',
        ],$messages);

            $karyawan = new Karyawan;
            $karyawan->user_id = $request->user_id;
            $karyawan->nik = $request->nik;
            $karyawan->jabatan = $request->jabatan;
            $karyawan->noTelp = $request->noTelp;
            $karyawan->alamat = $request->alamat;
            $karyawan->save();

        return back()->with(['success' => 'Data Karyawan Berhasil Ditambahkan!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
            'max' => " :attribute harus diisi maksimal :max karakter",
            'min' => " :attribute harus diisi minimal :min karakter"
        ];
        $request->validate([
            // 'user_id' => 'required',
            'nik' => 'required',
            'jabatan' => 'required',
            'noTelp' => 'required|max:13|min:11',
            'alamat' => 'required',
        ],$messages);

        Karyawan::where('idKaryawan', $karyawan->idKaryawan)
            ->update([
                // 'user_id' => $request->user_id,
                'nik' => $request->nik,
                'jabatan' => $request->jabatan,
                'noTelp' => $request->noTelp,
                'alamat' => $request->alamat,
            ]);
            // return dd($karyawan);
        return redirect('/karyawan')->with(['success' => 'Data Karyawan Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        // dd($karyawan);

        Karyawan::destroy($karyawan->idKaryawan);
        return redirect('/karyawan')->with(['success' => 'Data Karyawan Berhasil Dihapus!']);
    }
}
