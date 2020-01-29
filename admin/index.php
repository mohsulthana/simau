<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if(!isset($_GET['modul']) || $_GET['modul']=='') $_GET['modul']='laman';
include"../db_class.php";
include"../koneksi.php";
include"../acak.php";
require '../assets/system_tools/PHPMailer/PHPMailerAutoload.php';

//notif untuk cek pembayaran kamar pertama kali
$notif="SELECT * from temp_kamar_sewa";
$notif_bayar=mysqli_query($connect,$notif);
$count_bayar=mysqli_num_rows($notif_bayar);

//notif untuk cek pelaporan penghuni apartemen UNSRI
$notif1="SELECT * from pelaporan where status_lapor ='Belum Ditanggapi'";
$notif_lapor=mysqli_query($connect,$notif1);
$count_lapor=mysqli_num_rows($notif_lapor);

//notif untuk user yang baru mendaftar
$notif2="SELECT * from user where role ='mahasiswa' AND status='belum lengkap' ";
$notif_baru=mysqli_query($connect,$notif2);
$count_baru=mysqli_num_rows($notif_baru);

//notif untuk pengajuan pindah kamar
$notif3="SELECT * from pindah_kamar where status_pengajuan =''";
$notif_pindah=mysqli_query($connect,$notif3);
$count_pindah=mysqli_num_rows($notif_pindah);

//notif untuk cek perpanjangan kamar
$notif4="SELECT * from perpanjang_bayar where status_perpanjang =''";
$notif_panjang=mysqli_query($connect,$notif4);
$count_panjang=mysqli_num_rows($notif_panjang);

//notif untuk cek berhenti menyewa
$notif5="SELECT * from berhenti_sewa where status_berhenti ='Sedang Diajukan'";
$notif_henti=mysqli_query($connect,$notif5);
$count_henti=mysqli_num_rows($notif_henti);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin| SIMAU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/system_tools/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/datatables/dataTables.bootstrap4.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?modul=profil" class="nav-link fa fa-user">
          Profil  
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../logout.php" class="nav-link fa fa-arrow-right"> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../assets/system_tools/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SI MAU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['foto_profil'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>
                </a>
              </li>  
          <li class="nav-item has-treeview">
            <a href="?modul=kelola_user" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
                <p>Management User
                  <?php if ($count_baru > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_baru ?></span>
                <?php } else { ?>  
                
              <?php } ?>
                </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
            <a href="?modul=kelola_kamar" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
                <p>Management Kamar</p>
                </a>
              </li>  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Management admin 
                <?php if ($count_bayar > 0 || $count_pindah > 0 || $count_panjang > 0 || $count_henti > 0){?>
                  <span class="right badge badge-danger">New</span>
                <?php } else { ?>  
                <i class="right fa fa-angle-left"></i>
              <?php } ?>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modul=kelola_bukti_pembayaran" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Kelola Bukti Pembayaran
                    <?php if ($count_bayar > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_bayar ?></span>
                <?php } else { ?>
                <?php } ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=kelola_pindah_kamar" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Kelola Pindah Kamar
                    <?php if ($count_pindah > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_pindah ?></span>
                <?php } else { ?>
                <?php } ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=kelola_perpanjangan_kamar" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Kelola Perpanjangan Kamar
                  <?php if ($count_panjang > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_panjang ?></span>
                <?php } else { ?>
                <?php } ?>
              </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=kelola_berhenti_sewa" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Kelola Berhenti Menyewa
                  <?php if ($count_henti > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_henti ?></span>
                <?php } else { ?>
                <?php } ?>
              </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="?modul=bukti_bayar" class="nav-link">
              <i class="nav-icon fa fa-file-o"></i>
                <p>Bukti Struk Bayar</p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="?modul=kelola_pelaporan" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
                <p>Kelola Pelaporan
                  <?php if ($count_lapor > 0){?>
                  <span class="right badge badge-danger"><?php echo $count_lapor ?></span>
                <?php } else { ?>  
                
              <?php } ?>
                </p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Laporan User 
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="modul/laporan_user_b.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Belum Lengkap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modul/laporan_user_l.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Lengkap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modul/laporan_user_p.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Penyewa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modul/laporan_user_h.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Berhenti</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Laporan Kamar 
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="modul/laporan_kamar_l.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Kamar Laki-laki</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="modul/laporan_kamar_p.php" class="nav-link" target="blank">
                  <i class="fa fa-file"></i>
                  <p>Laporan Kamar Perempuan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="modul/laporan_transaksi.php" class="nav-link" target="blank">
              <i class="nav-icon fa fa-file-o"></i>
                <p>Laporan Transaksi</p>
                </a>
              </li>       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
          <section class="content">
            <?php require('modul/'.$_GET['modul'].'.php'); ?>
          </section>
           
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../assets/system_tools/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/system_tools/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../assets/system_tools/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../assets/system_tools/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/system_tools/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/system_tools/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../assets/system_tools/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/system_tools/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../assets/system_tools/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../assets/system_tools/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../assets/system_tools/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../assets/system_tools/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/system_tools/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="../assets/system_tools/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/system_tools/plugins/datatables/dataTables.bootstrap4.js"></script>

<?php if ($_GET['modul'] == 'edit_user'){ ?>
<script src="../assets/system_tools/jquery1.min.js"></script>
<script src="../assets/system_tools/jquery-chained.min.js"></script>

<script>
            $(document).ready(function() {
                $("#jurusan").chained("#fakultas");
            });
</script>

<script>
            $(document).ready(function() {
                $("#jurusan1").chained("#fakultas1");
            });
</script>
<?php } else { ?>

<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    $("#example3").DataTable();
  });
</script>

<?php } ?>
</body>
</html>
