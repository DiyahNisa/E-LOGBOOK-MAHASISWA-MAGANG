@extends('layouts.master')
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Log Book Harian</h2>
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
            @foreach ($log as $data )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ Carbon\carbon::parse($data->tglKegiatan)->translatedFormat("l, d F Y") }}</td>
                <td>{{$data->kegiatan}}</td>
                <td>{{$data->lokasiKegiatan}}</td>
                <td>
                    <a href="{{ asset('image/'. $data->buktiKegiatan) }}" target="_blank" rel="noopener noreferrer">Lihat Bukti</a>
                </td>
                <td>
                    <a href="{{url('/logBook/'.$data->idLogBook)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idLogBook }}"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idLogBook}}"><i class="fa fa-trash"></i></button>
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
                <form method="post" action="logBook" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tglKegiatan">Hari/Tanggal Kegiatan</label>
                                    <input type="date" name="tglKegiatan" class="form-control @error('tglKegiatan') is-invalid @enderror" value="{{ old('tglKegiatan') }}"  required>
                                    @error('tglKegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input type="text" name="kegiatan" class="form-control @error('nil') is-invalid @enderror" value="{{ old('kegiatan') }}" placeholder="Masukkan kegiatan" required>
                                    @error('kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasiKegiatan">Lokasi Kegiatan</label>
                                    <input type="text" class="form-control @error('lokasiKegiatan') is-invalid @enderror" value="{{ old('lokasiKegiatan') }}" name="lokasiKegiatan" placeholder="Masukkan Lokasi Kegiatan" required>
                                    @error('lokasiKegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="buktiKegiatan">Bukti Kegiatan</label>
                                    <input type="file" class="form-control @error('buktiKegiatan') is-invalid @enderror" value="{{ old('buktiKegiatan') }}" name="buktiKegiatan" placeholder="Masukkan Bukti Kegiatan" required>
                                    @error('buktiKegiatan')
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
 @foreach($log as $data)
 <div class="modal fade" id="modal-edit-{{ $data->idLogBook }}" tabindex="-1">
     <div class="modal-dialog" style="max-width: 40%;">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Data Log Book</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
             </div>
             <div class="modal-body">
                 <!-- form start -->
                 <form class="form-horizontal" action="{{url('/logBook/'.$data->idLogBook)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('patch')
                     <div class="box-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label for="tglKegiatan" class="col-sm-2 control-label">Hari/Tanggal</label>
                                     <input type="date" name="tglKegiatan" class="form-control @error('tglKegiatan') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('tglKegiatan', $data->tglKegiatan) }}" >
                                     @error('tglKegiatan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="form-group">
                                     <label for="kegiatan" class="control-label">Aktivitas/Kegiatan</label>
                                     <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" placeholder="Masukkan Kegiatan" value="{{ old('kegiatan', $data->kegiatan) }}" >
                                     @error('kegiatan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="form-group">
                                     <label for="lokasiKegiatan" class="control-label">Lokasi Kegiatan</label>
                                     <input type="text" name="lokasiKegiatan" class="form-control @error('lokasiKegiatan') is-invalid @enderror" placeholder="Masukkan Lokasi Kegiatan" value="{{ old('lokasiKegiatan', $data->lokasiKegiatan) }}" >
                                     @error('lokasiKegiatan')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="form-group">
                                     <label for="buktiKegiatan" class="control-label">Bukti Kegiatan</label>
                                     <input type="file" class="form-control @error('buktiKegiatan') is-invalid @enderror" name="buktiKegiatan" value="{{ old('buktiKegiatan', $data->buktiKegiatan) }}" required>
                                     @error('buktiKegiatan')
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

{{-- modal hapus --}}
@foreach($log as $data)
<div class="modal fade" id="modal-success-hapus-{{ $data->idLogBook }}">
    <div class="modal-dialog" style="max-width: 30%">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form method="post" action="{{url('/logBook/'.$data->idLogBook)}}">
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
