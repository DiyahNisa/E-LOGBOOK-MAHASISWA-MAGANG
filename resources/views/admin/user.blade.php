@extends('layouts.master')
@section('content')

<!-- Akun Admin-->
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Data Akun</h2>
        <div style="width:100%; text-align:right; margin-bottom:10px;">
            <a href="#" class="on-default edit-row btn btn-success" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i>Tambah Akun</a>
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
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Username</th>
              {{-- <th>Password</th> --}}
              <th>Aksi</th>
            </tr>
            <tbody>
                @foreach($user as $data)
                <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $data->nama}}</td>
                    <td>{{ $data->level}}</td>
                    <td>{{ $data->username}}</td>
                    {{-- <td>{{ $data->password}}</td> --}}
                    <td>
                        <a href="{{url('/user/'.$data->id)}}" class="on-default edit-row btn btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $data->id }}"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-success-hapus-{{ $data->id}}"><i class="fa fa-trash"></i></button>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="modal-success">
    <div class="modal-dialog" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="user">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control @error('level') is-invalid @enderror" name="level" style="width: 100%;" required>
                                        @if (auth()->user()->level=="Super Admin")
                                            <option value selected="selected">-- Pilih Jabatan--</option>
                                            <option value="Super Admin">Sekretaris</option>
                                            <option value="Admin Informatika">Admin Aplikasi Informatika</option>
                                            <option value="Admin Informasi">Admin Informasi & Komunikasi Publik</option>
                                            <option value="Admin Persandian">Admin Persandian & Keamanan Informasi</option>
                                            <option value="Admin Statistika">Admin Statistika </option>
                                            <option value="Mahasiswa Informatika">Mahasiswa Bidang Aplikasi Informatika</option>
                                            <option value="Mahasiswa Informasi">Mahasiswa Bidang Informasi & Komunikasi Publik</option>
                                            <option value="Mahasiswa Persandian">Mahasiswa Bidang Persandian & Keamanan Informasi</option>
                                            <option value="Mahasiswa Statistika">Mahasiswa Bidang Statistik</option>
                                            <option value="Admin Informatika">Admin Aplikasi Informatika</option>
                                            <option value="Admin Informasi">Admin Informasi & Komunikasi Publik</option>
                                            <option value="Admin Persandian">Admin Persandian & Keamanan Informasi</option>
                                            <option value="Admin Statistika">Admin Statistika </option>
                                        @elseif (auth()->user()->level=="Admin Informatika")
                                            <option value="Mahasiswa Informatika">Mahasiswa Bidang Aplikasi Informatika</option>
                                        @elseif (auth()->user()->level=="Admin Informasi")
                                            <option value="Mahasiswa Informasi">Mahasiswa Bidang Informasi & Komunikasi Publik</option>
                                        @elseif (auth()->user()->level=="Admin Persandian")
                                            <option value="Mahasiswa Persandian">Mahasiswa Bidang Persandian & Keamanan Informasi</option>
                                        @else
                                            <option value="Mahasiswa Statistika">Mahasiswa Bidang Statistik</option>
                                        @endif

                                    </select>
                                    @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" placeholder="Masukkan Username" required>
                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Masukkan Password" required>
                                    @error('password')
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
<!-- /Modal Tambah User -->

 {{-- Modal Edit Data User --}}
 @foreach($user as $data)
 <div class="modal fade" id="modal-edit-{{ $data->id }}" tabindex="-1">
     <div class="modal-dialog" style="max-width: 30%;">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Data User</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>
             </div>
             <div class="modal-body">
                 <!-- form start -->
                 <form class="form-horizontal" action="{{url('/user/'.$data->id)}}" method="post">
                     @csrf
                     @method('patch')
                     <div class="box-body">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label for="nama" class="col-sm-2 control-label">Nama</label>
                                     <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama', $data->nama) }}" >
                                     @error('nama')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                     @enderror
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-12">
                                        <select class="form-control @error('level') is-invalid @enderror" name="level" style="width: 100%;" required>
                                                <option value selected="selected">-- Pilih Jabatan--</option>
                                                @if (auth()->user()->level=="Super Admin")
                                                    {{-- <option value="Super Admin" {{ $data->level == 'Super Admin' ? 'selected' : '' }} >Super Admin</option> --}}
                                                    <option value="Admin Informatika" {{ $data->level == 'Admin Informatika' ? 'selected' : '' }} >Admin Aplikasi Informatika</option>
                                                    <option value="Admin Informasi" {{ $data->level == 'Admin Informasi' ? 'selected' : '' }} >Admin Sistem Informasi & Komunikasi Publik</option>
                                                    <option value="Admin Persandian" {{ $data->level == 'Admin Persandian' ? 'selected' : '' }} >Admin Persandian & Keamanan Informasi</option>
                                                    <option value="Admin Statistika" {{ $data->level == 'Admin Statistika' ? 'selected' : '' }} >Admin Statistika </option>
                                                    <option value="Mahasiswa Informatika" {{ $data->level == 'Mahasiswa Informatika' ? 'selected' : '' }} >Mahasiswa Bidang Informatika</option>
                                                    <option value="Mahasiswa Informasi" {{ $data->level == 'Mahasiswa Informasi' ? 'selected' : '' }} >Mahasiswa Bidang Informasi</option>
                                                    <option value="Mahasiswa Persandian" {{ $data->level == 'Mahasiswa Persandian' ? 'selected' : '' }} >Mahasiswa Bidang Persandian</option>
                                                    <option value="Mahasiswa Statistika" {{ $data->level == 'Mahasiswa Statistika' ? 'selected' : '' }} >Mahasiswa Statistika</option>
                                                @else
                                                    <option value="Mahasiswa Informatika" {{ $data->level == 'Mahasiswa Informatika' ? 'selected' : '' }} >Mahasiswa Bidang Informatika</option>
                                                    <option value="Mahasiswa Informasi" {{ $data->level == 'Mahasiswa Informasi' ? 'selected' : '' }} >Mahasiswa Bidang Informasi</option>
                                                    <option value="Mahasiswa Persandian" {{ $data->level == 'Mahasiswa Persandian' ? 'selected' : '' }} >Mahasiswa Bidang Persandian</option>
                                                    <option value="Mahasiswa Statistika" {{ $data->level == 'Mahasiswa Statistika' ? 'selected' : '' }} >Mahasiswa Statistika</option>
                                                @endif
                                        </select>
                                        @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $data->username }}" required>
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{ $data->password}}" required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
 <!-- /.modal -->
 @endforeach

 {{-- modal hapus --}}
 @foreach($user as $data)
 <div class="modal fade" id="modal-success-hapus-{{ $data->id }}">
     <div class="modal-dialog" style="max-width: 30%">
         <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title">Apakah Data Akan Dihapus ?</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
             <div class="modal-body">
                 <form method="post" action="{{url('/user/'.$data->id)}}">
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
