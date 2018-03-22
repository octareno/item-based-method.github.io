<?php 
	if (ISSET($_GET['id'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
		// Mengecek apakah pengguna terdapat pada tabel riwayat. Jika ada maka hapus terlebih dahulu
		$query = mysqli_query($conn, 'SELECT id_pengguna FROM riwayat WHERE id_pengguna='.$id.'');
		if (mysqli_num_rows($query) > 0) {
			$query = 'DELETE FROM riwayat WHERE id_pengguna='.$id.'';
			$query = mysqli_query($conn, $query);
			// Menghapus data pada tabel pengguna
			$query = 'DELETE FROM pengguna WHERE id_pengguna='.$id.'';
			if (mysqli_query($conn, $query)) {
				// Berhasil menghapus
				header('location: ../admin/pengguna.php?balasan=3');
			} else {
				// Gagal menghapus
				header('location: ../admin/pengguna.php?balasan=4');
			}
		} else {
			// Data pengguna tidak terdapat pada tabel riwayat
			$query = 'DELETE FROM pengguna WHERE id_pengguna='.$id.'';
			if (mysqli_query($conn, $query)) {
				// Berhasil menghapus
				header('location: ../admin/pengguna.php?balasan=3');
			} else {
				// Gagal menghapus
				header('location: ../admin/pengguna.php?balasan=4');
			}
		}
	}
?>