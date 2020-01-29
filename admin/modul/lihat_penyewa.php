<?php
$id=$_GET['id_kamar'];

$query="SELECT * from kamar join kamar_sewa on kamar.id_kamar=kamar_sewa.id_kamar where kamar.id_kamar='$id'";
$sql=mysqli_query($connect,$query);
$data=mysqli_fetch_array($sql);
?>
<h3>Info Penyewa Kamar</h3>
<div class="col-lg-12">
            <div 
            <?php if($data['jenis_kelamin']=='Laki-laki'){ ?>
            class="card card-success"
          <?php } else {?>
            class="card card-danger"
          <?php } ?>  
            >
              <div class="card-header">
                <h3 class="card-title">Yang Menyewa Kamar <?php echo $data['blok'] ?>.<?php echo $data['lantai'] ?>.<?php echo $data['nomor'] ?></h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
Info Penyewa: <br/>
<?php
                $idk=$data['id_kamar'];
                $sql1="SELECT * FROM kamar_sewa join kamar on kamar_sewa.id_kamar=kamar.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar.id_kamar='$idk'";
                $query1=mysqli_query($connect,$sql1);
                
?>
<table class="table table-bordered table-striped">
  <tr>
    <th>Nama</th>
    <th>NIM</th>
  </tr>
  <?php while($data1 = mysqli_fetch_array($query1)){ ?>
  <tr>
    <td><span class="fa fa-user"> <?php echo $data1['nama'] ?></span></td>
    <td><?php echo $data1['nim'] ?></td>
  </tr>
<?php } ?>
</table>                                

<br/><br/>
<a href="?modul=kelola_kamar" class="btn btn-danger fa fa-arrow-left"> Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->