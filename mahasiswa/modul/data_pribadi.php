<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pribadi | SIMAU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: blue;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/system_tools/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/system_tools/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card mt-5">
          <h5 class="card-header">Pertanyaan data pribadi</h5>
          <div class="card-body">
            <form action="">
              <ol>
                <li>
                  <p>Apakah anda ketika tidur mendengkur?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_mendengkur" name="mendengkur" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_mendengkur">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_mendengkur" name="mendengkur" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_mendengkur">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda adalah seorang perokok?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_merokok" name="merokok" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_merokok">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_merokok" name="merokok" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_merokok">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda tidur dalam keadaan lampu tidur yang gelap?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_gelap" name="gelap" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_gelap">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_gelap" name="gelap" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_gelap">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda menyukai hewan peliharaan (kucing, anjing dll)?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_peliharaan" name="peliharaan" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_peliharaan">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_peliharaan" name="peliharaan" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_peliharaan">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda memiliki hobi membaca?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_membaca" name="membaca" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_membaca">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_membaca" name="membaca" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_membaca">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda memiliki hobi menulis (karya tulis, cerpen dan lain-lain)?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_menulis" name="menulis" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_menulis">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_menulis" name="menulis" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_menulis">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda adalah orang yang suka belajar bersama?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_belajar" name="belajar" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_belajar">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_belajar" name="belajar" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_belajar">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda senang bermain game (game online maupun offline) bersama?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_game" name="game" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_game">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_game" name="game" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_game">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda suka makan bersama?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_makan" name="makan" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_makan">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_makan" name="makan" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_makan">Tidak</label>
                  </div>
                </li>
                <li>
                  <p>Apakah anda suka berjalan- jalan (hangout) bersama?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="ya_hangout" name="hangout" value="true" class="custom-control-input">
                    <label class="custom-control-label" for="ya_hangout">Ya</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="tidak_hangout" name="hangout" value="false" class="custom-control-input">
                    <label class="custom-control-label" for="tidak_hangout">Tidak</label>
                  </div>
                </li>
              </ol>
              <a href="#" style="float: right;" class="btn btn-primary" type="submit">Simpan jawaban</a>
              <a href="?modul=pilih_otomatis" style="float: right;" class="btn btn-primary-outline" type="submit">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>