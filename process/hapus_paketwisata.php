<?php 
	if (ISSET($_GET['id'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
		// Mengecek apakah paket wisata terdapat pada tabel riwayat. Jika ada maka hapus terlebih dahulu
		$query = mysqli_query($conn, 'SELECT id_paket FROM riwayat WHERE id_paket='.$id.'');
		if (mysqli_num_rows($query) > 0) {
			$query = 'DELETE FROM riwayat WHERE id_paket='.$id.'';
			$query = mysqli_query($conn, $query);
			// Menghapus data pada tabel paket
			$query = 'DELETE FROM paket WHERE id_paket='.$id.'';
			if (mysqli_query($conn, $query)) {
				// Berhasil menghapus
				header('location: ../admin/paketwisata.php?balasan=3');
			} else {
				// Gagal menghapus
				header('location: ../admin/paketwisata.php?balasan=4');
			}
		} else {
			// Data paket tidak terdapat pada tabel riwayat
			$query = 'DELETE FROM paket WHERE id_paket='.$id.'';
			if (mysqli_query($conn, $query)) {
				// Berhasil menghapus
				header('location: ../admin/paketwisata.php?balasan=3');
			} else {
				// Gagal menghapus
				header('location: ../admin/paketwisata.php?balasan=4');
			}
		}
	}
?>