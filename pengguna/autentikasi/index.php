<?php 
	session_start();
  	// Mencegah kembali ke halaman Login sebelum melakukan Logout
  	if (ISSET($_SESSION['level'])) {
    	if ($_SESSION['level'] == 'admin') {
     		header('Location: ../../admin/index.php');
    	} elseif ($_SESSION['level'] == 'pengguna') {
    		header('Location: ../../pengguna/index.php');
    	}
  	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pak Ragil Hehe</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	</head>
	<body>
		
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" method="post" action="../../process/autentikasi.php">
						<span class="login100-form-title p-b-26">
							Travel Suka Piknik
						</span>
						<span class="login100-form-title p-b-48">
							<i class="zmdi zmdi-flight-takeoff"></i>
						</span>
						<!-- Notifikasi jika gagal login -->
						<?php 
							if (ISSET($_SESSION['error'])) {
								$msg = $_SESSION['error'];
								echo '<div class="alert alert-dismissible alert-danger" style="font-size:12px"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-exclamation-sign"></span>  '.$msg.'</div>';
							}
						?>
						<div class="wrap-input100 validate-input" data-validate="Email yang valid : a@b.c">
							<input class="input100" type="text" name="email">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Masukkan password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password">
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" type="submit" name="login">
									Login
								</button>
							</div>
						</div>

						<div class="text-center p-t-115">
							<span class="txt1">
								Ingin kembali ke halaman utama?
							</span>

							<a class="txt2" href="../../index.php">
								Kembali
							</a>
							
							<span class="txt1">
								Tidak punya akun?
							</span>

							<a class="txt2" href="registrasi.php">
								Registrasi
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		

		<div id="dropDownSelect1"></div>
		
	<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>
	<!--===============================================================================================-->
		<script>
			$(document).ready(function(){
		        $('.alert').fadeOut(2500,'swing');
		      });
		</script>
	</body>
</html>