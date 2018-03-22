<?php
	if (ISSET($_GET['id']) AND ISSET($_POST['nama_paket'])) {
		include 'connect_db.php';
		$id = $_GET['id'];
		$nama_paket = $_POST['nama_paket'];
		$harga = $_POST['harga'];
		$jumlah_orang = $_POST['jumlah_orang'];
		$hotel = $_POST['hotel'];
		$hari = $_POST['hari'];
		$objek_wisata = $_POST['objek_wisata'];
		$fasilitas = $_POST['fasilitas'];
		$query = 'UPDATE paket SET nama_paket="'.$nama_paket.'", harga="'.$harga.'", hari="'.$hari.'", detail_tujuan="'.$objek_wisata.'", hotel_bintang="'.$hotel.'", fasilitas="'.$fasilitas.'", jumlah_orang="'.$jumlah_orang.'" WHERE id_paket="'.$id.'"';
		if (mysqli_query($conn, $query)) {
		 	// Berhasil mengubah
		 	header('location: ../admin/paketwisata.php?balasan=5&action=edit&id='.$id.'');
		} else {
			// Gagal mengubah
			header('location: ../admin/paketwisata.php?balasan=6&action=edit&id='.$id.'');
		}
	}
?>