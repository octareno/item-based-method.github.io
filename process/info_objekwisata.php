<?php 
	if (ISSET($_GET['id_paket'])) {
		// Detail Objek Wisata
		include 'connect_db.php';
		$id_paket = $_GET['id_paket'];
		$query = mysqli_query($conn, 'SELECT nama_paket, detail_tujuan FROM paket WHERE id_paket='.$id_paket.'');
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
		}
		// Header json berfungsi agar data yang diparsing menjadi object dan dapat dipanggil selayaknya array assoc di php. Tanpa Header ini maka data yang diparsing masih berbentuk array javascript pada attribut DATA di AJAX
		header('Content-Type: application/json');
		// json_encode mengubah data menjadi json sehingga dapat melakukan pertukaran data antara web browser dengan server
		echo json_encode($data);
	} elseif(ISSET($_GET['id'])) {
		// Detail Fasilitas
		include 'connect_db.php';
		$id_paket = $_GET['id'];
		$query = mysqli_query($conn, 'SELECT nama_paket, fasilitas FROM paket WHERE id_paket='.$id_paket.'');
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_assoc($query);
		}
		// Header json berfungsi agar data yang diparsing menjadi object dan dapat dipanggil selayaknya array assoc di php. Tanpa Header ini maka data yang diparsing masih berbentuk array javascript pada attribut DATA di AJAX
		header('Content-Type: application/json');
		// json_encode mengubah data menjadi json sehingga dapat melakukan pertukaran data antara web browser dengan server
		echo json_encode($data);
	}
?>