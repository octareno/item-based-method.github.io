<?php
	include 'connect_db.php';
	if (ISSET($_POST['nama'])) {
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$pekerjaan = $_POST['pekerjaan'];
		$usia = $_POST['usia'];
		json_decode($usia);
		if ($usia <= 25) {
			$range_usia = '16 s/d 25';
		} elseif ($usia <= 35) {
			$range_usia = '26 s/d 35';
		} else {
			$range_usia = '> 35';
		}
		$jumlah_orang = $_POST['orang'];
		$hotel = $_POST['hotel'];
		$hari = $_POST['hari'];
		json_decode($nama);
		json_decode($jenis_kelamin);
		json_decode($pekerjaan);
		json_decode($jumlah_orang);
		json_decode($hotel);
		json_decode($hari);

		/* Metode User-Based */
			# Tahap 1 : Similiarity(User A, User B)
			$query = mysqli_query($conn, 'SELECT * FROM pengguna p, riwayat r WHERE p.id_pengguna=r.id_pengguna ORDER BY r.id_riwayat DESC');
			$pengguna = array();
			if (mysqli_num_rows($query) > 0) {
				$i = 0;
				while ($d = mysqli_fetch_assoc($query)) {
					$pengguna[$i]['id_pengguna'] = $d['id_pengguna'];
					$pengguna[$i]['nama'] = $d['nama'];
					$pengguna[$i]['id_riwayat']  = $d['id_riwayat'];

					/* Kriteria Utama */
					$pengguna[$i]['jenis_kelamin'] = $d['jenis_kelamin'];
					$pengguna[$i]['pekerjaan']  = $d['id_pekerjaan'];
					$pengguna[$i]['range_usia']  = $d['range_usia'];
					$pengguna[$i]['rencana_jumlah_orang']  = $d['rencana_jumlah_orang'];
					$pengguna[$i]['rencana_hotel'] = $d['rencana_hotel'];
					$pengguna[$i]['rencana_hari'] = $d['rencana_hari'];

					$i++;
				}
			}
			$n_pengguna = sizeof($pengguna);
			$hasil = array();
			# Perulangan sebanyak User A 
			for ($i=0; $i < $n_pengguna; $i++) { // Jika hasil pencarian telah disimpan ke DB maka perulangan for menjadi $n_pengguna-1
				# Perulangan sebanyak User B
					$sim = 0;
					# Rumus Perhitungan Similiarity(User A, User B)
					# Mencocokkan kemiripan per variabel dengan Pengguna lain
					# Perulangan sebanyak 6 variabel
					
					if ($pengguna[$i]['jenis_kelamin'] == $jenis_kelamin) {
						$sim += 1;
					}
					if ($pengguna[$i]['pekerjaan'] == $pekerjaan) {
						$sim += 1;
					}
					if ($pengguna[$i]['range_usia'] == $range_usia) {
						$sim += 1;
					}
					if ($pengguna[$i]['rencana_jumlah_orang'] == $jumlah_orang) {
						$sim += 1;
					}
					if ($pengguna[$i]['rencana_hotel'] == $hotel) {
						$sim += 1;
					}
					if ($pengguna[$i]['rencana_hari'] == $hari) {
						$sim += 1;
					}
					
					$hasil[$i]['similiarity'] = 1 * ($sim / 6); // Similiarity sekaligus prediksi karena sudah dikalikan 1
					$hasil[$i]['id_pengguna'] = $pengguna[$i]['id_pengguna'];
			}

			# Mencetak Hasil Prediksi dan Sorting
			arsort($hasil);
			$max = -1;
			for ($i=0; $i < sizeof($hasil) ; $i++) { 
				if ($hasil[$i]['similiarity'] >= $max) {
					$max = $hasil[$i]['similiarity'];
					$max_id = $hasil[$i]['id_pengguna'];
					$max_index = $i;
				}
			}

			$data['similiarity'] = $max;
			$data['id_pengguna'] = $max_id;

			$query = mysqli_query($conn, 'SELECT * FROM riwayat r, paket p WHERE r.id_paket=p.id_paket AND r.id_pengguna="'.$max_id.'"');
			if (mysqli_num_rows($query) > 0) {
				$d = mysqli_fetch_assoc($query);

				$data['id_paket'] = $d['id_paket'];
				$data['nama_paket'] = $d['nama_paket'];
				$data['harga'] = $d['harga'];
				// Harga yang sudah diberi pemisah .
				$data['harga_formated'] = number_format($data['harga'],0,'','.');
				$data['hari'] = $d['hari'];
				$data['detail_tujuan'] = $d['detail_tujuan'];
				$data['hotel_bintang'] = $d['hotel_bintang'];
				$data['fasilitas'] = $d['fasilitas'];
				$data['jumlah_orang'] = $d['jumlah_orang'];
			}

			//print_r($data);
			//print_r($hasil[$max_index]);
			/*$no=1;
			foreach ($hasil as $key => $value) {
				echo $no.'] '; print_r($value); echo '<br>'; $no++;
			}*/
			
			// Header json berfungsi agar data yang diparsing menjadi object dan dapat dipanggil selayaknya array assoc di php. Tanpa Header ini maka data yang diparsing masih berbentuk array javascript pada attribut DATA di AJAX
			header('Content-Type: application/json');
			// json_encode mengubah data menjadi json sehingga dapat melakukan pertukaran data antara web browser dengan server
			echo json_encode($data);
		/* Metode User-Based */
	}
?>