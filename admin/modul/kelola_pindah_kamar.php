<?php
$query="SELECT * from pindah_kamar join user on pindah_kamar.id_user=user.id_user join kamar on pindah_kamar.id_kamar=kamar.id_kamar where pindah_kamar.status_pengajuan =''";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from pindah_kamar join user on pindah_kamar.id_user=user.id_user join kamar on pindah_kamar.id_kamar=kamar.id_kamar where pindah_kamar.status_pengajuan ='Diterima'";
$sql1=mysqli_query($connect,$query1);

$query2="SELECT * from pindah_kamar join user on pindah_kamar.id_user=user.id_user join kamar on pindah_kamar.id_kamar=kamar.id_kamar where pindah_kamar.status_pengajuan ='Ditolak'";
$sql2=mysqli_query($connect,$query2);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pengajuan Pindah Kamar Apartemen UNSRI</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['alasan'] ?></td>
                  <td><?php echo $data['tanggal_pengajuan'] ?></td>
                  <td><a href="?modul=terima_pengajuan&id_pengajuan=<?php echo $data['id_pindah'] ?>" class="btn btn-success fa fa-check"> Terima Pengajuan</a>
                    <a href="?modul=kelola_pindah_kamar&id_pengajuana=<?php echo $data['id_pindah'] ?>" class="btn btn-danger fa fa-trash"> Tolak Pengajuan</a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
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
              <h3 class="card-title">Data Pengajuan Pindah Kamar Apartemen UNSRI(Diterima)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Ke Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['blok'] ?>.<?php echo $data1['lantai'] ?>.<?php echo $data1['nomor'] ?></td>
                  <td>
                    <?php
                    $move=$data1['id_kamar_pindah'];

                    $home="SELECT * from kamar where id_kamar='$move'";
                    $homes=mysqli_query($connect,$home);
                    $homesa=mysqli_fetch_array($homes);
                    ?>

                    <?php echo $homesa['blok'] ?>.<?php echo $homesa['lantai'] ?>.<?php echo $homesa['nomor'] ?>
                  </td>
                  <td><?php echo $data1['alasan'] ?></td>
                  <td><?php echo $data1['tanggal_pengajuan'] ?></td>
                  <td><?php echo $data1['status_pengajuan'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Ke Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
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
              <h3 class="card-title">Data Pengajuan Pindah Kamar Apartemen UNSRI(Ditolak)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example3" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data2=mysqli_fetch_array($sql2)){ ?>
                <tr>
                  <td><?php echo $data2['nama'] ?></td>
                  <td><?php echo $data2['blok'] ?>.<?php echo $data2['lantai'] ?>.<?php echo $data2['nomor'] ?></td>
                  <td><?php echo $data2['alasan'] ?></td>
                  <td><?php echo $data2['tanggal_pengajuan'] ?></td>
                  <td><?php echo $data2['status_pengajuan'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Yang Mengajukan</th>
                  <th>Dari Kamar</th>
                  <th>Alasan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

<?php
if(isset($_GET['id_pengajuana'])){
$idu=$_GET['id_pengajuana'];

$tola="SELECT * from pindah_kamar join user on pindah_kamar.id_user=user.id_user where pindah_kamar.id_pindah ='$idu'";
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
$mail->Subject = 'Pengajuan Telah Ditolak';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Maaf Atas Ketidaknyamanannya, Pengajuan Pindah Kamar Anda Telah Ditolak..</h1>
<p>Setelah Melihat Langsung Ketempat Dan Telah Berdiskusi..</p>
<p>Kami Menyatakan Bahwa Pengajuan Ditolak..</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$tutup="UPDATE pindah_kamar set status_pengajuan='Ditolak' where id_pindah='$idu'";
$tutups = mysqli_query($connect,$tutup);   

}

echo "<script>alert('Pengajuan Telah Ditolak...');document.location='?modul=kelola_pindah_kamar'</script>";
}
?>          