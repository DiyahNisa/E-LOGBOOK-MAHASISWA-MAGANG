<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->nama}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              {{-- <a class="dropdown-item"  href="{{url('/profile')}}"> Edit Profile</a> --}}
              {{-- <a class="dropdown-item"  href="{{ url('/')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a> --}}
              <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();return confirm('Apakah Anda Yakin Ingin Keluar?')">
                <i class="fa fa-sign-out pull-right"></i>Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
<!-- /top navigation -->
