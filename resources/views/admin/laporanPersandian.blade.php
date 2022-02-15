@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book <small>Mahasiswa Magang</small></h2>
        {{-- <div style="width:100%; text-align:right; margin-bottom:10px;">
            <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Mahasiswa</a>
        </div> --}}
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
                    <th>Nama Lengkap</th>
                    {{-- <th>Jabatan</th> --}}
                    <th>Universitas</th>
                    <th>Aksi</th>
                </tr>
                <tbody>
                    @foreach($persandian as $data)
                    <tr>
                        <td>{{ $loop->iteration}} </td>
                        <td>{{ $data->nama}}</td>
                        <td>{{ $data->univ }}</td>
                        <td>
                            <a href="{{url('/laporanDetailPersandian/'.$data->id)}}" class="on-default edit-row btn btn-warning"><i class="fa fa-eye"></i></a>
                            <a href="{{url('/cetakPersandian/'.$data->id)}}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </thead>
        </table>
      </div>
    </div>
</div>
</div>
    </div>
</div>


@endsection
