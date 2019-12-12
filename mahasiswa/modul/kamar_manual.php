<?php
// SIMPAN JAWABAN DATA PRIBADI
if (isset($_POST['data_pribadi'])) {
  $data = [
    'mendengkur'  => $_POST['mendengkur'],
    'merokok'     => $_POST['merokok'],
    'gelap'       => $_POST['gelap'],
    'hewan'       => $_POST['hewan'],
    'membaca'     => $_POST['membaca'],
    'menulis'     => $_POST['menulis'],
    'belajar'     => $_POST['belajar'],
    'game'        => $_POST['game'],
    'makan'       => $_POST['makan'],
    'hangout'     => $_POST['hangout']
  ];
  $id = $_SESSION['id_user'];
  
  $sql = "INSERT INTO data_pribadi (id_user, mendengkur, merokok, gelap, hewan, membaca, menulis, belajar, game, makan, hangout) VALUES ('" . $id ."','" . $_POST['mendengkur'] . "', '" . $_POST['merokok'] . "', '" . $_POST['gelap'] . "', '" . $_POST['hewan'] . "', '" . $_POST['membaca'] ."', '" . $_POST['menulis'] ."', '" . $_POST['belajar'] . "', '" . $_POST['game'] . "', '" . $_POST['makan'] . "', '" . $_POST['hangout'] . "')";
  if (mysqli_query($connect, $sql)) {
    echo "<script>alert('Data berhasil ditambah')</script>";

  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn); exit;
  }
}

// validate data pribadi
$id = $_SESSION['id_user'];
$data_pribadi = "SELECT data_pribadi.id_user FROM data_pribadi INNER JOIN user ON data_pribadi.id_user = $id";
$sql = mysqli_query($connect, $data_pribadi);
$arr = mysqli_fetch_array($sql);

if ($arr === NULL) {
  echo "<script>location.href = 'http://localhost/simau/mahasiswa/index.php?modul=data_pribadi'</script>";
}
?>


<h4>Pilih Kamar Secara Manual</h4>
<h5 style="color: red">*Note : Jika Kapasitas Penuh Namun Tidak Ada Info Kamar, Maka Kapasitas Tersebut Sedang Dibooking User Lain...</h5>
<br/>

<div class="row">
<?php
$gender=$_SESSION['jenis_kelamin'];
$page = (isset($_GET['page']))? $_GET['page'] : 1;
                    
                    $limit = 8; // Jumlah data per halamannya
                    
                    // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                    $limit_start = ($page - 1) * $limit;
$sql="SELECT * FROM kamar where jenis_kelamin='$gender' order by blok ASC LIMIT ".$limit_start.",".$limit;
$query=mysqli_query($connect,$sql);
$no = $limit_start + 1; // Untuk penomoran tabel
while($data = mysqli_fetch_array($query)){
?>
<div class="col-lg-3">
            <div 
            <?php if($data['jenis_kelamin']=="Laki-laki"){ ?>
            class="card card-success"
            <?php }else{ ?>
              class="card card-danger"
          <?php } ?>
            >
              <div class="card-header">
                <h3 class="card-title"><?php echo $data['blok']?>.<?php echo $data['lantai']?>.<?php echo $data['nomor']?></h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Info Kamar : <br/>
                <?php
                $id=$data['id_kamar'];
                $sql1="SELECT * FROM kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar.id_kamar='$id'";
                $query1=mysqli_query($connect,$sql1);
while($data1 = mysqli_fetch_array($query1)){
?>              
                 (<i class="fa fa-user"> <?php echo $data1['nama'] ?></i>) 
<?php } ?>

                <br>Kapasitas : <?php echo $data['kapasitas']?> Orang
                <form method="post">
                  <input type="hidden" name="id_kamar" value="<?php echo $data['id_kamar'] ?>">
                  <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                  <input type="hidden" name="tanggal_tempa" value="<?php echo date('Y-m-d'); ?>">
                  <input type="hidden" name="status_sewa" value="Menempa">
                  <center>
                  <?php
                  if($data['kapasitas'] == 0){
                  ?>  
                  <input type="submit" disabled="disabled" value="Penuh" 
                  <?php if($data['jenis_kelamin']=="Laki-laki"){ ?>
                  class="btn btn-success"
                  <?php } else {?>
                  class="btn btn-danger"  
                  <?php } ?> 
                  name="tempa">
                  <?php } else {?>
                   <input type="submit" value="Pilih Kamar" 
                   <?php if($data['jenis_kelamin']=="Laki-laki"){ ?>
                  class="btn btn-success"
                  <?php } else {?>
                  class="btn btn-danger"  
                  <?php } ?>
                  name="tempa"> 
                  <?php } ?>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

<?php } ?>
</div>
<center>
        <div class="pagination">
                <!-- LINK FIRST AND PREV -->
                <?php
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                ?>
                    <a href="#">First</a>
                    <a href="#">&laquo;</a>
                <?php
                }else{ // Jika page bukan page ke 1
                    $link_prev = ($page > 1)? $page - 1 : 1;
                ?>
                    <a href="?modul=kamar_manual&page=1">First</a>
                    <a href="?modul=kamar_manual&page=<?php echo $link_prev; ?>">&laquo;</a>
                <?php
                }
                ?>
                
                <!-- LINK NUMBER -->
                <?php
                
                // Buat query untuk menghitung semua jumlah data
                $sql2 = mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM kamar");
                $get_jumlah = mysqli_fetch_array($sql2);
                
                $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                $jumlah_number = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                
                for($i = $start_number; $i <= $end_number; $i++){
                    $link_active = ($page == $i)? 'class="active"' : '';
                ?>
                    <a <?php echo $link_active; ?> href="?modul=kamar_manual&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php
                }
                ?>
                
                <!-- LINK NEXT AND LAST -->
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $jumlah_page){ // Jika page terakhir
                ?>
                    <a href="#">&raquo;</a>
                    <a href="#">Last</a>
                <?php
                }else{ // Jika Bukan page terakhir
                    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                ?>
                    <a href="?modul=kamar_manual&page=<?php echo $link_next; ?>">&raquo;</a>
                    <a href="?modul=kamar_manual&page=<?php echo $jumlah_page; ?>">Last</a>
                <?php
                }
                ?>
          </div>
        </center>
<?php
if(isset($_POST['tempa'])){
$idu=$_POST['id_user'];
$idk=$_POST['id_kamar'];
$tempa=$_POST['tanggal_tempa'];
$status=$_POST['status_sewa'];

$query1="INSERT INTO temp_kamar_sewa(id_kamar,id_user,tanggal_tempa,status_sewa) VALUES('$idk','$idu','$tempa','$status')";
$hasil = mysqli_query($connect,$query1);
if($hasil) 
  {
    $sql1="UPDATE kamar set kapasitas=kapasitas-1 where id_kamar='$idk'";
    $sql2=mysqli_query($connect,$sql1);
    echo "<script>alert('Kamar Telah DiBooking, Silahkan Melakukan Pembayaran...');document.location='index.php'</script>";      
  }

}
?>