<?php 
	if (ISSET($_POST['registrasi'])) {
		include 'connect_db.php';
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$konfirm_password = md5($_POST['konfirm_password']);
		if ($password !== $konfirm_password) {
			// Password dan konfirmasi password berbeda
			header('location: ../pengguna/autentikasi/registrasi.php?balasan=3');
		} else {
			$telepon = $_POST['telepon'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$usia = $_POST['usia'];
			$pekerjaan = $_POST['pekerjaan'];
			if ($usia >= 16 AND $usia <= 25) {
				$range_usia = '16 s/d 25';
			} elseif ($usia >= 26 AND $usia <= 35) {
				$range_usia = '26 s/d 35';
			} else {
				$range_usia = '> 35';
			}
			$query = "INSERT INTO pengguna(id_pekerjaan, nama, email, password, no_hp, jenis_kelamin, usia, range_usia) VALUES('$pekerjaan','$nama','$email','$password','$telepon','$jenis_kelamin','$usia','$range_usia')";
			if (mysqli_query($conn, $query)) {
			 	// Berhasil registrasi
			 	header('location: ../pengguna/autentikasi/registrasi.php?balasan=1');
			} else {
				// Gagal registrasi
				header('location: ../pengguna/autentikasi/registrasi.php?balasan=2');
			}
		}
	}
?>