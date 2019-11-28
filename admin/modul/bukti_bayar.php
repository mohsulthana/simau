<?php
$query="SELECT * from bukti_bayar join user on bukti_bayar.id_user=user.id_user join kamar_sewa on bukti_bayar.id_kamar=kamar_sewa.id_kamar join kamar on kamar.id_kamar=kamar_sewa.id_kamar";
$sql=mysqli_query($connect,$query);
?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kumpulan Bukti Pembayaran Penyewa Apartemen UNSRI</h3><br/>
            
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>  
                <tr>
                  <th>Nama Penyewa</th>
                  <th>Kamar Yang Disewa</th>
                  <th>Tanggal Upload Bukti</th>
                  <th>Foto Bukti</th>
                </tr>
                </thead>
                <tbody>
                <?php while($data=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?></td>
                  <td><?php echo $data['tanggal_upload'] ?></td>
                  <td><a href="<?php echo $data['foto_bukti'] ?>" target="blank"><img src="<?php echo $data['foto_bukti'] ?>" width="100px" height="100px"></a></td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Penyewa</th>
                  <th>Kamar Yang Disewa</th>
                  <th>Tanggal Upload Bukti</th>
                  <th>Foto Bukti</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->