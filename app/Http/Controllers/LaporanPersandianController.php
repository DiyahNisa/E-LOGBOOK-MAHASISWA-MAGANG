<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Persandian;
use DB;
use PDF;

class LaporanPersandianController extends Controller
{

    public function index()
    {

        $persandian = DB::table('users')
        ->join('mahasiswas','mahasiswas.user_id','=','users.id')
        ->where('mahasiswas.level','=','Admin Persandian')
        ->get();
        // dd($mhs);
        return view('admin.laporanPersandian',compact('persandian'));
    }

    public function cetak_pdf($id)
    {
    	$persandian = Persandian::where('user_id',$id)->get();
        $pdf = PDF::loadview('admin.persandian_pdf',['persandian'=>$persandian]);
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

        $persandian = Persandian::where('user_id',$id)->get();
        return View('admin.detail.laporanDetailPersandian',compact('persandian'));
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
