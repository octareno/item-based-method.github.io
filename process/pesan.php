<?php 
	if (ISSET($_POST['pesan'])) {
		include 'connect_db.php';
		session_start();
		$orang = $_POST['jumlah_orang'];
		$hari = $_POST['hari'];
		$hotel = $_POST['hotel'];
		$id_pengguna = $_SESSION['id_pengguna'];
		date_default_timezone_set('Asia/Jakarta');
		$tgl_pesan = date('Y-m-d');
		$tgl_paket = $_POST['tgl_paket'];
		$status = 'Belum Lunas';

		$query = mysqli_query($conn, 'SELECT id_paket FROM paket WHERE hari="'.$hari.'" AND hotel_bintang="'.$hotel.'" AND jumlah_orang="'.$orang.'"');
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
			$id_paket = $data['id_paket'];
		}

		$query = "INSERT INTO riwayat(id_paket, id_pengguna, rencana_jumlah_orang, rencana_hotel, rencana_hari, tanggal_pesan, tanggal_paket, status_pembayaran) VALUES('$id_paket','$id_pengguna','$orang','$hotel','$hari','$tgl_pesan','$tgl_paket','$status')";
		if (mysqli_query($conn, $query)) {
			// Berhasil pesan
			header('location: ../pengguna/index.php?balasan=1');
		} else {
			// Gagal pesan
			header('location: ../pengguna/index.php?balasan=2');
		}
	}
?>