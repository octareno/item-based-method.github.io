<?php 
	if (ISSET($_GET['hari'])) {
		// Menyimpan kumpulan data dan melakukan decode dari json ke php
		/*$send = $_GET['send'];
		json_decode($send);
		$data['send'] = $send;*/
		include 'connect_db.php';
		$orang = $_GET['orang'];
		$hotel = $_GET['hotel'];
		$hari = $_GET['hari'];
		$tgl_paket = $_GET['tgl_paket'];
		json_decode($orang);
		json_decode($hotel);
		json_decode($hari);
		json_decode($tgl_paket);

		$query = mysqli_query($conn, 'SELECT * FROM paket WHERE jumlah_orang="'.$orang.'" AND hotel_bintang="'.$hotel.'" AND hari="'.$hari.'"');
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
		}
		$data['tgl_paket'] = $tgl_paket;
		// Harga yang sudah diberi pemisah .
		$data['harga_formated'] = number_format($data['harga'],0,'','.');
		// Header json berfungsi agar data yang diparsing menjadi object dan dapat dipanggil selayaknya array assoc di php. Tanpa Header ini maka data yang diparsing masih berbentuk array javascript pada attribut DATA di AJAX
		header('Content-Type: application/json');
		// json_encode mengubah data menjadi json sehingga dapat melakukan pertukaran data antara web browser dengan server
		echo json_encode($data);
	}
?>