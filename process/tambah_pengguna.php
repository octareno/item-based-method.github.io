<?php 
	if (ISSET($_POST['nama'])) {
		include 'connect_db.php';
		$nama = $_POST['nama'];
		$email = $_POST['email'];
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
		$query = "INSERT INTO pengguna(id_pekerjaan, nama, email, no_hp, jenis_kelamin, usia, range_usia) VALUES('$pekerjaan','$nama','$email','$telepon','$jenis_kelamin','$usia','$range_usia')";
		if (mysqli_query($conn, $query)) {
		 	// Berhasil menambah
		 	header('location: ../admin/pengguna.php?balasan=1');
		} else {
			// Gagal menambah
			header('location: ../admin/pengguna.php?balasan=2');
		}
	}
?>