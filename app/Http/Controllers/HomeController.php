<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $karyawan = DB::table('karyawans')->count();
        $mahasiswa = DB::table('mahasiswas')->count();
        $user = DB::table('users')->count();
        $informatika = DB::table('informatikas')->count();
        $informasi = DB::table('informasis')->count();
        $persandian = DB::table('persandians')->count();
        $log = Db::table('log_books')->count();

        return view('home')->with(compact('karyawan','mahasiswa','user','informatika','persandian','informasi','log'));
    }
}
