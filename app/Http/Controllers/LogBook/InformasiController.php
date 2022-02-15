<?php

namespace App\Http\Controllers\LogBook;

use App\Http\Controllers\Controller;
use App\Informasi;
use Illuminate\Http\Request;
use PDF;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::where('user_id',auth()->user()->id)->get();
        return view('mahasiswa.informasi',compact('informasi'));
    }

    public function lihat_history(){
        $informasi = Informasi::where('user_id',auth()->user()->id)->get();
        return view('mahasiswa.historyInformasi',compact('informasi'));
    }

    public function cetak($tglAwal, $tglAkhir)
    {
            // $logbook = DB::table('log_books')->count();
            $tanggalAwal = $tglAwal;
            $tanggalAkhir = $tglAkhir;
            $informasi = Informasi::whereBetween('tglInformasi',[$tglAwal, $tglAkhir])
            ->orderby('user_id')
            ->get();
            $pdf = PDF::loadview('mahasiswa.Cetak.cetakInformasi',compact('tanggalAwal','tanggalAkhir','informasi'));

            $pdf->setPaper('a4','potrait');
            return $pdf->stream();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglInformasi' => 'required',
            'kegiatanInformasi' => 'required',
            'lokasiInformasi' => 'required',
            'buktiInformasi' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiInformasi->extension();

        $request->buktiInformasi->move(public_path('image'),$imgName);

       $informasi = new Informasi;
       $informasi->user_id = auth()->user()->id;
       $informasi->tglInformasi = $request->tglInformasi;
       $informasi->kegiatanInformasi = $request->kegiatanInformasi;
       $informasi->lokasiInformasi = $request->lokasiInformasi;
       $informasi->buktiInformasi = $imgName;
       $informasi->save();

        // return dd($informasi);
        return back()->with(['success'=>'Data berhasil ditambahkan!']);
    }

    public function show(Informasi $informasi)
    {
        //
    }

    public function edit(Informasi $informasi)
    {
        //
    }

    public function update(Request $request, Informasi $informasi)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglInformasi' => 'required',
            'kegiatanInformasi' => 'required',
            'lokasiInformasi' => 'required',
            'buktiInformasi' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiInformasi->extension();

        $request->buktiInformasi->move(public_path('image'),$imgName);

        Informasi::where('idInformasi',$informasi->idInformasi)
        ->update([
            'tglInformasi' => $request->tglInformasi,
            'kegiatanInformasi' => $request->kegiatanInformasi,
            'lokasiInformasi' => $request->lokasiInformasi,
            'buktiInformasi' => $imgName,
        ]);

        return redirect('/informasi')->with(['success'=>'Data berhasil diedit!']);

    }

    public function destroy(Informasi $informasi)
    {
        Informasi::destroy($informasi->idInformasi);
        return redirect('/informasi')->with(['success' => 'Data Log Book Berhasil Dihapus!']);
    }
}
