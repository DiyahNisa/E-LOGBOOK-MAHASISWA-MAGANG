<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\User;
use App\Informasi;
use DB;
use PDF;

use Illuminate\Http\Request;

class LaporanSistemInformasiController extends Controller
{

    public function index()
    {
        $informasi = DB::table('users')
        ->join('mahasiswas','mahasiswas.user_id','=','users.id')
        ->where('mahasiswas.level','=','Admin Informasi')
        ->get();
        // dd($mhs);
        return view('admin.laporanSistemInformasi',compact('informasi'));
    }

    public function cetak_pdf($id)
    {
    	$informasi = Informasi::where('user_id',$id)->get();
        $pdf = PDF::loadview('admin.informasi_pdf',['informasi'=>$informasi]);
        return $pdf->stream();

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $informasi = Informasi::where('user_id',$id)->get();
        return View('admin.detail.laporanDetailInformasi',compact('informasi'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
