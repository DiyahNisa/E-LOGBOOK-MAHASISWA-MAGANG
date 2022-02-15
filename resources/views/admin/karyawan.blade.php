@extends('layouts.master')
@section('content')

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Karyawan</h2>
                <div style="width:100%; text-align:right; margin-bottom:10px;">
                    <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Karyawan</a>
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
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>No.Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($kry as $data)
                    <tr>
                        <td>{{ $loop->iteration}} </td>
                        <td>{{ $data->user->nama}}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->noTelp }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>
                            <a href="{{url('/karyawan/'.$data->idKaryawan)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idKaryawan }}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idKaryawan}}"><i class="fa fa-trash"></i></button>
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

        <!-- Modal Tambah Karyawan -->
        <div class="modal fade" id="modal-success">
            <div class="modal-dialog" style="max-width: 40%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Karyawan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="karyawan">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Karyawan</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" style="width: 100%;" required>
                                                <option value selected="selected">-- Pilih Nama --</option>
                                                @foreach ($user as $data)
                                                <option value="{{$data->id}}"->{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" name="nik" class="form-control @error('nil') is-invalid @enderror" value="{{ old('nik') }}" placeholder="Masukkan NIK" required>
                                            @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" style="width: 100%;" required>
                                                <option value selected="selected">-- Pilih Jabatan--</option>
                                                <option value="Super Admin">Sekretaris</option>
                                                <option value="Admin Aplikasi Informatika">Admin Aplikasi Informatika</option>
                                                <option value="Admin Informasi & Komunikasi Publik">Admin Informasi & Komunikasi Publik</option>
                                                <option value="Admin Persandian & Keamanan Informasi">Admin Persandian & Keamanan Informasi</option>
                                                <option value="Admin Statistika">Admin Statistika </option>
                                            </select>
                                            @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">No.Telp</label>
                                            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" value="{{ old('noTlp') }}" name="noTelp" placeholder="Masukkan No.Telp" required>
                                            @error('noTelp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" name="alamat" placeholder="Masukkan Alamat" required>
                                            @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
        <!-- /Modal Tambah Karyawan -->

        {{-- Modal Edit Data Karyawan --}}
        @foreach($kry as $data)
        <div class="modal fade" id="modal-edit-{{ $data->idKaryawan }}" tabindex="-1">
            <div class="modal-dialog" style="max-width: 30%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Karyawan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" action="{{url('/karyawan/'.$data->idKaryawan)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Nama Karyawan </label>
                                            <div class="col-sm-12">
                                                <select class="form-control @error('user_id') is-invalid @enderror"  id="user_id" name="user_id" disabled>
                                                    <option value selected="selected">-- Pilih Nama --</option>
                                                    @foreach ($user as $data1)
                                                    <option value="{{$data1->id}}"
                                                        @if ($data1->id == $data->user_id)
                                                            selected
                                                        @endif
                                                        >{{$data1->nama}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik" class="col-sm-2 control-label">NIK</label>
                                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK" value="{{ old('nik', $data->nik) }}" >
                                            @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukkan Jabatan" value="{{ old('jabatan', $data->jabatan) }}" >
                                            @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp" class="col-sm-2 control-label">No.Telp</label>
                                            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" placeholder="Masukkan No.Telp" value="{{ old('noTelp', $data->noTelp) }}" required>
                                            @error('noTelp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat', $data->alamat) }}" required>
                                            @error('alamat')
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
        </div>
        @endforeach

        {{-- modal hapus --}}
        @foreach($kry as $data)
        <div class="modal fade" id="modal-success-hapus-{{ $data->idKaryawan }}">
            <div class="modal-dialog" style="max-width: 30%">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form method="post" action="{{url('/karyawan/'.$data->idKaryawan)}}">
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
