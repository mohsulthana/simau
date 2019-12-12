<?php

	// NILAI $_POST DARI FORM
	$post_arr = [
		$_POST["mendengkur"],		
		$_POST["merokok"],		
		$_POST["gelap"],
		$_POST["peliharaan"],		
		$_POST["membaca"],		
		$_POST["menulis"],	
		$_POST["belajar"],
		$_POST["game"],
		$_POST["makan"],
		$_POST["hangout"]
	];
			
	// CONVERT NILAI $_POST JADI 0 DAN 1 JIKA FALSE DAN TRUE
	$raw = [];
	foreach ($post_arr as $key => $value) {
		if($value == 'true')
			$raw[$key] = 1;
		else
			$raw[$key] = 0;
	}
	// AMBIL SELURUH DATA PRIBADI DI DATABASE KECUALI USER SEKARANG
	include"../koneksi.php";
	$idu=$_SESSION['id_user'];
	$query="SELECT * from data_pribadi INNER JOIN user ON user.id_user = data_pribadi.id_user where data_pribadi.id_user!='$idu'";
	$data_query=mysqli_query($connect,$query);
	$data	=	mysqli_fetch_assoc($data_query);

	// TAMBAHKAN ID USER KE AWAL DATA RAW
	array_unshift($raw, $idu);

	// COSINE SIMILARITY
	function cosim($arr1, $arr2)
	{
		$sum1 = 0;
		$sum2 = 0;
		$sum3 = 0;

		foreach ($arr1 as $key => $value) {
			if($key == 0) // INDEX 0 = ID, TIDAK PERLU DIHITUNG
				continue;
			else
			{
				$sum1 += $arr1[$key] * $arr2[$key];
				$sum2 += $arr1[$key] * $arr1[$key];
				$sum3 += $arr2[$key] * $arr2[$key];	
			}
		}

		return $sum1 / (sqrt($sum2) * sqrt($sum3));
	}

	// HITUNG SIMILARITY
	$similar = [];

	foreach ($data as $key => $value) {
		$similar[$key] = cosim($value,$raw);
	}

	// CARI NILAI SIMILARITY TERTINGGI
	$max = -1*INF;
	$index = 0;
	foreach ($similar as $key => $value) {
		if($value >= $max)
		{
			$max = $value;
			$index = $key;
		}
	}

	$data_obj = [];
	foreach ($data as $key => $value) {
		$data_obj[$key] = (Object)['id' => $value[0]];
		$data_obj[$key]->similarity = number_format((float)$similar[$key]*100, 2, '.', '').'%';
	}

	echo "<pre>";
	usort($data_obj, function($a, $b) {return ($a->similarity < $b->similarity);});
	$data = array_slice($data_obj, 0, 5);
	// print_r($data); exit;
	echo "</pre>";
?>

<?php
  

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Rekomendasi | SIMAU</title>
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
          <h5 class="card-header">Pertanyaan rekomendasi</h5>
          <div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama</th>
										<th scope="col">Kemiripan</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($data as $key => $value) {?>
									<tr>
										<th scope="row">1</th>
										<td><?= $value->nama ?></td>
										<td><?= $value->similarity ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
