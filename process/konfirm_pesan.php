<?php 
	if (ISSET($_POST['hari'])) {
		// Menyimpan kumpulan data dan melakukan decode dari json ke php
		include 'connect_db.php';
		session_start();
		$orang = $_POST['orang'];
		$hotel = $_POST['hotel'];
		$hari = $_POST['hari'];
		$tgl_paket = $_POST['tgl_paket'];
		json_decode($orang);
		json_decode($hotel);
		json_decode($hari);
		json_decode($tgl_paket);
		date_default_timezone_set('Asia/Jakarta');
		$tgl_pesan = date('Y-m-d');
		$id_pengguna = $_SESSION['id_pengguna'];

		$data['orang'] = $orang;
		$data['hotel'] = $hotel;
		$data['hari'] = $hari;
		$data['tgl_paket'] = $orang;
		$data['tgl_pesan'] = $tgl_pesan;
		$data['id_pengguna'] = $id_pengguna;
		
		// Mendapatkan id paket
		$query = mysqli_query($conn, 'SELECT id_paket FROM paket WHERE hari="'.$hari.'" AND hotel_bintang="'.$hotel.'" AND jumlah_orang="'.$orang.'"');
		if (mysqli_num_rows($query) > 0) {
			$d = mysqli_fetch_assoc($query);
			$id_paket = $d['id_paket'];
		}
		$query = "INSERT INTO riwayat(id_paket, id_pengguna, rencana_jumlah_orang, rencana_hotel, rencana_hari, tanggal_pesan, tanggal_paket, status_pembayaran) VALUES('$id_paket','$id_pengguna','$orang','$hotel','$hari','$tgl_pesan','$tgl_paket','Belum Lunas')";
		if (mysqli_query($conn, $query)) {
			// Berhasil memesan paket
			$data['query'] = true;
		} else {
			// Gagal memesan paket
			$data['query'] = false;
		}

		/*$send = $_POST['tgl_paket'];
		json_decode($send);
		$data['send'] = $send;*/
		// Header json berfungsi agar data yang diparsing menjadi object dan dapat dipanggil selayaknya array assoc di php. Tanpa Header ini maka data yang diparsing masih berbentuk array javascript pada attribut DATA di AJAX
		header('Content-Type: application/json');
		// json_encode mengubah data menjadi json sehingga dapat melakukan pertukaran data antara web browser dengan server
		echo json_encode($data);
	}
?>