<?php
$query="SELECT * from perpanjang_bayar join user on perpanjang_bayar.id_user=user.id_user join kamar on perpanjang_bayar.id_kamar=kamar.id_kamar where perpanjang_bayar.status_perpanjang =''";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from perpanjang_bayar join user on perpanjang_bayar.id_user=user.id_user join kamar on perpanjang_bayar.id_kamar=kamar.id_kamar where perpanjang_bayar.status_perpanjang ='Telah Diverifikasi'";
$sql1=mysqli_query($connect,$query1);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Perpanjangan Kamar Apartemen UNSRI</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Nama</th>
                  <th>Dari Kamar</th>
                  <th>Tanggal Upload</th>
                  <th>Bukti Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['tanggal_upload_panjang'] ?></td>
                  <td><a href="<?php echo $data['foto_bukti_perpanjang'] ?>" target="blank"><img src="<?php echo $data['foto_bukti_perpanjang'] ?>" width='100px' height='100px'></a></td>
                  <td>
                    <a href="?modul=kelola_perpanjangan_kamar&id_perpanjang=<?php echo $data['id_perpanjang'] ?>" class="btn btn-success fa fa-check"> Verifikasi</a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Dari Kamar</th>
                  <th>Tanggal Upload</th>
                  <th>Bukti Foto</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Perpanjangan Kamar Apartemen UNSRI(Telah Diverifikasi)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Nama</th>
                  <th>Dari Kamar</th>
                  <th>Tanggal Upload</th>
                  <th>Bukti Foto</th>
                  <th>status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['blok'] ?>.<?php echo $data1['lantai'] ?>.<?php echo $data1['nomor'] ?></td>
                  <td><?php echo $data1['tanggal_upload_panjang'] ?></td>
                  <td><a href="<?php echo $data1['foto_bukti_perpanjang'] ?>"><img src="<?php echo $data1['foto_bukti_perpanjang'] ?>" width='100px' height='100px'></a></td>
                  <td><?php echo $data1['status_perpanjang'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Dari Kamar</th>
                  <th>Tanggal Upload</th>
                  <th>Bukti Foto</th>
                  <th>status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

<?php
if(isset($_GET['id_perpanjang'])){
$idjang=$_GET['id_perpanjang'];

$panjang="SELECT * from perpanjang_bayar join user on perpanjang_bayar.id_user=user.id_user join kamar on perpanjang_bayar.id_kamar=kamar.id_kamar join kamar_sewa on perpanjang_bayar.id_kamar=kamar_sewa.id_kamar where perpanjang_bayar.id_perpanjang ='$idjang'";
$panjangs=mysqli_query($connect,$panjang);
$panjangs1=mysqli_fetch_array($panjangs);

$email=$panjangs1['email'];
$sewa=$panjangs1['id_sewa'];
$tanggal_baru=date("Y-m-d", strtotime("+1 years"));

$idu=$panjangs1['id_user'];
$idk=$panjangs1['id_kamar'];
$tanggal=$panjangs1['tanggal_sewa'];
$statsh="Lanjut Menyewa";

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
$mail->Subject = 'Perpanjangan Telah Berhasil';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Selamat, Waktu Menyewa Apartemen Anda Telah Diperpanjang</h1>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$yes=mysqli_query($connect,"UPDATE perpanjang_bayar set status_perpanjang='Telah Diverifikasi' where id_perpanjang='$idjang'");
$yes1=mysqli_query($connect,"UPDATE kamar_sewa set tanggal_sewa='$tanggal_baru' where id_sewa='$sewa'");
$yes2=mysqli_query($connect,"INSERT INTO history_perpanjangan (id_user, id_kamar,tanggal_menyewa,status_history) VALUES('$idu','$idk','$tanggal','$statsh')");

}

echo "<script>alert('Pembayaran Berhasil Diverifikasi...');document.location='?modul=kelola_perpanjangan_kamar'</script>";
}
?>          