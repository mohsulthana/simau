<?php
$query="SELECT * from user where role='mahasiswa' AND status='belum lengkap'";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from user where role='mahasiswa' AND status='lengkap'";
$sql1=mysqli_query($connect,$query1);

$query2="SELECT * from user where role='mahasiswa' AND status='Penyewa'";
$sql2=mysqli_query($connect,$query2);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Penghuni Apartemen UNSRI(Baru Mendaftar)</h3><br/>
            <a href="?modul=buat_user" class="btn btn-success fa fa-plus"> Buat User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><a href="<?php echo $data['foto_profil'] ?>" target="blank"><img src="<?php echo $data['foto_profil'] ?>" width="100px" height="100px"></a></td>
                  <td><?php echo $data['nim'] ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['password'] ?></td>
                  <td><?php echo $data['status'] ?></td>
                  <td><a href="?modul=kelola_user&id_user=<?php echo $data['id_user'] ?>" class="btn btn-success fa fa-check"> Terima User</a>
                    <a href="?modul=kelola_user&id_usera=<?php echo $data['id_user'] ?>" class="btn btn-danger fa fa-trash"> Tolak User</a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Password</th>
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
              <h3 class="card-title">Data Penghuni Apartemen UNSRI(Telah Melengkapi Data Diri)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Fakultas</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Golongan Darah</th>
                  <th>Nomor HP</th>
                  <th>Orang Tua / Wali</th>
                  <th>No HP Orang Tua / Wali</th>
                  <th>Tanggal Lahir</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><a href="<?php echo $data1['foto_profil'] ?>" target="blank"><img src="<?php echo $data1['foto_profil'] ?>" width="100px" height="100px"></a></td>
                  <td><?php echo $data1['nim'] ?></td>
                  <td><?php echo $data1['nama'] ?></td>
                  <td><?php echo $data1['email'] ?></td>
                  <td><?php echo $data1['fakultas'] ?></td>
                  <td><?php echo $data1['jurusan'] ?></td>
                  <td><?php echo $data1['jenis_kelamin'] ?></td>
                  <td><?php echo $data1['agama'] ?></td>
                  <td><?php echo $data1['alamat'] ?></td>
                  <td><?php echo $data1['gol_dar'] ?></td>
                  <td><?php echo $data1['no_hp'] ?></td>
                  <td><?php echo $data1['ortu_wali'] ?></td>
                  <td><?php echo $data1['no_hp_ortu'] ?></td>
                  <td><?php echo $data1['tanggal_lahir'] ?></td>
                  <td><?php echo $data1['password'] ?></td>
                  <td><?php echo $data1['status'] ?></td>
                  <td><a href="?modul=edit_user&id_user=<?php echo $data1['id_user'] ?>" class="btn btn-success fa fa-edit"> Edit User</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Fakultas</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Golongan Darah</th>
                  <th>Nomor HP</th>
                  <th>Orang Tua / Wali</th>
                  <th>No HP Orang Tua / Wali</th>
                  <th>Tanggal Lahir</th>
                  <th>Password</th>
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
              <h3 class="card-title">Data Penghuni Apartemen UNSRI(Penyewa Apartemen)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example3" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Fakultas</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Golongan Darah</th>
                  <th>Nomor HP</th>
                  <th>Orang Tua / Wali</th>
                  <th>No HP Orang Tua / Wali</th>
                  <th>Tanggal Lahir</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data2=mysqli_fetch_array($sql2)){ ?>
                <tr>
                  <td><a href="<?php echo $data2['foto_profil'] ?>" target="blank"><img src="<?php echo $data2['foto_profil'] ?>" width="100px" height="100px"></a></td>
                  <td><?php echo $data2['nim'] ?></td>
                  <td><?php echo $data2['nama'] ?></td>
                  <td><?php echo $data2['email'] ?></td>
                  <td><?php echo $data2['fakultas'] ?></td>
                  <td><?php echo $data2['jurusan'] ?></td>
                  <td><?php echo $data2['jenis_kelamin'] ?></td>
                  <td><?php echo $data2['agama'] ?></td>
                  <td><?php echo $data2['alamat'] ?></td>
                  <td><?php echo $data2['gol_dar'] ?></td>
                  <td><?php echo $data2['no_hp'] ?></td>
                  <td><?php echo $data2['ortu_wali'] ?></td>
                  <td><?php echo $data2['no_hp_ortu'] ?></td>
                  <td><?php echo $data2['tanggal_lahir'] ?></td>
                  <td><?php echo $data2['password'] ?></td>
                  <td><?php echo $data2['status'] ?></td>
                  <td><a href="?modul=edit_user&id_user=<?php echo $data2['id_user'] ?>" class="btn btn-success fa fa-edit"> Edit User</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Foto</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Fakultas</th>
                  <th>Jurusan</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Golongan Darah</th>
                  <th>Nomor HP</th>
                  <th>Orang Tua / Wali</th>
                  <th>No HP Orang Tua / Wali</th>
                  <th>Tanggal Lahir</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Aksi</th>
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

$teri="SELECT * from user where id_user='$idu'";
$terima=mysqli_query($connect,$teri);
$terimas=mysqli_fetch_array($terima);

$email=$terimas['email'];
$password=$terimas['password'];

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
$mail->Subject = 'Akun Telah Dibuka';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Terima Kasih Atas Pendaftarannya, NIM yang anda inputkan telah sesuai..</h1>
<p>Ini Adalah Password Akun anda :</p>
<p>$password</p>
<p>Jagalah Kerahasiaan Akun Anda...</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}

echo "<script>alert('Akun Telah Dibuka...');document.location='?modul=kelola_user'</script>";
}

// batas 

if(isset($_GET['id_usera'])){
$idu=$_GET['id_usera'];

$tola="SELECT * from user where id_user='$idu'";
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
$mail->Subject = 'Akun Telah Ditolak';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "
<h1>Maaf Atas Ketidaknyamanannya, NIM yang anda inputkan tidak sesuai..</h1>
<p>Silahkan Untuk Membuat Akun Kembali Dengan NIM yang Benar..</p>
<h3>Salam Hangat Dari Apartemen UNSRI : ) </h3>
</body>";
$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
    print 'Pesan tidak dapat dikirim.';
    print 'Mailer Error: ' . $mail->ErrorInfo;
}else{
$tutup="DELETE FROM user WHERE id_user='$idu'";
$tutups = mysqli_query($connect,$tutup);   

}

echo "<script>alert('Akun Telah Dibatalkan...');document.location='?modul=kelola_user'</script>";
}
?>          