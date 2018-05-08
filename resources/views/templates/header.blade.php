

          <?php 
            if(Auth::check()){

              // BRING IT ON
              $public_userNama = '';
              $akses = '';
              $tanggalJoin = '';

               $uname = Auth::user()->user_nama;
               $password = Auth::user()->user_pass;
               $id = Auth::id();
               $res = \App\loginnedUser::getLoginData($id);

               foreach ($res as $key => $value) {
                 $public_userNama = $value->user_nama;
                 $akses = $value->user_hak;
                 $tanggalJoin = date('d-M-Y',strtotime(substr($value->created_at, 0,10)));
               }

            }else{
              echo "No Session Found";
                }
             ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('Assets') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Assets') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('Assets') }}/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Assets/') }}/plugins/jQueryUI/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Assets/') }}/plugins/datatables/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Assets/') }}/morris/morris.css">
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('Assets/') }}/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Assets/') }}/ionicons.css"> -->
  @stack('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IN</b>VT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inventory</b>Web</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

       <?php 
       date_default_timezone_set('Asia/Jakarta');
       

       $listPeminjaman = \App\modelShow::showListPinjam(); 
       foreach ($listPeminjaman as $key => $value) {

       }
       $hari1 = date('Y-m-d');
       $hari3 = date('Y-m-d', strtotime('+3 days'));
       $banyakData3Hari = \App\modelShow::showListPinjam3HariTerakhir($hari3);
       $banyakData1Hari = \App\modelShow::showListPinjamHariTerakhir($hari1);
       $banyakDataLebih = \App\modelShow::showListPinjamLebih($hari1);

       $jumlahNotif = count($banyakData3Hari) + count($banyakData1Hari) + count($banyakDataLebih);

       ?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ $jumlahNotif }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ $jumlahNotif }} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                   @foreach($banyakData1Hari as $val)
                   <li>
                      <a href="{{ url('cetak_peringatan_pinjam_terakhir') }}/{{ $val->pb_id }}" target="_blank"><i class="fa fa-warning text-red"></i> Peminjaman terakhir {{ $val->pb_id }}</a>
                  </li>
                   @endforeach

                   @foreach($banyakData3Hari as $val)
                   <li>
                    <a href="{{ url('cetak_peringatan_pinjam') }}/{{ $val->pb_id }}" target="_blank"><i class="fa fa-warning text-yellow"></i> Peminjaman 3 Hari Terakhir {{ $val->pb_id }}</a>
                  </li>
                   @endforeach

                   @foreach($banyakDataLebih as $val)
                   <li>
                    <a href="{{ url('cetak_peringatan_akhir') }}/{{ $val->pb_id }}" target="_blank"><i class="fa fa-warning text-black"></i> Melebihi Tanggal Pengembalian {{ $val->pb_id }}</a>
                  </li>
                   @endforeach
                </ul>
              </li>
              <li class="footer"><a href="#">End Of Notification</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('Assets') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper( $public_userNama ) ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('Assets') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo strtoupper( $public_userNama ) ?> - <b style="color: cyan;">{{ $akses }}</b>
                  <small>Member since <b> {{ $tanggalJoin }}</b></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" data-toggle="modal" id="ubah" class="btn btn-default btn-flat" data-target="#myEdit"><span class="glyphicon glyphicon-eye-open"></span> Ubah Password</a>
                </div>
                <div class="pull-right">
                  <form action="{{ url('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('Assets') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper( $public_userNama ) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <?php
        if($akses == 'su'){
      ?>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         @if(empty(Request::Segment(1)))
        <li class="active">
        @else
        <li> 
        @endif
        <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          
          @if(Request::Segment(1) == 'dataSiswa')
          <li class="active">
          @else
          <li>
          @endif

          <a href="{{ url('dataSiswa') }}"><i class="fa fa-user"></i> Siswa</a></li>

          @if(Request::Segment(1) == 'barang')
            <li class="treeview active">
          @else
            <li class="treeview">
          @endif
           <a href="#">
            <i class="fa fa-eye"></i> <span>Barang Inventaris</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('barang/daftar') }}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
            <li><a href="{{ url('barang/terima') }}"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>
          </ul>
        </li>

        @if(Request::Segment(1) == 'peminjaman' OR Request::Segment(1) == 'pengembalian' OR Request::Segment(1) == 'barang_belum_kembali')
        <li class="treeview active">
        @else
        <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-book"></i> <span>Peminjaman Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('peminjaman') }}"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
            <li><a href="{{ url('pengembalian') }}"><i class="fa fa-circle-o"></i> Pengembalian Barang</a></li>
            <li><a href="{{ url('barang_belum_kembali') }}"><i class="fa fa-circle-o"></i> Barang Belum Kembali</a></li>
          </ul>
        </li>

       @if(Request::Segment(1) == 'laporan')
        <li class="treeview active">
        @else
         <li class="treeview">
         @endif  
           <a href="#">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('laporan/laporan_barang') }}"><i class="fa fa-circle-o"></i> Laporan Daftar Brg</a></li>
            <li><a href="{{ url('laporan/laporan_pengembalian') }}"><i class="fa fa-circle-o"></i> Laporan Pengembalian Brg</a></li>
            <li><a href="{{ url('laporan/laporan_status_barang') }}"><i class="fa fa-circle-o"></i> Laporan Status Brg</a></li>
          </ul>
        </li>

        @if(Request::Segment(1) == 'referensi')
        <li class="treeview active">
        @else
         <li class="treeview">
         @endif  
           <a href="#">
            <i class="fa fa-refresh"></i> <span>Referensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('referensi/jenisBarang') }}"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
            <li><a href="{{ url('referensi/daftarPengguna') }}"><i class="fa fa-circle-o"></i> Daftar Pengguna</a></li>
          </ul>
        </li>
        
       
      </ul>



      <?php }elseif($akses == 'us'){ ?>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         @if(empty(Request::Segment(1)))
        <li class="active">
        @else
        <li> 
        @endif
        <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          
          @if(Request::Segment(1) == 'dataSiswa')
          <li class="active">
          @else
          <li>
          @endif

          <a href="{{ url('dataSiswa') }}"><i class="fa fa-user"></i> Siswa</a></li>

          @if(Request::Segment(1) == 'barang')
            <li class="treeview active">
          @else
            <li class="treeview">
          @endif
           <a href="#">
            <i class="fa fa-eye"></i> <span>Barang Inventaris</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('barang/daftar') }}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
            <li><a href="{{ url('barang/terima') }}"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>
          </ul>
        </li>

        @if(Request::Segment(1) == 'peminjaman' OR Request::Segment(1) == 'pengembalian' OR Request::Segment(1) == 'barang_belum_kembali')
        <li class="treeview active">
        @else
        <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-book"></i> <span>Peminjaman Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('peminjaman') }}"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
            <li><a href="{{ url('pengembalian') }}"><i class="fa fa-circle-o"></i> Pengembalian Barang</a></li>
            <li><a href="{{ url('barang_belum_kembali') }}"><i class="fa fa-circle-o"></i> Barang Belum Kembali</a></li>
          </ul>
        </li>

       
        
       
      </ul>

      <?php }elseif($akses == 'ad'){ ?>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         @if(empty(Request::Segment(1)))
        <li class="active">
        @else
        <li> 
        @endif
        <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>

       @if(Request::Segment(1) == 'laporan')
        <li class="treeview active">
        @else
         <li class="treeview">
         @endif  
           <a href="#">
            <i class="fa fa-print"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('laporan/laporan_barang') }}"><i class="fa fa-circle-o"></i> Laporan Daftar Brg</a></li>
            <li><a href="{{ url('laporan/laporan_pengembalian') }}"><i class="fa fa-circle-o"></i> Laporan Pengembalian Brg</a></li>
            <li><a href="{{ url('laporan/laporan_status_barang') }}"><i class="fa fa-circle-o"></i> Laporan Status Brg</a></li>
          </ul>
        </li>

        @if(Request::Segment(1) == 'referensi')
        <li class="treeview active">
        @else
         <li class="treeview">
         @endif  
           <a href="#">
            <i class="fa fa-refresh"></i> <span>Referensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('referensi/jenisBarang') }}"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
            <li><a href="{{ url('referensi/daftarPengguna') }}"><i class="fa fa-circle-o"></i> Daftar Pengguna</a></li>
          </ul>
        </li>
        
       
      </ul>

      <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>

        <div id="myEdit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Password</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('simpanPassword') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="password" name="passwordBaru" placeholder="Password Baru" class="form-control">
                  <br/>
                  <input type="password" name="cpasswordBaru" placeholder="Confirm Password Baru" class="form-control">
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Password</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




  @include('templates/footer')