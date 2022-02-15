 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <ul class="nav side-menu">
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
        @if (auth()->user()->level=="Super Admin")
            <li><a><i class="fa fa-file"></i> Data<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                <li><a href="{{ url('/user') }}">Data User</a></li>
                <li><a href="{{ url('/karyawan') }}">Data Karyawan</a></li>
                <li><a href="{{ url('/mahasiswa') }}">Data Mahasiswa</a></li>
                </ul>
            </li>
            @else
            <li><a><i class="fa fa-file"></i> Data<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                <li><a href="{{ url('/user') }}">Data User</a></li>
                <li><a href="{{ url('/mahasiswa') }}">Data Mahasiswa</a></li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->level=="Super Admin")
            <li><a><i class="fa fa-file"></i> Laporan Log Book<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                <li><a href="{{ url('/laporanInformatika') }}">Bidang Aplikasi Informatika</a></li>
                <li><a href="{{ url('/laporanSistemInformasi') }}">Bidang Informasi & Komunikasi Publik</a></li>
                <li><a href="{{ url('/laporanPersandian') }}">Bidang Persandian & Keamanan Informasi</a></li>
                <li><a href="{{ url('/laporanLogBook') }}">Bidang Statistik</a></li>
                </ul>
            </li>
            @elseif (auth()->user()->level=="Admin Informatika")
            <li><a><i class="fa fa-file"></i> Laporan Log Book<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                  <li><a href="{{ url('/laporanInformatika') }}">Bidang Aplikasi Informatika</a></li>
                </ul>
            </li>
            @elseif (auth()->user()->level=="Admin Informasi")
            <li><a><i class="fa fa-file"></i> Laporan Log Book<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                  <li><a href="{{ url('/laporanSistemInformasi') }}">Bidang Informasi & Komunikasi Publik</a></li>
                </ul>
            </li>
            @elseif (auth()->user()->level=="Admin Persandian")
            <li><a><i class="fa fa-file"></i> Laporan Log Book<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                  <li><a href="{{ url('/laporanPersandian') }}">Bidang Persandian & Keamanan Informasi</a></li>
                </ul>
            </li>
            @else
            <li><a><i class="fa fa-file"></i> Laporan Log Book<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">  \
                  <li><a href="{{ url('/laporanLogBook') }}">Bidang Statistik</a></li>
                </ul>
            </li>
        @endif
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

