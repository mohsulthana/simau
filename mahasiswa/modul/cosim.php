<?php

// CEK APAKAH IA SUDAH MEMILIKI KAMAR ATAU BELUM
$id = $_SESSION['id_user'];

$kamar = "SELECT * FROM kamar_sewa WHERE id_user='".$id."'";
$sql = mysqli_query($connect, $kamar);
$arr = mysqli_fetch_array($sql);
if (isset($arr)) {
  echo "<script>alert('Anda sudah memiliki kamar')</script>";
  echo "<script>location.href = 'http://localhost/simau/mahasiswa/index.php'</script>";
  exit;
}

	// CEK APAKAH ADA DATA PRIBADI
	$data_pribadi = "SELECT * from data_pribadi where id_user='$id'";
	$sql = mysqli_query($connect, $data_pribadi);
	$arr = mysqli_fetch_all($sql);
	
	// DATA PRIBADI ADA, DAN TEPAT 1
	if(count($arr) == 1)
	{
		// RAW ADALAH DATA UNTUK PROSES COSIM
		// PRA-PROSES RAW, KELUAR NILAI ARR DARI ARRAY
		$raw = [];
		foreach ($arr as $value) {
			foreach ($value as $key => $value2) {
				$raw[$key] = $value2;
			}
		}
	}
	// DATA PRIBADI BELUM ADA, MAKA REDIRECT KE MODUL DATA PRIBADI
	else if(count($arr) == 0)
	{
		// BEGIN DUMP 1
		// // NILAI $_POST DARI FORM
		// $post_arr = [
		// 	$_POST["mendengkur"],
		// 	$_POST["merokok"],
		// 	$_POST["gelap"],
		// 	$_POST["peliharaan"],
		// 	$_POST["membaca"],
		// 	$_POST["menulis"],
		// 	$_POST["belajar"],
		// 	$_POST["game"],
		// 	$_POST["makan"],
		// 	$_POST["hangout"]
		// ];

		// // CONVERT NILAI $_POST JADI 0 DAN 1 JIKA FALSE DAN TRUE
		// $raw = [];
		// foreach ($post_arr as $key => $value) {
		// 	if($value == 'true')
		// 		$raw[$key] = 1;
		// 	else
		// 		$raw[$key] = 0;
		// }
		// END DUMP 1

		// BEGIN DUMP 2
		
		// if(
		// 	!isset($_POST["mendengkur"]) 	||
		// 	!isset($_POST["merokok"]) 		||
		// 	!isset($_POST["gelap"]) 		||
		// 	!isset($_POST["peliharaan"]) 	||
		// 	!isset($_POST["membaca"]) 		||
		// 	!isset($_POST["menulis"]) 		||
		// 	!isset($_POST["belajar"]) 		||
		// 	!isset($_POST["game"]) 			||
		// 	!isset($_POST["makan"]) 		||
		// 	!isset($_POST["hangout"])
		// )
		// END DUMP 2
		$url = '?modul=data_pribadi';
		echo "<script>location.href = '$url'</script>";
	}
	
	// AMBIL SELURUH DATA PRIBADI DI DATABASE KECUALI USER SEKARANG
	// DATA REKOMENDASI SESUAI JENIS KELAMIN USER SEKARANG
	include"../koneksi.php";
	$idu=$_SESSION['id_user'];
	$jku=$_SESSION['jenis_kelamin'];

	// BEGIN DUMP 3
	// "SELECT * from data_pribadi where id_user!='$idu'";
	// END DUMP 3
	
	$query= "select data_pribadi.* from user
	inner join data_pribadi on data_pribadi.id_user = user.id_user
	where user.id_user!='$idu' and user.jenis_kelamin='$jku' and user.status='Penyewa'  ";

	$data_query=mysqli_query($connect,$query);
	$data=mysqli_fetch_all($data_query);
	
	// BEGIN DUMP 4
	// TAMBAHKAN ID USER KE AWAL DATA RAW
	// array_unshift($raw, $idu);
	// END DUMP 4
	
	// COSINE SIMILARITY

	// $arr1 = data pribadi id pertama
	// $arr2 = data pribadi id kedua
	function cosim($arr1, $arr2)
	{
		$sum1 = 0;
		$sum2 = 0;
		$sum3 = 0;

		foreach ($arr1 as $key => $value) {
			// INDEX 0 = ID ROW, TIDAK PERLU DIHITUNG
			// INDEX 1 = ID USER, TIDAK PERLU DIHITUNG
			if($key == 0 || $key == 1) 
				continue;
			else
			{
				$sum1 += $arr1[$key] * $arr2[$key];
				$sum2 += $arr1[$key] * $arr1[$key];
				$sum3 += $arr2[$key] * $arr2[$key];	
			}
		}
		// var_dump($sum1 / (sqrt($sum2) * sqrt($sum3))); exit;
		return $sum1 / (sqrt($sum2) * sqrt($sum3));
	}

	// HITUNG SIMILARITY
	// $data = nampung seluruh data pribadi
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


	// data_obj = data final setelah dihitung dan dicari tertinggi
	$data_obj = [];
	foreach ($data as $key => $value) {
		// INDEX 1 ADALAH ID USER, SEDANG INDEX 0 ADALAH ID ROW
		$data_obj[$key] = (Object)['id' => $value[1]]; 
		$data_obj[$key]->similarity = number_format((float)$similar[$key]*100, 2, '.', '').'%';
	}

	// SORT BESAR KE KECIL, TERHADAP SIMILARITY
	usort($data_obj, function($a, $b) {return ($a->similarity < $b->similarity);});
	
	// OPSIONAL JIKA INGIN DIBATASI JUMLAH ORANG YANG DITAMPILKAN
	$data = array_slice($data_obj, 0, 5);
	// $data = $data_obj;

	// AMBIL DATA TABLE USER
	$query="SELECT * from user";
	$data_query=mysqli_query($connect,$query);
	$user=mysqli_fetch_all($data_query,MYSQLI_ASSOC);

	// MASUKKIN NAMA USER KE VARIABEL $DATA_OBJ
	foreach ($data as $key => $value) {
		foreach ($user as $key_user => $value_user) {
			if($value_user['id_user'] == $value->id)
			{
				$data[$key]->nama = $value_user['nama'];
			}
		}
	}

	// AMBIL DATA KAMAR DARI TABLE KAMAR SEWA
	$query="SELECT distinct(id_kamar) from kamar_sewa";
	$data_query=mysqli_query($connect,$query);
	$list_kamar=mysqli_fetch_all($data_query,MYSQLI_ASSOC);

	$arr_kamar = [];
	foreach ($list_kamar as $key => $value) {
		$arr_kamar[$key] = $value['id_kamar'];
	}
	// AMBIL DATA USER DARI TABLE KAMAR SEWA
	$query="SELECT distinct(id_user) from kamar_sewa";
	$data_query=mysqli_query($connect,$query);
	$list_user=mysqli_fetch_all($data_query,MYSQLI_ASSOC);

	$arr_user = [];
	foreach ($list_user as $key => $value) {
		$arr_user[$key] = $value['id_user'];
	}
	foreach ($data as $key => $value) {
		// JIKA USER TIDAK ADA DI LIST KAMAR SEWA
		// ARTINYA BELOM SEWA KAMAR / PILIH KAMAR
		if(!in_array($value->id, $arr_user))
			$value->status = "Belum menyewa";
		else
			$value->status = "Sudah menyewa";
	}
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
          <h5 class="card-header">Rekomendasi kamar</h5>
          <div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Kecocokan</th>
						<th scope="col">Status</th>
						<th scope="col">Booking</th>
					</tr>
				</thead>
				<tbody>
				<?php $count = 1;
				foreach($data as $key => $value) {
					?>

					<tr>
						<th scope="row"><?= $count ?></th>
						<td><?= $value->nama ?></td>
						<td><?= $value->similarity ?></td>
						<td><?= $value->status ?></td>
						<?php
						// nambahken id_kamar di $value->butuh id kamar si mpunya nama
						?>
						<td>
					<form method="post">
					<input type="hidden" name="kamar" value="<?php echo $value->nama ?>">
					<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
					<input type="hidden" name="tanggal_tempa" value="<?php echo date('Y-m-d'); ?>">
					<input type="hidden" name="status_sewa" value="Menempa">	
							<input type="submit" value="Pilih Kamar" class="btn btn-success" name="tempa"/>
							</form>
						</td>
					</tr>
				<?php $count++;} ?>
				</tbody>
			</table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST['tempa'])){
	$idu=$id;
	$idm=$_POST['kamar'];

$x="SELECT * from user where nama='$idm'";
$y=mysqli_query($connect,$x);
$z=mysqli_fetch_array($y);

$nam=$z['id_user'];
	
$a="SELECT * from kamar_sewa join kamar on kamar.id_kamar=kamar_sewa.id_kamar join user on kamar_sewa.id_user=user.id_user where kamar_sewa.id_user='$nam'";
$b=mysqli_query($connect,$a);
$c=mysqli_fetch_array($b);

	$idk=$c['id_kamar'];
	$tempa=$_POST['tanggal_tempa'];
	$status=$_POST['status_sewa'];
	
	$query1="INSERT INTO temp_kamar_sewa(id_kamar,id_user,tanggal_tempa,status_sewa) VALUES('$idk','$idu','$tempa','$status')";
	$hasil = mysqli_query($connect,$query1);
	if($hasil) 
		{
			$sql1="UPDATE kamar set kapasitas=kapasitas-1 where id_kamar='$idk'";
			$sql2=mysqli_query($connect,$sql1);
			echo "<script>alert('Kamar Telah DiBooking, Silahkan Melakukan Pembayaran...');document.location='?modul=upload_bukti'</script>";      
		}
		else
		{
			mysqli_error($connect);
		}	
	}
?>
