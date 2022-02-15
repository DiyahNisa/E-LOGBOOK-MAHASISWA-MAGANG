<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link rel="icon" type="image/png" href="vendor/img/madiun.png" />

    <link href="{{ asset('vendor/css/aos.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet') }}" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('vendor/css/sb-admin.css') }}" rel="stylesheet">

  </head>

   <!-- KETIKA ADA SESSION ERROR -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <body style="background: -ms-linear-gradient(to bottom, #4b6cb7, #182848);
              background: -moz-linear-gradient(to bottom, #4b6cb7, #182848);
              background: -o-linear-gradient(to bottom, #4b6cb7, #182848);
              background: linear-gradient(to bottom, #4b6cb7, #182848);">

        <div class="container" style="margin-top: 40px;">
            <h1 style="text-align: center; color: white;" data-aos="fade-down" data-aos-duration="2000"> PENDATAAN E-LOGBOOK MAHASISWA MAGANG</h1>
            <div class="card card-login mx-auto mt-5" style="box-shadow: 2px 10px 30px rgba(0,0,0,0.8);" data-aos="fade-up" data-aos-duration="2000">
                <div class="card-header" style="text-align: center; font-weight: bold; color: #4b6cb7;">LOGIN</div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <div class="form-label-group">
                            <input id="username" type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required>
                            <label for="username">Username</label>
                        </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 20px;">
                        <div class="form-label-group">
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" name="submit_login" value="Login">
                    </form>
                </div>
            </div>
            <div style="text-align: center; padding-top: 30px;">
                <img src="{{ asset('vendor/img/download.png') }}" width="375px" height="100px" data-aos="zoom-in"  data-aos-duration="2000">
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!--Aos Scroll-->
        <script src="{{ asset('vendor/js/aos.js') }}"></script>
        <script>
        AOS.init();
        </script>
    </body>
</html>


