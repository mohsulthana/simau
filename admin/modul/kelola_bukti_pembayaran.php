<?php
$query="SELECT * from bukti_bayar join temp_kamar_sewa on bukti_bayar.id_user=temp_kamar_sewa.id_user join user on bukti_bayar.id_user=user.id_user join kamar on temp_kamar_sewa.id_kamar=kamar.id_kamar order by bukti_bayar.tanggal_upload desc";
$sql=mysqli_query($connect,$query);
?>
<h3>Cek Bukti Pembayaran</h3>
<?php
while($data=mysqli_fetch_array($sql)){
?>
<div class="col-lg-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pembayaran Atas Nama <?php echo $data['nama']?></h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Bukti Foto / Screen Shoot Untuk Kamar : (<?php echo $data['blok']?>.<?php echo $data['lantai']?>.<?php echo $data['nomor']?>)<br/>
<form method="post" enctype="multipart/form-data">
<center>  
<a href="<?php echo $data['foto_bukti'] ?>" target="blank"><img src="<?php echo $data['foto_bukti'] ?>" width="300px" height="200px"></a>
<input type="hidden" name="id_kamar" value="<?php echo $data['id_kamar'] ?>">
<input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">
<input type="hidden" name="id_temp" value="<?php echo $data['id_temp'] ?>">
<input type="hidden" name="tanggal_sewa" value="<?php echo date('Y-m-d') ?>">
<input type="hidden" name="email" value="<?php echo $data['email'] ?>">

<center>
  <br/>
<input type="submit" value="Verifikasi" name="verif" class="btn btn-success">
</form>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
<?php } ?>
<?php          
if(isset($_POST['verif'])){

$idu=$_POST['id_user'];
$idk=$_POST['id_kamar'];
$idt=$_POST['id_temp'];
$tanggal=$_POST['tanggal_sewa'];
$email=$_POST['email'];

$mail = new PHPMailer;

// Konfigurasi SMTP(berisi tentang email yang akan dipakai)
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'Apartemen456@gmail.com';
$mail->Password = 'Superslayer';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('Apartemen456@gmail.com', 'Admin Apartemen UNSRI');

// Menambahkan penerima berdasarkan query diatas
$mail->addAddress($email);

// Subjek email
$mail->Subject = 'Pembayaran Telah Divalidasi';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Pembayaran Anda Untuk Kamar Yang Telah Disewa Telah Berhasil Diverifikasi</h1>
<p>Data Foto / Screen Shoot Benar Dan Valid...</p>
<p>Untuk Melihat Info Kamar Anda , Silahkan Buka Menu Print Info Kamar...</p>
<h3>Selamat Datang Di Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$kamar="INSERT INTO kamar_sewa(id_kamar,id_user,tanggal_sewa) VALUES('$idk','$idu','$tanggal')";
$sewa = mysqli_query($connect,$kamar);

if($sewa)
{
    $sq=mysqli_query($connect,"DELETE FROM temp_kamar_sewa WHERE id_temp='$idt'");
    $sq1=mysqli_query($connect,"UPDATE user set `status`='Penyewa' WHERE id_user='$idu'");
    
}

echo "<script>alert('Verifikasi Berhasil'...);document.location='index.php'</script>";    

}

}
?>