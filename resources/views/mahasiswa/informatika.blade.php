@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book Harian <small>Mahasiswa Magang Bidang Informatika</small></h2>
        <div style="width:100%; text-align:right; margin-bottom:10px;">
            <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Log Book</a>
        </div>
        <div class="clearfix"></div>
        {{-- <div class="row" >
            <div class="col-md-4">
            <form action="{{url('/informatika')}}" id="form_range" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="reservation" name="dates">
                  </div>
            </form>
            </div>
        </div> --}}
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
            @foreach ($informatika as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglInformatika)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatanInformatika}}</td>
                <td>{{$data->lokasiInformatika}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiInformatika) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
                </td>
                <td>
                    <a href="{{url('/informatika/'.$data->idInformatika)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idInformatika }}"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idInformatika}}"><i class="fa fa-trash"></i></button>
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



 <!-- Modal Tambah Informatika -->
 <div class="modal fade" id="modal-success">
    <div class="modal-dialog" style="max-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Log Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="informatika" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglInformatika">Hari/Tanggal Informatika</label>
                                    <input type="date" name="tglInformatika" class="form-control @error('tglInformatika') is-invalid @enderror" value="{{ old('tglInformatika') }}"  required>
                                    @error('tglInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanInformatika">Kegiatan</label>
                                    <input type="text" name="kegiatanInformatika" class="form-control @error('kegiatanInformatika') is-invalid @enderror" value="{{ old('kegiatanInformatika') }}" placeholder="Masukkan kegiatanInformatika" required>
                                    @error('kegiatanInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasiInformatika">Lokasi Informatika</label>
                                    <input type="text" class="form-control @error('lokasiInformatika') is-invalid @enderror" value="{{ old('lokasiInformatika') }}" name="lokasiInformatika" placeholder="Masukkan Lokasi Informatika" required>
                                    @error('lokasiInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiInformatika">Bukti Informatika</label>
                                    <input type="file" class="form-control @error('buktiInformatika') is-invalid @enderror" value="{{ old('buktiInformatika') }}" name="buktiInformatika" placeholder="Masukkan Bukti Informatika" required>
                                    @error('buktiInformatika')
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
<!-- /Modal Tambah Informatika -->

{{-- Modal Edit Informatika --}}
@foreach($informatika as $data)
<div class="modal fade" id="modal-edit-{{ $data->idInformatika }}" tabindex="-1">
    <div class="modal-dialog" style="max-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Log Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form class="form-horizontal" action="{{url('/informatika/'.$data->idInformatika)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tglInformatika" class="col-sm-2 control-label">Hari/Tanggal</label>
                                    <input type="date" name="tglInformatika" class="form-control @error('tglInformatika') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('tglInformatika', $data->tglInformatika) }}" >
                                    @error('tglInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatanInformatika" class="control-label">Aktivitas/Kegiatan</label>
                                    <input type="text" name="kegiatanInformatika" class="form-control @error('kegiatanInformatika') is-invalid @enderror" placeholder="Masukkan kegiatanInformatika" value="{{ old('kegiatanInformatika', $data->kegiatanInformatika) }}" >
                                    @error('kegiatanInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lokasiInformatika" class="control-label">Lokasi Informatika</label>
                                    <input type="text" name="lokasiInformatika" class="form-control @error('lokasiInformatika') is-invalid @enderror" placeholder="Masukkan Lokasi Informatika" value="{{ old('lokasiInformatika', $data->lokasiInformatika) }}" >
                                    @error('lokasiInformatika')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiInformatika" class="control-label">Bukti Informatika</label>
                                    <input type="file" class="form-control @error('buktiInformatika') is-invalid @enderror" name="buktiInformatika" value="{{ old('buktiInformatika', $data->buktiInformatika) }}" required>
                                    @error('buktiInformatika')
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
{{-- /Modal Edit Informatika --}}

@foreach($informatika as $data)
<div class="modal fade" id="modal-success-hapus-{{ $data->idInformatika }}">
    <div class="modal-dialog" style="max-width: 30%">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form method="post" action="{{url('/informatika/'.$data->idInformatika)}}">
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

{{-- @yield('js')

<script>
    $('input[name="dates"]').daterangepicker();
    $('input[name="dates"]').on('apply.daterangepicker', function() {
    $('#form_range').submit();
    });
</script> --}}
