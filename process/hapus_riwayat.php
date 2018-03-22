<?php 
	if (ISSET($_GET['id'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
		$query = 'DELETE FROM riwayat WHERE id_riwayat="'.$id.'"';
		if (mysqli_query($conn, $query)) {
			// Berhasil menghapus
			header('location: ../admin/riwayat.php?balasan=3');
		} else {
			// Gagal menghapus
			header('location: ../admin/riwayat.php?balasan=4');
		}
	}
?>