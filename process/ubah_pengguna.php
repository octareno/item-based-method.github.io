<?php
	if (ISSET($_GET['id']) AND ISSET($_POST['nama'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
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
		$query = 'UPDATE pengguna SET id_pekerjaan="'.$pekerjaan.'", nama="'.$nama.'", email="'.$email.'", no_hp="'.$telepon.'", jenis_kelamin="'.$jenis_kelamin.'", usia="'.$usia.'", range_usia="'.$range_usia.'" WHERE id_pengguna="'.$id.'"';
		if (mysqli_query($conn, $query)) {
		 	// Berhasil mengubah
		 	header('location: ../admin/pengguna.php?balasan=5&action=edit&id='.$id.'');
		} else {
			// Gagal mengubah
			header('location: ../admin/pengguna.php?balasan=6&action=edit&id='.$id.'');
		}
	}
?>