<?php

namespace App\Http\Controllers\LogBook;

use App\LogBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class LogBookController extends Controller
{
    public function index()
    {

        $log = LogBook::where('user_id',auth()->user()->id)->get();
        // return dd($log);
        return view('mahasiswa.logBook',compact('log'));

    }

    public function lihat_history()
    {
        $log = LogBook::where('user_id',auth()->user()->id)->get();
        return view('mahasiswa.history',compact('log'));
    }

    public function cetak($tglAwal, $tglAkhir)
    {
            // $logbook = DB::table('log_books')->count();
            $tanggalAwal = $tglAwal;
            $tanggalAkhir = $tglAkhir;
            $logbook = LogBook::whereBetween('tglKegiatan',[$tglAwal, $tglAkhir])
            ->orderby('user_id')
            ->get();
            $pdf = PDF::loadview('mahasiswa.Cetak.cetakLogBook',compact('tanggalAwal','tanggalAkhir','logbook'));

            $pdf->setPaper('a4','potrait');
            return $pdf->stream();
    }

    public function show(LogBook $logBook)
    {
        
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
            'tglKegiatan' => 'required',
            'kegiatan' => 'required',
            'lokasiKegiatan' => 'required',
            'buktiKegiatan' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiKegiatan->extension();

        $request->buktiKegiatan->move(public_path('image'),$imgName);

            $logbook = new LogBook;
            $logbook->user_id = auth()->user()->id;
            // $logbook->mahasiswa_id = "4";
            $logbook->tglKegiatan = $request->tglKegiatan;
            $logbook->kegiatan = $request->kegiatan;
            $logbook->lokasiKegiatan = $request->lokasiKegiatan;
            $logbook->buktiKegiatan = $imgName;
            $logbook->save();

        return back()->with(['success' => 'Data Log Book Harian Berhasil Ditambahkan!']);

    }

    public function update(Request $request, LogBook $logBook)
    {
        $messages = [
            'required' => ":attribute harus diisi",
            'unique' => ":attribute sudah digunakan",
        ];
        $request->validate([
            'tglKegiatan' => 'required',
            'kegiatan' => 'required',
            'lokasiKegiatan' => 'required',
            'buktiKegiatan' => 'required|mimes:png,jpg,jpeg,pdf,xlsx,ppt',
        ],$messages);

        $imgName = time(). '.' . $request->buktiKegiatan->extension();

        $request->buktiKegiatan->move(public_path('image'),$imgName);

        LogBook::where('idLogBook', $logBook->idLogBook)
            ->update([
                'tglKegiatan' => $request->tglKegiatan,
                'kegiatan' => $request->kegiatan,
                'lokasiKegiatan' => $request->lokasiKegiatan,
                'buktiKegiatan' => $imgName,
            ]);
            // return dd($logBook);
        return redirect('/logBook')->with(['success' => 'Data Log Book Berhasil Diubah!']);
    }

    public function destroy(LogBook $logBook)
    {
        LogBook::destroy($logBook->idLogBook);
        return redirect('/logBook')->with(['success' => 'Data Log Book Berhasil Dihapus!']);
    }
}
