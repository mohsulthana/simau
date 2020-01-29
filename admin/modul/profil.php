<?php
$id = $_SESSION['id_user'];
$status = $_SESSION['status'];

$conn = new User();

$query = $conn->Profil($id);
$sql = $query->fetch_array();

?>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $sql['foto_profil']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $sql['nama']; ?></h3>

                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Role Akun</b> <a class="float-right"><?php echo $sql['role']; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Diri</a></li>
                  <?php if($_SESSION['status'] == 'belum lengkap'){ ?>
                  <li class="nav-item"><a style="color: red" class="nav-link" href="#lengkap" data-toggle="tab">Lengkapi Data Diri *</a></li>
                <?php } else { ?>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Data Diri</a></li>
                <?php } ?>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <h3>Data Diri Lainnya : </h3>
                     <span>Username :  <?php echo $sql['nim']; ?></span><br><br>
                     <span>Password :  <?php echo $sql['password']; ?></span><br><br>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="lengkap">
                    <form class="form-horizontal" method="post">
                      <input type="hidden" name="id_user" value="<?php echo $sql['id_user']; ?>">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Fakultas</label>

                        <div class="col-sm-10">
                          <select id="fakultas" class="form-control" name="fakultas">
                                                <option value="">Silahkan Pilih Fakultas</option>
                                                <?php

                                                    $query1 = $conn->pickFakultas() ;
                                                    while ($row1 = $query1->fetch_assoc()) { ?>

                                                    <option value="<?php echo $row1['fakultas']; ?>">
                                                        <?php echo $row1['fakultas']; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Jurusan</label>

                        <div class="col-sm-10">
                          <select id="jurusan" class="form-control" name="jurusan">
                            <option value="">Silahkan Pilih Jurusan</option>
                                                <?php
                                                    $query2 = $conn->pickJurusan();
                                                    while ($row2 = $query2->fetch_assoc()) { ?>

                                                    <option id="jurusan" class="<?php echo $row2['fakultas']; ?>" value="<?php echo $row2['jurusan']; ?>">
                                                        <?php echo $row2['jurusan']; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                        </div>
                      </div>

                      <div class="col-sm-10">
                      <div class="form-group">
                  <label>Tanggal Lahir : </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" name="tanggal_lahir" class="form-control">
                  
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                </div>

                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Agama</label>

                        <div class="col-sm-10">
                          <select class="form-control" name="agama">
                            <option value="">Silahkan Pilih Agama</option>
                            <option value="islam">Islam</option>
                            <option value="buddha">Buddha</option>
                            <option value="kristen">Kristen</option>
                            <option value="katholik">Katholik</option>
                            <option value="hindu">Hindu</option>
                            <option value="kong fu chu">Kong fu chu</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Jenis Kelamin</label>

                        <div class="col-sm-10">
                          Laki-laki &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="jenis_kelamin" value="Laki-laki"><br>
                          Perempuan &nbsp&nbsp<input type="radio" name="jenis_kelamin" value="Perempuan">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Alamat" name="alamat"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Golongan Darah</label>

                        <div class="col-sm-10">
                          <select class="form-control" name="gol_dar">
                            <option value="">Silahkan Pilih Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Nomor HP</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Nomor HP" name="no_hp">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Orang Tua / Wali</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Orang Tua / Wali" name="ortu_wali">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Nomor HP Orang Tua / Wali</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Nomor HP Orang Tua / Wali" name="no_hp_ortu">
                        </div>
                      </div>
                      <input type="hidden" value="lengkap" name="status">
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="lengkap" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_user" value="<?php echo $sql['id_user']; ?>">
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="NIM" name="nim" value="<?php echo $sql['nim']; ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="password" name="password" value="<?php echo $sql['password']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Foto Profil</label>

                        <div class="col-sm-10">
                          <img src="<?php echo $sql['foto_profil']; ?>" width="100px" height="100px"> <span style="color: red">* Foto Lama Anda</span> 
                          <input type="file" class="form-control" id="inputName2" name="foto_profil">
                        </div>
                        <br>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="edit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>

                      </div>
                    </form>
                  </div>


                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
<?php
if(isset($_POST['lengkap'])){

$a=$_POST['id_user'];
$b=$_POST['fakultas'];
$c=$_POST['jurusan'];
$d=date("Y-m-d", strtotime($_POST['tanggal_lahir']));
$e=$_POST['agama'];
$f=$_POST['jenis_kelamin'];
$g=$_POST['alamat'];
$h=$_POST['gol_dar'];
$i=$_POST['no_hp'];
$j=$_POST['ortu_wali'];
$k=$_POST['no_hp_ortu'];
$l=$_POST['status'];

$hasil = $conn->lengkapProfil($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l);

echo "<script>alert('Anda Telah Melengkapi Data Diri...'); window.location = '../logout.php'</script>";
}

if(isset($_POST['edit'])){

$idu=$_POST['id_user'];
$nim=$_POST['nim'];
$password=$_POST['password'];

$lokasi_file=$_FILES['foto_profil']['tmp_name'];
  $nama_file=basename($_FILES['foto_profil']['name']);

  $q="../assets/foto_user/$nama_file";

  if(move_uploaded_file($lokasi_file, "$q"))
    {
$b="UPDATE user set nim='$nim',password='$password',foto_profil='$q' where id_user='$idu'";
$hasil = mysqli_query($connect,$b);

echo "<script>alert('Anda Telah Melengkapi Data Diri...');document.location='../logout.php'</script>";
}
else
{
$b="UPDATE user set nim='$nim',password='$password' where id_user='$idu'";
$hasil = mysqli_query($connect,$b);

echo "<script>alert('Anda Telah Melengkapi Data Diri...');;document.location='../logout.php'</script>";

}

}  
?>
