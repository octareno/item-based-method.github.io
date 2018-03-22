<?php 
	include 'connect_db.php';
	session_start();
	if (ISSET($_POST['login'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$query = mysqli_query($conn, "SELECT * FROM admin WHERE email='".$email."' AND password='".$password."'");
		if (mysqli_num_rows($query) > 0) {
			// Jika terdaftar sebagai Admin
			$data = mysqli_fetch_assoc($query);
			$_SESSION['id_pengguna'] = $data['id_admin'];
			$_SESSION['level'] = 'admin';
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			header('location: ../admin/index.php');
		} else {
			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE email='".$email."' AND password='".$password."'");
			if (mysqli_num_rows($query) > 0) {
				// Jika terdaftar sebagai Pengguna
				$data = mysqli_fetch_assoc($query);
				$_SESSION['id_pengguna'] = $data['id_pengguna'];
				$_SESSION['level'] = 'pengguna';
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header('location: ../pengguna/index.php');
			} else {
				// Jika tidak terdaftar
				$_SESSION['error'] = "<strong>Email</strong> atau <strong>Password</strong> salah";
				header("location: ../pengguna/autentikasi/index.php");
			}
		}
	}
?>