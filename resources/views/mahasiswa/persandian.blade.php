@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book Harian <small>Mahasiswa Magang Bidang Persandian</small></h2>
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
            @foreach ($persandian as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglPersandian)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatanPersandian}}</td>
                <td>{{$data->lokasiPersandian}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiPersandian) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
                </td>
                <td>
                    <a href="{{url('/persandian/'.$data->idPersandian)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idPersandian }}"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idPersandian}}"><i class="fa fa-trash"></i></button>
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
                <form method="post" action="persandian" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglPersandian">Hari/Tanggal Kegiatan</label>
                                    <input type="date" name="tglPersandian" class="form-control @error('tglPersandian') is-invalid @enderror" value="{{ old('tglPersandian') }}"  required>
                                    @error('tglPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanPersandian">Aktivitas/Kegiatan</label>
                                    <input type="text" name="kegiatanPersandian" class="form-control @error('nil') is-invalid @enderror" value="{{ old('kegiatanPersandian') }}" placeholder="Masukkan Kegiatan" required>
                                    @error('kegiatanPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasiPersandian">Lokasi Kegiatan</label>
                                    <input type="text" class="form-control @error('lokasiPersandian') is-invalid @enderror" value="{{ old('lokasiPersandian') }}" name="lokasiPersandian" placeholder="Masukkan Lokasi Kegiatan" required>
                                    @error('lokasiPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiPersandian">Bukti</label>
                                    <input type="file" class="form-control @error('buktiPersandian') is-invalid @enderror" value="{{ old('buktiPersandian') }}" name="buktiPersandian" placeholder="Masukkan Bukti Persandian" required>
                                    @error('buktiPersandian')
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

<!-- Modal Edit Log Book -->
@foreach($persandian as $data)
<div class="modal fade" id="modal-edit-{{ $data->idPersandian }}" tabindex="-1">
    <div class="modal-dialog" style="max-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Log Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form class="form-horizontal" action="{{url('/persandian/'.$data->idPersandian)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tglPersandian" class="col-sm-2 control-label">Hari/Tanggal</label>
                                    <input type="date" name="tglPersandian" class="form-control @error('tglPersandian') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('tglPersandian', $data->tglPersandian) }}" >
                                    @error('tglPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanPersandian" class="control-label">Aktivitas/Kegiatan</label>
                                    <input type="text" name="kegiatanPersandian" class="form-control @error('kegiatanPersandian') is-invalid @enderror" placeholder="Masukkan kegiatanPersandian" value="{{ old('kegiatanPersandian', $data->kegiatanPersandian) }}" >
                                    @error('kegiatanPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lokasiPersandian" class="control-label">Lokasi Kegiatan</label>
                                    <input type="text" name="lokasiPersandian" class="form-control @error('lokasiPersandian') is-invalid @enderror" placeholder="Masukkan Lokasi Persandian" value="{{ old('lokasiPersandian', $data->lokasiPersandian) }}" >
                                    @error('lokasiPersandian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiPersandian" class="control-label">Bukti Persandian</label>
                                    <input type="file" class="form-control @error('buktiPersandian') is-invalid @enderror" name="buktiPersandian" value="{{ old('buktiPersandian', $data->buktiPersandian) }}" required>
                                    @error('buktiPersandian')
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
<!-- /Modal Edit Log Book -->


{{-- modal hapus --}}
@foreach($persandian as $data)
<div class="modal fade" id="modal-success-hapus-{{ $data->idPersandian }}">
    <div class="modal-dialog" style="max-width: 30%">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form method="post" action="{{url('/persandian/'.$data->idPersandian)}}">
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
{{-- modal hapus --}}

@endsection
