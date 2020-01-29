<?php
$query="SELECT * from kamar where jenis_kelamin='Laki-laki'";
$sql=mysqli_query($connect,$query);

$query1="SELECT * from kamar where jenis_kelamin='Perempuan'";
$sql1=mysqli_query($connect,$query1);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kamar Apartemen UNSRI(Laki-laki)</h3><br/>
            
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Blok Kamar</th>
                  <th>Lantai</th>
                  <th>Nomor</th>
                  <th>Kapasitas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['blok'] ?></td>
                  <td><?php echo $data['lantai'] ?></td>
                  <td><?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['kapasitas'] ?></td>
                  <td>
                    <?php if($data['kapasitas'] < 2){ ?>
                    <a href="?modul=lihat_penyewa&id_kamar=<?php echo $data['id_kamar'] ?>" class="btn btn-primary fa fa-eye"> Lihat Penyewa</a>
                  <?php } else {?>

                  <?php } ?>  
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Blok Kamar</th>
                  <th>Lantai</th>
                  <th>Nomor</th>
                  <th>Kapasitas</th>
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
              <h3 class="card-title">Data Kamar Apartemen UNSRI(Perempuan)</h3><br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Blok Kamar</th>
                  <th>Lantai</th>
                  <th>Nomor</th>
                  <th>Kapasitas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data1=mysqli_fetch_array($sql1)){ ?>
                <tr>
                  <td><?php echo $data1['blok'] ?></td>
                  <td><?php echo $data1['lantai'] ?></td>
                  <td><?php echo $data1['nomor'] ?></td>
                  <td><?php echo $data1['kapasitas'] ?></td>
                  <td><?php if($data1['kapasitas'] < 2){ ?>
                    <a href="?modul=lihat_penyewa&id_kamar=<?php echo $data1['id_kamar'] ?>" class="btn btn-primary fa fa-eye"> Lihat Penyewa</a>
                  <?php } else {?>

                  <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Blok Kamar</th>
                  <th>Lantai</th>
                  <th>Nomor</th>
                  <th>Kapasitas</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<?php          
if(isset($_GET['id_kamar'])){
$idk=$_GET['id_kamar'];

$tutup="DELETE FROM kamar WHERE id_kamar='$idk'";
$tutups = mysqli_query($connect,$tutup);   

echo "<script>alert('Kamar Telah Dihapus...');document.location='?modul=kelola_kamar'</script>";

}
?>          