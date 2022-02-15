@extends('layouts.master')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book Harian</h2>
        <div class="clearfix"></div>
      </div>
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
            @foreach ($infor as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglKegiatan)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatanInformatika}}</td>
                <td>{{$data->lokasiInformatika}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiInformatika) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
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
