<div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Buat User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post">
              <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIM">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Email">
                  </div>
                  <input type="submit" name="daftar" value="daftar" class="btn btn-success">
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<?php          
if(isset($_POST['daftar'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = acakangkahuruf(8);
$foto = "../assets/foto_user/defaul.png";
$role = "mahasiswa";
$status = "belum lengkap";

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
}else{

$query1="INSERT INTO user (nim,nama,email,password,foto_profil,role,status) VALUES('$nim','$nama','$email','$password','$foto','$role','$status')";
$hasil = mysqli_query($connect,$query1);
}

echo "<script>alert('Akun Telah Dibuka...');document.location='?modul=kelola_user'</script>";


}
?>          