<?php

namespace App\Http\Controllers\LogBook;

use App\Http\Controllers\Controller;
use App\Persandian;
use Illuminate\Http\Request;
use PDF;

class PersandianController extends Controller
{
    public function index()
    {
        $persandian = Persandian::where('user_id',auth()->user()->id)->get();
        return view('mahasiswa.persandian',compact('persandian'));
    }

   public function lihat_history()
   {
    $persandian = Persandian::where('user_id',auth()->user()->id)->get();
    return view('mahasiswa.historypersandian',compact('persandian'));
   }

   public function cetak($tglAwal, $tglAkhir)
    {;
            $tanggalAwal = $tglAwal;
            $tanggalAkhir = $tglAkhir;
            $persandian = Persandian::whereBetween('tglPersandian',[$tglAwal, $tglAkhir])
            ->orderby('user_id')
            ->get();
            $pdf = PDF::loadview('mahasiswa.Cetak.cetakPersandian',compact('tanggalAwal','tanggalAkhir','persandian'));

            $pdf->setPaper('a4','potrait');
            return $pdf->stream();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglPersandian' => 'required',
            'kegiatanPersandian' => 'required',
            'lokasiPersandian' => 'required',
            'buktiPersandian' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiPersandian->extension();

        $request->buktiPersandian->move(public_path('image'),$imgName);

        $persandian = new Persandian;
        $persandian->user_id = auth()->user()->id;
        $persandian->tglPersandian = $request->tglPersandian;
        $persandian->kegiatanPersandian = $request->kegiatanPersandian;
        $persandian->lokasiPersandian = $request->lokasiPersandian;
        $persandian->buktiPersandian = $imgName;
        $persandian->save();

        return back()->with(['success'=>'Data berhasil ditambahkan!']);
    }

    public function show(Persandian $persandian)
    {
        //
    }

    public function edit(Persandian $persandian)
    {
        //
    }

    public function update(Request $request, Persandian $persandian)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglPersandian' => 'required',
            'kegiatanPersandian' => 'required',
            'lokasiPersandian' => 'required',
            'buktiPersandian' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiPersandian->extension();

        $request->buktiPersandian->move(public_path('image'),$imgName);

        Persandian::where('idPersandian',$persandian->idPersandian)
        ->update([
            'tglPersandian' => $request->tglPersandian,
            'kegiatanPersandian' => $request->kegiatanPersandian,
            'lokasiPersandian' => $request->lokasiPersandian,
            'buktiPersandian' => $imgName,
        ]);
        return redirect('/persandian')->with(['success'=>'Data berhasil diedit!']);
    }

    public function destroy(Persandian $persandian)
    {
        Persandian::destroy($persandian->idPersandian);
        return redirect('/persandian')->with(['success' => 'Data Log Book Berhasil Dihapus!']);
    }
}
