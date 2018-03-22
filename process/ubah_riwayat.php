<?php 
	if (ISSET($_GET['id']) AND ISSET($_POST['nama'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
		$id_pengguna = $_POST['nama'];
		$orang = $_POST['jumlah_orang'];
		$hotel = $_POST['hotel'];
		$hari = $_POST['hari'];
		$tgl_pesan = $_POST['tgl_pesan'];
		$tgl_paket = $_POST['tgl_paket'];
		$status = $_POST['status'];

		// Melakukan klasifikasi paket yang sesuai
		$query = mysqli_query($conn, 'SELECT id_paket FROM paket WHERE hari="'.$hari.'" AND jumlah_orang="'.$orang.'" AND hotel_bintang="'.$hotel.'"');
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
			$id_paket = $data['id_paket'];
		}
		
		$query = 'UPDATE riwayat SET id_paket="'.$id_paket.'", id_pengguna="'.$id_pengguna.'", rencana_jumlah_orang="'.$orang.'", rencana_hotel="'.$hotel.'", rencana_hari="'.$hari.'", tanggal_pesan="'.$tgl_pesan.'", tanggal_paket="'.$tgl_paket.'", status_pembayaran="'.$status.'" WHERE id_riwayat="'.$id.'"';
		if (mysqli_query($conn, $query)) {
			// Berhasil mengubah
			header('location: ../admin/riwayat.php?balasan=5&action=edit&id='.$id.'');
		} else {
			// Gagal mengubah
			header('location: ../admin/riwayat.php?balasan=6&action=edit&id='.$id.'');
		}
	}
?>