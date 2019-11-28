<h3>Pelaporan</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Berikan Keterangan Pelaporan</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Silahkan Mengisi Hal Yang Ingin Dilaporkan : <br/>
<form method="post" enctype="multipart/form-data">
  <center>
<textarea cols="100" rows="10" placeholder="Silahkan Mengisi Hal Yang Ingin Dilaporkan" name="isi_laporan"></textarea><br/>  
<span style="color: red">* Upload Bukti Pelaporan</span>
<br/><input type="file" name="foto_lapor">
<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
<input type="hidden" name="tanggal_lapor" value="<?php echo date('Y-m-d') ?>">
<input type="hidden" name="status_lapor" value="Belum Ditanggapi">
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
$tanggal=$_POST['tanggal_lapor'];
$status=$_POST['status_lapor'];
$isi=$_POST['isi_laporan'];

$lokasi_file=$_FILES['foto_lapor']['tmp_name'];
  $nama_file=basename($_FILES['foto_lapor']['name']);

  $q="../assets/foto_lapor/$nama_file";

  if(move_uploaded_file($lokasi_file, "$q"))
    {

$query1="INSERT INTO pelaporan(id_user,isi_laporan,tanggal_lapor,foto_lapor,status_lapor) VALUES('$idu','$isi','$tanggal','$q','$status')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Anda Telah Berhasil Menyampaikan Pelaporan...'); window.location = 'index.php'</script>";
}

}
?>