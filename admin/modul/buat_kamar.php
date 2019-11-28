<div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Buat Kamar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post">
              <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Blok</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="blok">
                            <option value="">Silahkan Pilih Blok</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                          </select>
                        </div>
                </div>
                  <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Lantai</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="lantai">
                            <option value="">Silahkan Pilih Lantai</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Jenis Kamar</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="jenis_kelamin">
                            <option value="">Silahkan Pilih Jenis Kamar</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Kamar</label>
                    <input type="number" name="nomor" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nomor Kamar">
                  </div>
                  <input type="submit" name="kamar" value="Submit Kamar" class="btn btn-success">
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<?php          
if(isset($_POST['kamar'])){
$blok = $_POST['blok'];
$lantai = $_POST['lantai'];
$nomor = $_POST['nomor'];
$jenis = $_POST['jenis_kelamin'];
$kapasitas = 2;

$query1="INSERT INTO kamar (blok,lantai,nomor,kapasitas,jenis_kelamin) VALUES('$blok','$lantai','$nomor','$kapasitas','$jenis')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Kamar Berhasil Dibuat...');document.location='?modul=kelola_kamar'</script>";
}
?>          