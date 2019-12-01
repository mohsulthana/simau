<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if(!isset($_GET['modul']) || $_GET['modul']=='') $_GET['modul']='laman';
include"../koneksi.php";
$idu=$_SESSION['id_user'];
$bayar="SELECT * from temp_kamar_sewa where id_user='$idu'";
$bayars=mysqli_query($connect,$bayar);
$bayars1=mysqli_fetch_array($bayars);

$sewa="SELECT * from kamar_sewa where id_user='$idu'";
$sewas=mysqli_query($connect,$sewa);
$sewas1=mysqli_fetch_array($sewas);

$batas="SELECT * from kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar_sewa.id_user='$idu'";
$batass=mysqli_query($connect,$batas);
$batass1=mysqli_fetch_array($batass);

$date1=strtotime(date("Y-m-d"));
$date2=strtotime(date("Y-m-d", strtotime("+1 years", strtotime($batass1['tanggal_sewa']))));
$datediff=abs($date2 - $date1);
$days=$datediff/86400;
$daysnumba=intval($days);
$perpanjang=intval($days);
$notif_perpanjang=intval($days);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | SIMAU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: blue;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

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
    <?php if($_SESSION['status'] == "belum lengkap"){ ?>
    <span class="badge badge-danger">*Profil belum lengkap</span>
    <?php } else { ?>
      <span class="badge badge-success">*Profil lengkap</span>
    <?php } ?> 

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
    <a href="./index.php" class="brand-link">
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
          <a href="?modul=profil" class="d-block"><?php echo $_SESSION['nama']; ?></a>
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
              <?php if($_SESSION['status'] == "belum lengkap"){ ?>
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
                <p>Lengkapi Dulu Profil Anda</p>
                </a>
              </li> 
              <?php } else { ?>  
          <?php if($_SESSION['status']=='Penyewa'){ ?>
          <?php }?> 
          <li class="nav-item has-treeview">
            <a href="?modul=profil" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Pilih Kamar
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modul=kamar_manual" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Pilih Manual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=pilih_otomatis" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Pilih Otomatis</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Management Kamar
                <?php
            if($perpanjang < 8){?>
              <span class="right badge badge-danger">New</span>
            <?php }else {?>  
                <i class="right fa fa-angle-left"></i>
            <?php } ?>  
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($sewas1['id_user']==$_SESSION['id_user'] && $_SESSION['status']=="Penyewa"){ ?>
              <li class="nav-item">
                <a href="?modul=info_kamar" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Print Info Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=pindah_kamar" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Pengajuan Pindah Kamar</p>
                </a>
              </li>
              <?php
            if($perpanjang < 8){
            ?>
              <li class="nav-item">
                <a href="?modul=perpanjangan_kamar" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Perpanjangan Kamar</p>
                  <span class="right badge badge-danger">Klik Me</span>
                </a>
              </li>
            <?php } else {?>

            <?php }?>
              
            <?php } else {?>
              <li class="nav-item">
                <a href="?modul=print_pembayaran" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Print Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modul=upload_bukti" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Upload Bukti Pembayaran</p>
                </a>
              </li>
            <?php } ?>  
            </ul>
          </li>
        <?php } ?>
          <li class="nav-item has-treeview">
            <a href="?modul=pelaporan" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
                <p>Pelaporan</p>
                </a>
              </li>
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
                <p>Cara Memesan Kamar</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
          <section class="content container-fluid">
            <?php
            if($daysnumba < 8){
            ?>
            <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Peringatan Batas Waktu Menyewa</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Yth, Kepada <b><?php echo $batass1['nama'] ?></b> Waktu Sewa Kamar Anda Tinggal <b><?php echo $daysnumba; ?></b> Hari Lagi.
                Diharapkan Untuk Memperpanjang Waktu Sewa Sebelum Masa Berlaku Habis.
                Terima Kasih... 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <?php } else {?>

          <?php } ?>
            <?php require('modul/'.$_GET['modul'].'.php'); ?>
            
          </section>
           
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versi</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019.</strong> SIMAU (Sistem Manajemen Apartemen Unsri)
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
</body>
</html>
