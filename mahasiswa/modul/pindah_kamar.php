<?php
$ius=$_SESSION['id_user'];
$query="SELECT * from kamar_sewa where id_user='$ius'";
$sql=mysqli_query($connect,$query);
$dat=mysqli_fetch_array($sql);
?>

<h3>Pengajuan Pindah Kamar</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Mengajukan Perpindahan Kamar</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Silahkan Mengajukan Perpindahan Kamar : <br/>
<form method="post" enctype="multipart/form-data">
  <center>
<textarea cols="100" rows="10" placeholder="Silahkan Mengisi Alasan Anda Ingin Pindah Kamar" name="alasan"></textarea><br/>
</center>
<input type="hidden" name="id_kamar" value="<?php echo $dat['id_kamar'] ?>">
<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
<input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d') ?>">
<br/>
<center>
<input type="submit" value="Submit" name="pengajuan" class="btn btn-success">
</form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
<?php          
if(isset($_POST['pengajuan'])){

$idu=$_POST['id_user'];
$kamar=$_POST['id_kamar'];
$tanggal=$_POST['tanggal_pengajuan'];
$alasan=$_POST['alasan'];

$query1="INSERT INTO pindah_kamar(id_user,id_kamar,alasan,tanggal_pengajuan) VALUES('$idu','$kamar','$alasan','$tanggal')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Anda Telah Mengajukan Perpindahan Kamar, Diharapkan Anda Menunggu Keputusan Dari Admin Apartemen UNSRI...'); window.location = 'index.php'</script>";


}
?>