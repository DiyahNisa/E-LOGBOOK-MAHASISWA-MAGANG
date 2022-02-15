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

    <title>Cetak Presensi</title>
</head>
<body>
    <div class="form-group">

        <table class="cop">
            <font face ="Times New Roman" color="black">
                <td align="center"><b><font face="Times New Roman" color="black" size="3">REKAPAN CATATAN HARIAN (LOG BOOK)</font> <br>
            <font size="3" >MAGANG KERJA<br></font>
            <font size="3" >DISKOMINFO KAB. MADIUN<br></font></b></td>
        </table>
        <hr>
        <table class="cop" style="width: 100%;">
            <tr>
                <p align="center">MAHASISWA BIDANG PERSANDIAN & KEAMANAN INFORMASI </p>
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
                @foreach ($persandian as $data )
                <tr align="center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ Carbon\carbon::parse($data->tglPersandian)->translatedFormat("l, d F Y") }}</td>
                    <td>{{$data->kegiatanPersandian}}</td>
                    <td>{{$data->lokasiPersandian}}</td>
                    <td></td>
                </tr>
                @endforeach
        </table>
    </div>
    <section>
        @php
            setLocale(LC_ALL, 'IND');
        @endphp
        <p align="right">Madiun, {{Carbon\Carbon::now()->translatedFormat("d F Y")}}</p>
        <br><br>
        @if (Auth::check())
            <p align="right">{{auth()->user()->nama}}</p>
        @else
            <p align="right">(..................................)</p>
        @endif
    </section>
</body>
</html>
