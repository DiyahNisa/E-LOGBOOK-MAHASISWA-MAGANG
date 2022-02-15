@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>History Log Book Harian</h2>
        <div class="clearfix"></div>
      </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-group" >
                                    <div class="row">
                                        <div class="col-5">
                                            <br>
                                            <label for="tgl">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tglAwal" id="tglAwal" required>
                                        </div>
                                        <div class="col-2">
                                            <br>
                                            <br>
                                            <p><center>s.d</center> </p>
                                        </div>
                                        <div class="col-5" >
                                            <br>
                                            <label for="tgl">Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tglAkhir" id="tglAkhir" required>
                                        </div>
                                    </div>
                                    <br>
                                    <center><a href="" onclick="this.href='/history/'+ document.getElementById('tglAwal')
                                    .value+'/' + document.getElementById('tglAkhir').value " target="_blank" class="btn btn-primary btn-sm">
                                    Cetak <i class="fas fa-print"></i></a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
            <th>No</th>
            <th>Hari/ Tanggal </th>
            <th>Aktivitas/ Kegiatan</th>
            <th>Lokasi Kegiatan</th>
            <th>Bukti Kegiatan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($log as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglKegiatan)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatan}}</td>
                <td>{{$data->lokasiKegiatan}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiKegiatan) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
</div>
</div>
    </div>
</div>



@endsection
