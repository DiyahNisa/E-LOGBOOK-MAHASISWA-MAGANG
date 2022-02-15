<?php

namespace App\Http\Controllers\LogBook;

use App\Http\Controllers\Controller;
use App\Informatika;
use Illuminate\Http\Request;
use PDF;

class InformatikaController extends Controller
{
    public function index()
    {
        $informatika = Informatika::where('user_id',auth()->user()->id)->get();
        return view ('mahasiswa.informatika',compact('informatika'));
    }

    public function lihat_history(){
        $informatika = Informatika::where('user_id',auth()->user()->id)->get();
        return view ('mahasiswa.historyInformatika',compact('informatika'));
    }

    public function cetak($tglAwal, $tglAkhir)
    {
            $tanggalAwal = $tglAwal;
            $tanggalAkhir = $tglAkhir;
            $informatika = Informatika::whereBetween('tglInformatika',[$tglAwal, $tglAkhir])
            ->orderby('user_id')
            ->get();
            $pdf = PDF::loadview('mahasiswa.Cetak.cetakInformatika',compact('tanggalAwal','tanggalAkhir','informatika'));

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
            'tglInformatika' => 'required',
            'kegiatanInformatika' => 'required',
            'lokasiInformatika' => 'required',
            'buktiInformatika' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiInformatika->extension();

        $request->buktiInformatika->move(public_path('image'),$imgName);

        $informatika = new Informatika;
        $informatika->user_id = auth()->user()->id;
        // $informatika->mahasiswa_id = "4";
        $informatika->tglInformatika = $request->tglInformatika;
        $informatika->kegiatanInformatika = $request->kegiatanInformatika;
        $informatika->lokasiInformatika = $request->lokasiInformatika;
        $informatika->buktiInformatika = $imgName;
        $informatika->save();

        return back()->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function show(Informatika $informatika)
    {
        //
    }

    public function edit(Informatika $informatika)
    {
        //
    }

    public function update(Request $request, Informatika $informatika)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglInformatika' => 'required',
            'kegiatanInformatika' => 'required',
            'lokasiInformatika' => 'required',
            'buktiInformatika' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiInformatika->extension();

        $request->buktiInformatika->move(public_path('image'),$imgName);

        Informatika::where('idInformatika',$informatika->idInformatika)
        ->update([
            'tglInformatika' => $request->tglInformatika,
            'kegiatanInformatika' => $request->kegiatanInformatika,
            'lokasiInformatika' => $request->lokasiInformatika,
            'buktiInformatika' => $imgName,
        ]);
        return redirect('/informatika')->with(['success' => 'Data Log Book Berhasil Diubah!']);
    }

    public function destroy(Informatika $informatika)
    {
        Informatika::destroy($informatika->idInformatika);
        return redirect('/informatika')->with(['success' => 'Data Log Book Berhasil Dihapus!']);
    }
}
