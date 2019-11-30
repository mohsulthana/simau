<?php
$ius=$_SESSION['id_user'];
$query="SELECT * from temp_kamar_sewa where id_user='$ius'";
$sql=mysqli_query($connect,$query);
$dat=mysqli_fetch_array($sql);
?>

<h3>Upload Bukti Pembayaran</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran Apartemen UNSRI</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Silahkan Upload Bukti Pembayaran Anda : <br/>
<form method="post" enctype="multipart/form-data">
<span style="color: red">* Upload Bukti Berupa foto / Screen Shot jelas</span>
<br/><input class="form-control" type="file" name="foto_bukti">
<input type="hidden" name="id_kamar" value="<?php echo $dat['id_kamar'] ?>">
<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
<input type="hidden" name="tanggal_upload" value="<?php echo date('Y-m-d') ?>">
<br/>
<center>
<input type="submit" value="Upload" name="upload" class="btn btn-success">
</form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
<?php          
if(isset($_POST['upload'])){

$idu=$_POST['id_user'];
$kamar=$_POST['id_kamar'];
$tanggal=$_POST['tanggal_upload'];

$lokasi_file=$_FILES['foto_bukti']['tmp_name'];
  $nama_file=basename($_FILES['foto_bukti']['name']);

  $q="../assets/foto_bukti/$nama_file";

  if(move_uploaded_file($lokasi_file, "$q"))
    {

$query1="INSERT INTO bukti_bayar(id_user,tanggal_upload,foto_bukti,id_kamar) VALUES('$idu','$tanggal','$q','$kamar')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Anda Telah Melakukan Pembayaran, Silahkan Menunggu Admin Melakukan Verifikasi Bukti Pembayaran...'); window.location = 'index.php'</script>";
}

}
?>