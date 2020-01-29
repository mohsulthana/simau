<?php
$idu=$_GET['id_user'];
$idk=$_GET['id_kamar'];
?>

<h3>Berhenti Menyewa Apartemen</h3>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Alasan Berhenti</h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Berikan Kami Alasan Mengapa Ingin Berhenti Menyewa Apartemen UNSRI : <br/>
<form method="post" enctype="multipart/form-data">
  <center>
<textarea cols="100" rows="10" placeholder="Silahkan Mengisi Alasan Anda Ingin Berhenti Menyewa" name="alasan_berhenti"></textarea><br/>
</center>
<input type="hidden" name="id_kamar" value="<?php echo $idk ?>">
<input type="hidden" name="id_user" value="<?php echo $idu ?>">
<input type="hidden" name="tanggal_berhenti" value="<?php echo date('Y-m-d') ?>">
<input type="hidden" name="status_berhenti" value="Sedang Diajukan">
<br/>
<center>
<input type="submit" value="Kirim" name="upload" class="btn btn-success">
<a href="?modul=info_kamar" class="btn btn-danger"> Batal</a>
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
$tanggal=$_POST['tanggal_berhenti'];
$alasan=$_POST['alasan_berhenti'];
$status=$_POST['status_berhenti'];

$query1="INSERT INTO berhenti_sewa(id_user,id_kamar,alasan_berhenti,tanggal_berhenti,status_berhenti) VALUES('$idu','$kamar','$alasan','$tanggal','$status')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Anda Telah Mengajukan Berhenti Menyewa, Diharapkan Anda Menunggu Keputusan Dari Admin Apartemen UNSRI...'); window.location = 'index.php'</script>";
}
?>