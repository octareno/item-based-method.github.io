<?php 
	if (ISSET($_POST['nama_paket'])) {
		include 'connect_db.php';
		$nama_paket = $_POST['nama_paket'];
		$harga = $_POST['harga'];
		$jumlah_orang = $_POST['jumlah_orang'];
		$hotel = $_POST['hotel'];
		$hari = $_POST['hari'];
		$objek_wisata = $_POST['objek_wisata'];
		$fasilitas = $_POST['fasilitas'];
		$query = "INSERT INTO paket(nama_paket, harga, hari, detail_tujuan, hotel_bintang, fasilitas, jumlah_orang) VALUES('$nama_paket','$harga','$hari','$objek_wisata','$hotel','$fasilitas','$jumlah_orang')";

		if (mysqli_query($conn, $query)) {
		 	// Berhasil menambah
		 	header('location: ../admin/paketwisata.php?balasan=1');
		} else {
			// Gagal menambah
			header('location: ../admin/paketwisata.php?balasan=2');
		}
	}
?>