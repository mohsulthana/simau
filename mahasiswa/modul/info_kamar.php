<?php
$id=$_SESSION['id_user'];
$query="SELECT * from kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar_sewa.id_user='$id'";
$sql=mysqli_query($connect,$query);
$data=mysqli_fetch_array($sql);
?>
<h3>Info Kamar Saya</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Info Detail Kamar Saya</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Info Kamar : <?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?><br/>
Tanggal Sah Menyewa Kamar : <?php echo $data['tanggal_sewa'] ?><br/>
Tanggal Habis Sewa Kamar : <?php echo date("Y-m-d", strtotime("+1 years", strtotime($data['tanggal_sewa']))) ?><br/>
<?php
$date1=strtotime(date("Y-m-d"));
$date2=strtotime(date("Y-m-d", strtotime("+1 years", strtotime($data['tanggal_sewa']))));
$datediff=abs($date2 - $date1);
$days=$datediff/86400;
$daysnumba=intval($days);
?>

Sisa Waktu Menyewa : <?php echo $daysnumba; ?> Hari Lagi<br/>

<br/>
<a class="btn btn-success fa fa-print" href="modul/cetak_info_bayar.php" target="blank"> Cetak Info</a>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->