<?php
$id = $_GET['id_pengajuan'];

$pindah="SELECT * from pindah_kamar join user on pindah_kamar.id_user=user.id_user join kamar on pindah_kamar.id_kamar=kamar.id_kamar where pindah_kamar.id_pindah='$id'";
$pindaha=mysqli_query($connect,$pindah);
$pindahan=mysqli_fetch_array($pindaha);

$kamar=$pindahan['id_kamar'];
$kelamin=$pindahan['jenis_kelamin'];

$query ="SELECT * FROM kamar WHERE id_kamar != '$kamar' AND jenis_kelamin='$kelamin'";
$sql = mysqli_query($connect,$query);
?>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Terima Pengajuan Pindah Kamar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <h4>Data Yang Ingin Pindah Kamar Atas Nama : <?php echo $pindahan['nama'] ?></h4>
              <h4>Dengan Lokasi Kamar : <?php echo $pindahan['blok'] ?>.<?php echo $pindahan['lantai'] ?>.<?php echo $pindahan['nomor'] ?></h4>
              
              <form method="post">
              <div class="form-group">
                        <label for="inputName2" class="col-sm-12 control-label">Silahkan Pilih Kamar Untuk Dipindahkan...</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="id_kamar">
                            <?php foreach ($sql as $kat): ?>
                          
                            <option value="<?php echo $kat['id_kamar'] ?>"><?php echo $kat['blok'] ?>.<?php echo $kat['lantai'] ?>.<?php echo $kat['nomor'] ?> (<?php echo $kat['jenis_kelamin']?>)</option>
                          
                          <?php endforeach;?>
                          </select>

                        </div>
                </div>
                  <input type="hidden" name="id_user" value="<?php echo $pindahan['id_user'] ?>">
                  <input type="hidden" name="id_pindah" value="<?php echo $pindahan['id_pindah'] ?>">
                  <input type="hidden" name="id_kamara" value="<?php echo $pindahan['id_kamar'] ?>">
                  <input type="submit" name="kamar" value="Submit Kamar" class="btn btn-success">
                  <a href="?modul_kelola_pindah_kamar" class="btn btn-danger"> Batal</a>
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<?php          
if(isset($_POST['kamar'])){
$idu=$_POST['id_user'];
$roomn=$_POST['id_kamar'];
$idp=$_POST['id_pindah'];
$rooml=$_POST['id_kamara'];

//rekam jejak pindah kamar dari lama ke baru


$teri="SELECT * from user where id_user ='$idu'";
$terim=mysqli_query($connect,$teri);
$terima=mysqli_fetch_array($terim);

$email=$terima['email'];

$mail = new PHPMailer;

// Konfigurasi SMTP(berisi tentang email yang akan dipakai)
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'Apartemen456@gmail.com';
$mail->Password = 'Superslayer';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('Apartemen456s@gmail.com', 'Admin Apartemen UNSRI');

// Menambahkan penerima berdasarkan query diatas
$mail->addAddress($email);

// Subjek email
$mail->Subject = 'Pengajuan Telah Diterima';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Pengajuan Pindah Kamar Anda Telah Diterima..</h1>
<p>Setelah Melihat Langsung Ketempat Dan Telah Berdiskusi..</p>
<p>Kami Menyatakan Bahwa Pengajuan Diterima..</p>
<p>Untuk Info Perpindahan Kamar Bisa Dilihat Melalui Menu Pengajuan Pindah Kamar...</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$yes=mysqli_query($connect,"UPDATE pindah_kamar set status_pengajuan='Diterima',id_kamar_pindah='$roomn' where id_pindah='$idp'");
$yes1=mysqli_query($connect,"UPDATE kamar_sewa set id_kamar='$roomn' where id_user='$idu'");
$yes2=mysqli_query($connect,"UPDATE kamar set kapasitas=kapasitas+1 where id_kamar='$rooml'");
$yes3=mysqli_query($connect,"UPDATE kamar set kapasitas=kapasitas-1 where id_kamar='$roomn'");
}

echo "<script>alert('Pengajuan Telah Diterima...');document.location='?modul=kelola_pindah_kamar'</script>";
}
?>          