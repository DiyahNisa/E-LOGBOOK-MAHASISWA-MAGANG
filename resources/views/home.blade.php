@extends('layouts.master')

@section('content')

@if (auth()->user()->level=="Super Admin")
  <div class="">
  <div class="row" style="display: inline-block;">
    <div class="top_tiles">
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <h3>Data Karyawan</h3>
          <p>Total</p>
          <div class="count">{{$karyawan}}</div>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-users"></i></div>
          <h3>Data Mahasiswa</h3>
          <p>Total</p>
          <div class="count">{{$mahasiswa}}</div>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-folder-open"></i></div>
          <h3>Total</h3>
          <p>Laporan Bidang Informatika</p>
          <div class="count">{{$informatika}}</div>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list-ul"></i></div>
          <h3>Total</h3>
          <p>Laporan Bidang Informasi</p>
          <div class="count">{{$informasi}}</div>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list-ul"></i></div>
          <h3>Total</h3>
          <p>Laporan Bidang Persandian</p>
          <div class="count">{{$persandian}}</div>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list-ul"></i></div>
          <h3>Total</h3>
          <p>Laporan Bidang Statistik</p>
          <div class="count">{{$log}}</div>
        </div>
      </div>
    </div>
  </div>
  </div>
@elseif (auth()->user()->level=="Admin Informatika")
<h1><CENTER> Halaman Utama Bidang Aplikasi Informatika</CENTER> </h1>
<br>
<br>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <h3>Data Mahasiswa</h3>
        <p>Total</p>
        <div class="count">{{$mahasiswa}}</div>
        </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-folder-open"></i></div>
        <h3>Total</h3>
        <p>Laporan Bidang Informatika</p>
        <div class="count">{{$informatika}}</div>
        </div>
    </div>
@elseif (auth()->user()->level=="Admin Informasi")
<h1><CENTER> Halaman Utama Bidang Informasi dan Komunikasi Publik</CENTER> </h1>
<br>
<br>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <h3>Data Mahasiswa</h3>
        <p>Total</p>
        <div class="count">{{$mahasiswa}}</div>
        </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-list-ul"></i></div>
        <h3>Total</h3>
        <p>Laporan Bidang Informasi</p>
        <div class="count">{{$informasi}}</div>
        </div>
    </div>
@elseif (auth()->user()->level=="Admin Persandian")
<h1><CENTER> Halaman Utama Bidang Persandian dan Keamanan Informasi</CENTER> </h1>
<br>
<br>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <h3>Data Mahasiswa</h3>
        <p>Total</p>
        <div class="count">{{$mahasiswa}}</div>
        </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-list-ul"></i></div>
        <h3>Total</h3>
        <p>Laporan Bidang Persandian</p>
        <div class="count">{{$persandian}}</div>
        </div>
    </div>
@elseif (auth()->user()->level=="Admin Statistika")
<h1><CENTER> Halaman Utama Bidang Statistik</CENTER> </h1>
<br>
<br>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i></div>
        <h3>Data Mahasiswa</h3>
        <p>Total</p>
        <div class="count">{{$mahasiswa}}</div>
        </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 ">
        <div class="tile-stats">
        <div class="icon"><i class="fa fa-list-ul"></i></div>
        <h3>Total</h3>
        <p>Laporan Bidang Statistik</p>
        <div class="count">{{$log}}</div>
        </div>
    </div>
@else
<h1><CENTER> APLIKASI E-LOG BOOK HARIAN MAHASISWA MAGANG</CENTER> </h1>

@endif

@endsection
