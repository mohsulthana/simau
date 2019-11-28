<?php
$query="SELECT * from pelaporan join user on pelaporan.id_user=user.id_user where pelaporan.status_lapor='Belum Ditanggapi'";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from pelaporan join user on pelaporan.id_user=user.id_user where pelaporan.status_lapor='Telah Ditanggapi'";
$sql1=mysqli_query($connect,$query1);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pelaporan Penghuni Apartemen Unsri(Belum Ditanggapi)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Nama User</th>
                  <th>Isi Laporan</th>
                  <th>Tanggal Melaporkan</th>
                  <th>Foto Pelaporan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['isi_laporan'] ?></td>
                  <td><?php echo $data['tanggal_lapor'] ?></td>
                  <td><a href="<?php echo $data['foto_lapor'] ?>" target="blank"><img src="<?php echo $data['foto_lapor'] ?>" width="100px" height="100px"></a></td>
                  <td><?php echo $data['status_lapor'] ?></td>
                  <td><a href="?modul=kelola_pelaporan&id_user=<?php echo $data['id_user'] ?>&id_lapor=<?php echo $data['id_lapor'] ?>" class="btn btn-success fa fa-check"> Tanggapi</a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama User</th>
                  <th>Isi Laporan</th>
                  <th>Tanggal Melaporkan</th>
                  <th>Foto Pelaporan</th>
                  <th>Status</th>
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
              <h3 class="card-title">Data Pelaporan Penghuni Apartemen Unsri(Telah Ditanggapi)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama User</th>
                  <th>Isi Laporan</th>
                  <th>Tanggal Melaporkan</th>
                  <th>Foto Pelaporan</th>
                  <th>Status</th>
                 
                </tr>
                </thead>
                <tbody>
                
                  <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['isi_laporan'] ?></td>
                  <td><?php echo $data1['tanggal_lapor'] ?></td>
                  <td><a href="<?php echo $data1['foto_lapor'] ?>" target="blank"><img src="<?php echo $data1['foto_lapor'] ?>" width="100px" height="100px"></a></td>
                  <td><?php echo $data1['status_lapor'] ?></td>
                </tr>  
                <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama User</th>
                  <th>Isi Laporan</th>
                  <th>Tanggal Melaporkan</th>
                  <th>Foto Pelaporan</th>
                  <th>Status</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<?php
if(isset($_GET['id_user'])){
$idu=$_GET['id_user'];
$idl=$_GET['id_lapor'];

$lapor="SELECT * from user where id_user='$idu'";
$laporan=mysqli_query($connect,$lapor);
$laporans=mysqli_fetch_array($laporan);

$email=$laporans['email'];

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
$mail->Subject = 'Pelaporan Telah Ditanggapi';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Terima Kasih Atas Pelaporannya, Pelapolan Yang Anda Kirimkan Telah Kami Tanggapi</h1>
<p>Untuk Kedepannya Akan Kami Usahakan Semaksimal Mumgkin..</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$lapor="UPDATE pelaporan set `status_lapor`='Telah Ditanggapi' WHERE id_lapor='$idl'";
$lapors = mysqli_query($connect,$lapor);

}
echo "<script>alert('Laporan Telah Berhasil Ditanggapi...);document.location='?modul=kelola_pelaporan'</script>";    

}
?>          