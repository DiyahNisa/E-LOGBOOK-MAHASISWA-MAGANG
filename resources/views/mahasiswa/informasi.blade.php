@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book Harian <small>Mahasiswa Magang Bidang Sistem Informasi</small></h2>
        <div style="width:100%; text-align:right; margin-bottom:10px;">
            <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Log Book</a>
        </div>
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
            <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($informasi as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglInformasi)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatanInformasi}}</td>
                <td>{{$data->lokasiInformasi}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiInformasi) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
                </td>
                <td>
                    <a href="{{url('/informasi/'.$data->idInformasi)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idInformasi }}"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idInformasi}}"><i class="fa fa-trash"></i></button>
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

 <!-- Modal Tambah Log Book -->
 <div class="modal fade" id="modal-success">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Log Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="informasi" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglInformasi">Hari/Tanggal </label>
                                    <input type="date" name="tglInformasi" class="form-control @error('tglInformasi') is-invalid @enderror" value="{{ old('tglInformasi') }}"  required>
                                    @error('tglInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanInformasi">Kegiatan</label>
                                    <input type="text" name="kegiatanInformasi" class="form-control @error('kegiatanInformasi') is-invalid @enderror" value="{{ old('kegiatanInformasi') }}" placeholder="Masukkan kegiatanInformasi" required>
                                    @error('kegiatanInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasiInformasi">Lokasi Informasi</label>
                                    <input type="text" class="form-control @error('lokasiInformasi') is-invalid @enderror" value="{{ old('lokasiInformasi') }}" name="lokasiInformasi" placeholder="Masukkan Lokasi Informasi" required>
                                    @error('lokasiInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiInformasi">Bukti Informasi</label>
                                    <input type="file" class="form-control @error('buktiInformasi') is-invalid @enderror" value="{{ old('buktiInformasi') }}" name="buktiInformasi" placeholder="Masukkan Bukti Informasi" required>
                                    @error('buktiInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Tambah Log Book -->

{{-- Modal Edit Log Book --}}
@foreach($informasi as $data)
<div class="modal fade" id="modal-edit-{{ $data->idInformasi }}" tabindex="-1">
    <div class="modal-dialog" style="max-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Log Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form class="form-horizontal" action="{{url('/informasi/'.$data->idInformasi)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tglInformasi" class="col-sm-2 control-label">Hari/Tanggal</label>
                                    <input type="date" name="tglInformasi" class="form-control @error('tglInformasi') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('tglInformasi', $data->tglInformasi) }}" >
                                    @error('tglInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanInformasi" class="control-label">Aktivitas/Kegiatan</label>
                                    <input type="text" name="kegiatanInformasi" class="form-control @error('kegiatanInformasi') is-invalid @enderror" placeholder="Masukkan kegiatanInformasi" value="{{ old('kegiatanInformasi', $data->kegiatanInformasi) }}" >
                                    @error('kegiatanInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lokasiInformasi" class="control-label">Lokasi Kegiatan</label>
                                    <input type="text" name="lokasiInformasi" class="form-control @error('lokasiInformasi') is-invalid @enderror" placeholder="Masukkan Lokasi Informasi" value="{{ old('lokasiInformasi', $data->lokasiInformasi) }}" >
                                    @error('lokasiInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiInformasi" class="control-label">Bukti Informasi</label>
                                    <input type="file" class="form-control @error('buktiInformasi') is-invalid @enderror" name="buktiInformasi" value="{{ old('buktiInformasi', $data->buktiInformasi) }}" required>
                                    @error('buktiInformasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>>
@endforeach
{{-- /Modal Edit Log Book --}}

@foreach($informasi as $data)
<div class="modal fade" id="modal-success-hapus-{{ $data->idInformasi }}">
    <div class="modal-dialog" style="max-width: 30%">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form method="post" action="{{url('/informasi/'.$data->idInformasi)}}">
                @method('delete')
                @csrf
                    <button class="btn btn-danger" type="submit">Hapus</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection
