<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\User;
use App\Informatika;
use Illuminate\Http\Request;
use DB;
use PDF;

class LaporanInformatikaController extends Controller
{
    public function index()
    {
        $informatika = DB::table('users')
        ->join('mahasiswas','mahasiswas.user_id','=','users.id')
        ->where('mahasiswas.level','=','Admin Informatika')
        ->get();
        return view('admin.laporanInformatika',compact('informatika'));
    }

    public function cetak_pdf($id)
    {
        $informatika = Informatika::where('user_id',$id)->get();
        $pdf = PDF::loadview('admin.informatika_pdf',['informatika'=>$informatika]);
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
        $infor = Informatika::where('user_id',$id)->get();
        return View('admin.detail.laporanDetailInformatika',compact('infor'));
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
