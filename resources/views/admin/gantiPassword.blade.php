<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ganti Password | ABSS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="/admin/gantiPassword/proses" method="POST">
                {{ csrf_field() }}
              <h1>Ganti Password</h1>
                    @if ($errors->any())
                      <div class="alert alert-danger" role="alert">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    @if(Session::has('alert danger'))
                        <div class="form-group alert alert-danger">
                            <div>{{Session::get('alert danger')}}</div>
                        </div>
                    @endif
                    @if(Session::has('alert success'))
                        <div class="form-group alert alert-success">
                            <div>{{Session::get('alert success')}}</div>
                        </div>
                    @endif
              <div>
                <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Masukkan password lama" required="" />
              </div>
              <div>
                <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Masukkan password baru" required="" />
              </div>
              <div>
                <input type="password" name="password_baru_ulang" id="password_baru_ulang" class="form-control" placeholder="Masukkan konfirmasi password baru" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-bell"></i> ABSS </h1>
                  <p>© {{ date("Y") }} All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>