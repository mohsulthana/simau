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
						<li><a href="buat_akun.php">Buat Akun</a></li>
						<li class="btn-cta"><a href="login_admin.php"><span>Login Admin</span></a></li>
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
										<h3 style="text-align: center">Login Admin</h3>
										<div class="tab-content-inner active" data-content="signup">
											<form method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Username</label>
														<input type="text" class="form-control" id="username" name="nim">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Password</label>
														<input type="password" class="form-control" id="password" name="password">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Masuk" name="login">
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
	
	
	
	


	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About <span class="footer-logo">Splash<span>.<span></span></h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Links</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Knowledge Base</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Terms of services</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@FreeHTML5.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://FreeHTML5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<?php
//script login

if(isset($_POST['login'])){
$nim = $_POST['nim'];
$password = $_POST['password'];

if (empty($nim) && empty($password)) {
  echo "<script>alert('Username & Password Salah');document.location='index.php'</script>";

} else if (empty($nim)) {
  echo "<script>alert('Username Salah');document.location='index.php'</script>";

} else if (empty($password)) {
  echo "<script>alert('Password Salah');document.location='index.php'</script>";
}

$query="SELECT * from user where nim='$nim' and password='$password'";
$hasil=mysqli_query($connect,$query);
$has=mysqli_fetch_array($hasil);

if (mysqli_num_rows($hasil) == 1) {
  $_SESSION['id_user']        	= $has['id_user'];
  $_SESSION['nim']         		= $has['nim'];
  $_SESSION['nama']       		= $has['nama'];
  $_SESSION['email']       		= $has['email'];
  $_SESSION['fakultas']  		= $has['fakultas'];
  $_SESSION['jurusan']  		= $has['jurusan'];
  $_SESSION['password']         = $has['password'];
  $_SESSION['agama']          	= $has['agama'];
  $_SESSION['alamat']          	= $has['alamat'];
  $_SESSION['gol_dar']          = $has['gol_dar'];
  $_SESSION['no_hp']        	= $has['no_hp'];
  $_SESSION['ortu_wali']     	= $has['ortu_wali'];
  $_SESSION['no_hp_ortu']       = $has['no_hp_ortu'];
  $_SESSION['foto_profil']      = $has['foto_profil'];
  $_SESSION['role']         	= $has['role'];
  $_SESSION['status']         	= $has['status'];
  $_SESSION['tanggal_lahir']	= $has['tanggal_lahir'];
  

  if($has['role']=="admin")
  {
    echo "<script>document.location='admin/index.php'</script>";
  }
  else
  {
    echo "<script>alert('Maaf, Anda Bukan Admin...');document.location='index.php'</script>";
  }
  
}
  else
  {
  echo "<script>alert('Username dan Password Salah');document.location='index.php'</script>";
  }
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

