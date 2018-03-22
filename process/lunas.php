<?php 
	include 'connect_db.php';
	if (ISSET($_GET['id'])) {
		$id = $_GET['id'];
		$query = 'UPDATE riwayat SET status_pembayaran="Lunas" WHERE id_riwayat="'.$id.'"';
		if (mysqli_query($conn, $query)) {
			// Berhasil
			header('location: ../admin/riwayat.php?balasan=7');
		} else {
			// Gagal
			header('location: ../admin/riwayat.php?balasan=8');
		}
	}
?>