<?php
session_start();
include"koneksi.php";
include"acak.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Splash &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/login_tools/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/login_tools/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="assets/login_tools/css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/login_tools/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="assets/login_tools/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="assets/login_tools/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/login_tools/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/login_tools/css/style.css">

	<!-- Modernizr JS -->
	<script src="assets/login_tools/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">SIMAU<em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="index.php">Login Mahasiswa</a></li>
						<li  class="btn-cta"><a href="buat_akun.php"><span>Buat Akun</span></a></li>
						<li><a href="login_admin.php">Login Admin</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(assets/login_tools/images/6.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Selamat Datang Di</span>
							<h1>SISTEM INFORMASI APARTEMEN UNSRI</h1>	
						</div>
						<div class="col-md-5 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">	
									<div class="tab-content">
										<h3 style="text-align: center">Buat Akun</h3>
										<div class="tab-content-inner active" data-content="signup">

											<form method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">NIM </label>
														<input type="text" class="form-control" id="username" name="nim">
													</div>
												
												
													<div class="col-md-12">
														<label for="password">Nama</label>
														<input type="text" class="form-control" id="password" name="nama">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password2">Email</label>
														<input type="email" class="form-control" id="password2" name="email">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Daftar" name="daftar">
													</div>
												</div>
											</form>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<?php
if(isset($_POST['daftar'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = acakangkahuruf(8);
$foto = "../assets/foto_user/defaul.png";
$role = "mahasiswa";
$status = "belum lengkap";

$query1="INSERT INTO user (nim,nama,email,password,foto_profil,role,status) VALUES('$nim','$nama','$email','$password','$foto','$role','$status')";
$hasil = mysqli_query($connect,$query1);

echo "<script>alert('Akun Telah Dibuat, Silahkan Menunggu Verifikasi Admin. Melalui Email Anda..');document.location='index.php'</script>"; 

}
    ?>

	<!-- jQuery -->
	<script src="assets/login_tools/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/login_tools/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/login_tools/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/login_tools/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="assets/login_tools/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="assets/login_tools/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="assets/login_tools/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/login_tools/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="assets/login_tools/js/main.js"></script>

	</body>
</html>

