 <!-- sidebar menu -->

@if (auth()->user()->level=="Mahasiswa Informatika")
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ url('/informatika') }}"><i class="fa fa-edit"></i>Log Book</a></li>
            <li><a href="{{ url('/historyInformatika') }}"><i class="fa fa-list"></i> History</a></li>
        </ul>
        </div>
    </div>
    @elseif (auth()->user()->level=="Mahasiswa Informasi")
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ url('/informasi') }}"><i class="fa fa-edit"></i>Log Book</a></li>
            <li><a href="{{ url('/historyInformasi') }}"><i class="fa fa-list"></i> History</a></li>
        </ul>
        </div>
    </div>
    @elseif (auth()->user()->level=="Mahasiswa Persandian")
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ url('/persandian') }}"><i class="fa fa-edit"></i>Log Book</a></li>
            <li><a href="{{ url('/historyPersandian') }}"><i class="fa fa-list"></i> History</a></li>
        </ul>
        </div>
    </div>
    @else
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="{{ url('/logBook') }}"><i class="fa fa-edit"></i>Log Book</a></li>
            <li><a href="{{ url('/history') }}"><i class="fa fa-list"></i> History</a></li>
        </ul>
        </div>
    </div>
  <!-- /sidebar menu -->
@endif

