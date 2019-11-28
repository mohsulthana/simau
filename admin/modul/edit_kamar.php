<?php
$id = $_GET['id_kamar'];

$query ="SELECT * FROM kamar WHERE id_kamar='$id'";
$que = mysqli_query($connect,$query);
$sql=mysqli_fetch_array($que);
?>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Kamar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post">
              <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Blok</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="blok">
                            <option <?php if( $sql['blok'] =='A'){echo "selected"; } ?>  value="A">A</option>
                            <option <?php if( $sql['blok'] =='B'){echo "selected"; } ?> value="B">B</option>
                            <option <?php if( $sql['blok'] =='C'){echo "selected"; } ?> value="C">C</option>
                            <option <?php if( $sql['blok'] =='D'){echo "selected"; } ?> value="D">D</option>
                            <option <?php if( $sql['blok'] =='E'){echo "selected"; } ?> value="E">E</option>
                            <option <?php if( $sql['blok'] =='F'){echo "selected"; } ?> value="F">F</option>
                          </select>
                        </div>
                </div>
                  <div class="form-group">
                        <label for="inputName2" class="col-sm-2 control-label">Lantai</label>

                        <div class="col-sm-12">
                          <select class="form-control" name="lantai">
                            <option <?php if( $sql['lantai'] =='1'){echo "selected"; } ?> value="1">1</option>
                            <option <?php if( $sql['lantai'] =='2'){echo "selected"; } ?> value="2">2</option>
                            <option <?php if( $sql['lantai'] =='3'){echo "selected"; } ?> value="3">3</option>
                            <option <?php if( $sql['lantai'] =='4'){echo "selected"; } ?> value="4">4</option>
                            <option <?php if( $sql['lantai'] =='5'){echo "selected"; } ?> value="5">5</option>
                          </select>
                        </div>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Kamar</label>
                    <input type="number" name="nomor" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nomor Kamar" value="<?php echo $sql['nomor'] ?>">
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

$b="UPDATE kamar set blok='$blok', lantai='$lantai', nomor='$nomor' where id_kamar='$id'";
$hasil = mysqli_query($connect,$b);

echo "<script>alert('Berhasil Mengedit Kamar...'); window.location = '?modul=kelola_kamar'</script>";
}
?>          