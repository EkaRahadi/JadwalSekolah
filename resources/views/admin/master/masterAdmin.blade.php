<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"/>
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-bell-o"></i> <span> SPTK </span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a>
                  </li>
                  <li><a><i class="fa fa-folder"></i>Kelola Data Sekolah<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/dataSekolah/kelas">Kelas</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i>Kelola Data Siswa<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/dataSekolah/siswa">Siswa</a></li>
                        <li><a href="/orangtua">Orangtua</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i>Kelola Jadwal<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/jadwal">Jadwal</a></li>
                        <li><a href="/jadwal/hari">Hari</a></li>
                        <li><a href="/jadwal/event">Event</a></li>
                      </ul>
                  </li>
                  <li><a href="/ringtone"><i class="fa fa-music"></i> Ringtone</a>
                  </li>
                  <li><a href="/pemberitahuan"><i class="fa fa-bell"></i> Pemberitahuan</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-target="#belPengumuman" data-toggle="modal" data-placement="top" title="Pengumuman">
                <span class="fa fa-microphone" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Help">
                <span class="fa fa-question" aria-hidden="true"></span>
              </a>
              <a href="/logout" data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

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
                    {{App\Admin::where('username', Session::get('username'))->value('nama')}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Kelola Admin</a>
                    <a class="dropdown-item"  href="#">Ganti Password</a>
                    <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="modal fade" id="belSekolah" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">BEL SEKOLAH BERBUNYI</h5>ol
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="bunyiBel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="belPengumuman" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">PENGUMUMAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="bunyiPengumuman">
                        </div>
                    </div>
                </div>
            </div>
        @yield('content')

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script type="text/javascript">
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('151337ecabb1e61db5a3', {
                cluster: 'ap1',
                forceTLS: true
            });

            var channel = pusher.subscribe('ringtone-ringing');
            channel.bind('bunyi-event', function(data) {
                // var audio = new Audio(data.ringtone);
                // audio.play();
                // var data = data;
                var myModal= $('#belSekolah').on('show.bs.modal', function () {
                    $('#bunyiBel').html(`
                                            <center><audio controls src="`+data.ringtone+`" preload="auto" autoplay></audio></center>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </div>
                                        `);

                })

                myModal.modal('show');
                setTimeout(function(){
                    $('#bunyiBel').empty();
                    myModal.modal('hide')
                }, 63000);


                // $('#belSekolah').modal('show')
                // $('#audio_field').html('<audio src="'+data.ringtone+'" preload="auto" autoplay></audio>');
                // alert(JSON.stringify(data));
            });
        </script>

        <script>
            $(document).ready(function(){
                $('#belPengumuman').on('show.bs.modal', function () {
                    $('#bunyiPengumuman').html(`
                        <center>
                        <audio id="player" controls preload="auto" autoplay>
                            <source src="/audio/bel_master.mp3" type="audio/mpeg">
                        </audio>
                        </center>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    `);

                    navigator.getUserMedia = ( navigator.getUserMedia    || navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia ||navigator.msGetUserMedia);
                    var aCtx;
                    var analyser;
                    var microphone;
                    if (navigator.getUserMedia) {
                        navigator.getUserMedia({audio: true}, function(stream) {
                            aCtx = new webkitAudioContext();
                            analyser = aCtx.createAnalyser();
                            microphone = aCtx.createMediaStreamSource(stream);
                            microphone.connect(analyser);
                            analyser.connect(aCtx.destination);
                        }, function (){console.warn("Error getting audio stream from getUserMedia")});
                    };
                });

                $('#belPengumuman').on('hidden.bs.modal', function(){

                });
            });


        </script>

        {{-- <script>
            var audio = document.getElementById("player");
            audio.addEventListener("ended", function() {
                audio.src = "/audio/bel_master.mp3";
                audio.play();
            });
        </script> --}}

        <script>
            function toggleFullScreen() {
                if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                    if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                    }
                }
            }
        </script>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2016 All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @yield('script')

  </body>
</html>
