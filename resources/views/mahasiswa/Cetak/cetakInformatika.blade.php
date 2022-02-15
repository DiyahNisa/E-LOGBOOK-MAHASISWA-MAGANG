<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }
        table.cop {
            position: center;
            width: 100%;
        }

        hr {
            size : 5px;
            color : black;
            width : 100%;
        }
    </style>

<title>CETAK LOG BOOK </title>
</head>
<body>
    <div class="form-group">

        <table class="cop">
            <font face ="Times New Roman" color="black">
                <td align="center"><b><font face="Times New Roman" color="black" size="3">CATATAN HARIAN (LOG BOOK)</font> <br>
            <font size="3" >MAGANG KERJA<br></font>
            <font size="3" >DISKOMINFO KAB. MADIUN<br></font></b></td>
        </table>
        <hr>
    <table class="cop" style="width: 65%;">
        {{-- <td align="center"><b>LAPORAN PRESENSI</b>
        <br> Periode Tanggal {{ Carbon\carbon::parse($tanggalAwal)->translatedFormat("d F Y")}} s/d {{Carbon\carbon::parse($tanggalAkhir)->translatedFormat("d F Y")}}</td> --}}
        <tr align="left">
            <th>NAMA MAHASISWA</th>
            <th>: {{auth()->user()->nama}}</th>
        </tr>
        <tr align="left">
            <th>Lokasi MAGANG KERJA</th>
            <th>: Diskominfo Kab.Madiun</th>
        </tr>
        <tr align="left">
            <th>BIDANG</th>
            <th>: Informatika</th>
        </tr>

    </table>
    <br>

        <table class="static" align="center" rules="all" border="1px" style="width: 100%;">
                <tr>
                    <th>No</th>
                    <th>Hari/Tanggal</th>
                    <th>Aktivitas/Kegiatan</th>
                    <th>Lokasi Kegiatan</th>
                    <th>Tanda Tangan <hr> DPL</th>
                </tr>
                @foreach ($informatika as $data )
                <tr align="center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ Carbon\carbon::parse($data->tglInformatika)->translatedFormat("l, d F Y") }}</td>
                    <td>{{$data->kegiatanInformatika}}</td>
                    <td>{{$data->lokasiInformatika}}</td>
                    <td></td>
                </tr>
                @endforeach
        </table>
    </div>
</body>
</html>
