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
	$query="SELECT * from data_pribadi where id_user!='$idu'";
	$data_query=mysqli_query($connect,$query);
	$data=mysqli_fetch_all($data_query);

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
	print_r ($data_obj);
	echo "</pre>";
?>
