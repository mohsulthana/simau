<?php
$ius=$_SESSION['id_user'];
$query="SELECT * from kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar where kamar_sewa.id_user='$ius'";
$sql=mysqli_query($connect,$query);
$dat=mysqli_fetch_array($sql);
?>

<h3>Upload Bukti Perpanjangan Kamar</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Upload Bukti Perpanjangan Kamar Apartemen UNSRI</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Silahkan Upload Bukti Pembayaran Anda : <br/>
<form method="post" enctype="multipart/form-data">
<span style="color: red">* Upload Bukti Berupa foto / Screen Shot jelas</span>
<br/><input type="file" name="foto_bukti_perpanjang">
<input type="hidden" name="id_kamar" value="<?php echo $dat['id_kamar'] ?>">
<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
<input type="hidden" name="tanggal_upload_panjang" value="<?php echo date('Y-m-d') ?>">
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
$tanggal=$_POST['tanggal_upload_panjang'];

$lokasi_file=$_FILES['foto_bukti_perpanjang']['tmp_name'];
  $nama_file=basename($_FILES['foto_bukti_perpanjang']['name']);

  $q="../assets/foto_perpanjangan/$nama_file";

  if(move_uploaded_file($lokasi_file, "$q"))
    {

$query1="INSERT INTO perpanjang_bayar(id_user,id_kamar,tanggal_upload_panjang,foto_bukti_perpanjang) VALUES('$idu','$kamar','$tanggal','$q')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Anda Telah Melakukan Perpanjangan, Silahkan Menunggu Admin Melakukan Verifikasi Bukti Pembayaran...'); window.location = 'index.php'</script>";
}

}
?>