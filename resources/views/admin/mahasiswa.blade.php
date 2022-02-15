@extends('layouts.master')
@section('content')

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Mahasiswa</h2>
                <div style="width:100%; text-align:right; margin-bottom:10px;">
                    <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Mahasiswa</a>
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
                            <th>NIM</th>
                            <th>Universitas</th>
                            <th>Email</th>
                            <th>No.Telp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                            @foreach($mhs as $data)
                            <tr>
                                <td>{{ $loop->iteration}} </td>
                                <td>{{ $data->user->nama}}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->univ }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->noTelp }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>
                                    <a href="{{url('/mahasiswa/'.$data->idMahasiswa)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->idMahasiswa }}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->idMahasiswa}}"><i class="fa fa-trash"></i></button>
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

        <!-- Modal Tambah Mahasiswa -->
        <div class="modal fade" id="modal-success">
            <div class="modal-dialog" style="max-width: 60%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="mahasiswa">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
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
                                            <label for="nim">NIM</label>
                                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" placeholder="Masukkan NIM" required>
                                            @error('nim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="univ">Universitas</label>
                                            <input type="univ" class="form-control @error('univ') is-invalid @enderror" value="{{ old('univ') }}" name="univ" placeholder="Masukkan Universitas" required>
                                            @error('univ')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Masukkan Email" required>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">No.Telp</label>
                                            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" value="{{ old('noTelp') }}" name="noTelp" placeholder="Masukkan Nomor Telpon" required>
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
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" >Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal Tambah Mahasiswa -->

        <!-- Modal Edit Mahasiswa -->
        @foreach($mhs as $data)
        <div class="modal fade" id="modal-edit-{{ $data->idMahasiswa }}" tabindex="-1">
            <div class="modal-dialog" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" action="{{url('/mahasiswa/'.$data->idMahasiswa)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-smcontrol-label">Nama Mahasiswa </label>
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
                                            <label for="nim" class="col-sm-2 control-label">NIM</label>
                                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="Masukkan nim" value="{{ old('nim', $data->nim) }}" >
                                            @error('nim')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="univ" class="col-sm-2 control-label">Universitas</label>
                                            <input type="text" name="univ" class="form-control @error('univ') is-invalid @enderror" placeholder="Masukkan univ" value="{{ old('univ', $data->univ) }}" >
                                            @error('univ')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="noTelp" class="col-sm-2 control-label">No.Telp</label>
                                            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" placeholder="Masukkan Nomor Hp" value="{{ old('noTelp', $data->noTelp) }}" required>
                                            @error('noTelp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ old('email', $data->email) }}" required>
                                            @error('email')
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
        <!-- /Modal Edit Mahasiswa -->

        <!-- modal hapus -->
        @foreach($mhs as $data)
        <div class="modal fade" id="modal-success-hapus-{{ $data->idMahasiswa }}">
        <div class="modal-dialog" style="max-width: 30%">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form method="post" action="{{url('/mahasiswa/'.$data->idMahasiswa)}}">
                    @method('delete')
                    @csrf
                        <button class="btn btn-danger" type="submit">Hapus</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <!-- /modal hapus -->

@endsection
