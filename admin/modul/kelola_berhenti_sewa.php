<?php
$query="SELECT * from berhenti_sewa join user on berhenti_sewa.id_user=user.id_user join kamar on berhenti_sewa.id_kamar=kamar.id_kamar where berhenti_sewa.status_berhenti ='Sedang Diajukan'";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from berhenti_sewa join user on berhenti_sewa.id_user=user.id_user join kamar on berhenti_sewa.id_kamar=kamar.id_kamar where berhenti_sewa.status_berhenti ='Diterima'";
$sql1=mysqli_query($connect,$query1);

$query2="SELECT * from berhenti_sewa join user on berhenti_sewa.id_user=user.id_user join kamar on berhenti_sewa.id_kamar=kamar.id_kamar where berhenti_sewa.status_berhenti ='Ditolak'";
$sql2=mysqli_query($connect,$query2);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Berhenti Menyewa Apartemen UNSRI</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['alasan_berhenti'] ?></td>
                  <td><?php echo $data['tanggal_berhenti'] ?></td>
                  <td><a href="?modul=kelola_berhenti_sewa&id_berhenti=<?php echo $data['id_berhenti'] ?>" class="btn btn-success fa fa-check"> Terima Pengajuan Berhenti</a><a href="?modul=kelola_berhenti_sewa&id_berhentia=<?php echo $data['id_berhenti'] ?>" class="btn btn-danger fa fa-trash"> Tolak Pengajuan Berhenti</a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
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
              <h3 class="card-title">Data Berhenti Menyewa Apartemen UNSRI(Diterima)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['blok'] ?>.<?php echo $data1['lantai'] ?>.<?php echo $data1['nomor'] ?></td>
                  <td><?php echo $data1['alasan_berhenti'] ?></td>
                  <td><?php echo $data1['tanggal_berhenti'] ?></td>
                  <td><?php echo $data1['status_berhenti'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Berhenti Menyewa Apartemen UNSRI(Ditolak)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['blok'] ?>.<?php echo $data1['lantai'] ?>.<?php echo $data1['nomor'] ?></td>
                  <td><?php echo $data1['alasan_berhenti'] ?></td>
                  <td><?php echo $data1['tanggal_berhenti'] ?></td>
                  <td><?php echo $data1['status_berhenti'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan Berhenti</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

<?php
//terima berhenti
if(isset($_GET['id_berhenti'])){
$idu=$_GET['id_berhenti'];

$teri="SELECT * from berhenti_sewa join user on berhenti_sewa.id_user=user.id_user join kamar on berhenti_sewa.id_kamar=kamar.id_kamar join kamar_sewa on berhenti_sewa.id_kamar=kamar_sewa.id_kamar where berhenti_sewa.id_berhenti ='$idu'";
$terim=mysqli_query($connect,$teri);
$terima=mysqli_fetch_array($terim);

$email=$terima['email'];
$idr=$terima['id_user'];
$idkm=$terima['id_kamar'];
$tanggal=$terima['tanggal_sewa'];
$statsh="Berhenti";


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
$mail->Subject = 'Pengajuan Berhenti Telah Diterima';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Selamat, Pengajuan Berhenti Menyewa Anda Telah Diterima..</h1>
<p>Setelah Melihat Langsung Ketempat Dan Telah Berdiskusi..</p>
<p>Kami Menyatakan Bahwa Pengajuan Berhenti Diterima..</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$tutup=mysqli_query($connect,"UPDATE berhenti_sewa set status_berhenti='Diterima' where id_berhenti='$idu'");
$tutup1=mysqli_query($connect,"INSERT INTO history_perpanjangan (id_user, id_kamar,tanggal_menyewa,status_history) VALUES('$idr','$idkm','$tanggal','$statsh')");
$tutup2=mysqli_query($connect,"DELETE FROM kamar_sewa WHERE id_user='$idr'");
$tutup3=mysqli_query($connect,"UPDATE kamar set kapasitas=kapasitas+1 where id_kamar='$idkm'");
$tutup3=mysqli_query($connect,"UPDATE user set status='$statsh' where id_user='$idr'");
}

echo "<script>alert('Pengajuan Berhenti Telah Diterima...');document.location='?modul=kelola_berhenti_sewa'</script>";
}

//tolak berhenti
if(isset($_GET['id_berhentia'])){
$idu=$_GET['id_berhentia'];

$tola="SELECT * from berhenti_sewa join user on berhenti_sewa.id_user=user.id_user where berhenti_sewa.id_berhenti ='$idu'";
$tolak=mysqli_query($connect,$tola);
$tolaks=mysqli_fetch_array($tolak);

$email=$tolaks['email'];

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
$mail->Subject = 'Pengajuan Berhenti Telah Ditolak';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Maaf Atas Ketidaknyamanannya, Pengajuan Berhenti Menyewa Anda Telah Ditolak..</h1>
<p>Setelah Melihat Langsung Ketempat Dan Telah Berdiskusi..</p>
<p>Kami Menyatakan Bahwa Pengajuan Berhenti Ditolak..</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$tutup="UPDATE berhenti_sewa set status_berhenti='Ditolak' where id_berhenti='$idu'";
$tutups = mysqli_query($connect,$tutup);   

}

echo "<script>alert('Pengajuan Berhenti Telah Ditolak...');document.location='?modul=kelola_berhenti_sewa'</script>";
}
?>          