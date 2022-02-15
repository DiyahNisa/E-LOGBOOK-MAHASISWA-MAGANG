<?php

namespace App\Http\Controllers;

use App\LaporanLogBook;
use Illuminate\Http\Request;
use App\LogBook;
use App\Mahasiswa;
use App\User;
use DB;
use PDF;
use Facade\FlareClient\View;

class LaporanLogBookController extends Controller
{

    public function index()
    {

        $data = DB::table('users')
        ->join('mahasiswas','mahasiswas.user_id','=','users.id')
        ->where('mahasiswas.level','=','Admin Statistika')
        ->get();
        // dd($mhs);
        return view('admin.laporanLogBook',compact('data'));
    }

    public function cetak_pdf($id)
    {
    	$logbook = LogBook::where('user_id',$id)->get();
        $pdf = PDF::loadview('admin.logbook_pdf',['logbook'=>$logbook]);
        return $pdf->stream();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

        $log = LogBook::where('user_id',$id)->get();
        return View('admin.detail.laporanDetail',compact('log'));
    }

    public function edit(LaporanLogBook $laporanLogBook)
    {

    }

    public function update(Request $request, LaporanLogBook $laporanLogBook)
    {
        //
    }

    public function destroy(LaporanLogBook $laporanLogBook)
    {
        //
    }
}
