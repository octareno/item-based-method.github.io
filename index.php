<?php 
  session_start();
  if ((ISSET($_SESSION['email'])) AND (ISSET($_SESSION['password']))) {
    // Mencegah direct access sebelum logout
    header('Location: pengguna/index.php');
  } else {
    // Berhasil Login
    include 'process/connect_db.php';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kenal Pak Ragil?</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
    .paket-box {
      /*border: 1px solid black;*/
      /*text-align: center;*/
    }
  </style>
  <!-- =======================================================
    Theme Name: Laura
    Theme URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="myFunction()">
  <div class="header">
    <div class="bg-color">
      <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lauraMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Lombok Holiday Tour & Travel</a>
            </div>
            <div class="collapse navbar-collapse" id="lauraMenu">
              <ul class="nav navbar-nav navbar-right navbar-border">
                <li class="active"><a href="#main-header">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#portfolio">Paket</a></li>
                <li><a href="#rekomendasi">Rekomendasi</a></li>
                <li><a href="#contact">Kontak Kami</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn delay-05s">
              <div class="banner-text">
                <h2>Hi, We are <span>Suka Piknik</span> Travel,</h2>
                <p>A Profressional Tour <br>& Travel</p>
              </div>
              <div class="overlay-detail text-center">
                <a href="#tentang"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tentang -->
  <section id="tentang" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-right">
          <h2 class="title-text">
            Meet<br><span class="deco">Suka Piknik</span> Travel
          </h2>
        </div>
        <div class="col-md-6 text-left">
          <div class="tentang-text">
            <p>Travel ini dibuat hanya bermodalkan iseng saja tanpa sepeserpun modal. Berawal dari mulut ke mulut, travel ini semakin berkembang pesat.</p>
            <p>&nbsp;</p>
            <p>Selama lebih dari 100 tahun kamu memberikan pelayanan dan lebih dari 100 pilihan paket berlibur ke objek wisata yang ada di provinsi lombok. Motto kami adalah :</p>
            <p>&nbsp;</p>
            <ul class="abt-list">
              <li>- Jangan panik mari piknik.</li>
              <li>- Santai seperti di pantai.</li>
              <li>- Asikin aja.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="myGrid" class="grid-padding">
            <div class="col-md-4 col-sm-4 padding-right-zero">
              <img src="img/portfolio01.jpg" class="img-responsive">
              <img src="img/port01.jpg" class="img-responsive">
              <img src="img/port02.jpg" class="img-responsive">
              <img src="img/portfolio01.jpg" class="img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 padding-right-zero">
              <img src="img/portfolio02.jpg" class="img-responsive">
              <img src="img/port01.jpg" class="img-responsive">
              <img src="img/port02.jpg" class="img-responsive">
              <img src="img/portfolio01.jpg" class="img-responsive">
              <img src="img/port03.jpg" class="img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 padding-right-zero">
              <img src="img/port01.jpg" class="img-responsive">
              <img src="img/portfolio01.jpg" class="img-responsive">
              <img src="img/portfolio02.jpg" class="img-responsive">
              <img src="img/port03.jpg" class="img-responsive">
              <img src="img/portfolio02.jpg" class="img-responsive">
              <img src="img/port02.jpg" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Paket Wisata -->
  <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title text-center">Pilihan <span class="deco">Paket Wisata</span> Yang Tersedia</h2>
        </div>
        <div class="row">
          <!-- Paket 1 -->
          <div class="col-sm-4 paket-box">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1"><img src="img/pantai1.jpg" alt="Responsive image" class="img-thumbnail"></a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body">
                    <h1 align="center">3 HARI</h1><hr>
                    <h4>Objek Wisata :</h4>
                    <ul>
                      <li><p>Day 1 : Airport - Desa Tenun Sukarara - Desa Tradisional Sade - Pantai Kuta Lombok - Pantai Tanjung An - Bukit Merese - Pantai Mawun.</p></li>
                      <li><p>Day 2 : Bukit Setangi (Vila Hantu) - Bukit Malimbu - Bukit Malaka - Gili Trawangan, Meno dan Air (Snorkeling) - Monkey Forrest Pusuk.</p></li>
                      <li><p>Day 3 : Pusat Oleh-Oleh Lombok- Islamic Centre Mataram - Pura Lingsar - Taman Narmada - Desa Gerabah Banyumulek - Airport.</p></li>
                    </ul>
                    <hr>
                    <h4>Fasilitas :</h4>
                    <ul>
                      <li><p>- Mobil + Driver + BBM</p></li>
                      <li><p>- Hotel + Sarapan</p></li>
                      <li><p>- Makan Siang & Malam</p></li>
                      <li><p>- Air Mineral Selama Tour</p></li>
                      <li><p>- Lokal Guide</p></li>
                      <li><p>- Private Speed Boat</p></li>
                      <li><p>- Private Glass Bottom Trip 3 Gili</p></li>
                      <li><p>- Peralatan Snorkeling & Life Jacket</p></li>
                    </ul>
                  </div>
                  <div class="panel-footer">
                  </div>
                </div>
              </div>
            </div> 
          </div>
          <!-- End of Paket 1 -->
          <!-- Paket 2 -->
          <div class="col-sm-4 paket-box">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2"><img src="img/pantai2.jpg" alt="Responsive image" class="img-thumbnail"></a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <h1 align="center">4 HARI</h1><hr>
                    <h4>Objek Wisata :</h4>
                    <ul>
                      <li><p>Day 1 : Airport - Desa Tenun Sukarara - Desa Tradisional Sade - Pantai Kuta Lombok - Pantai Tanjung An - Bukit Merese - Pantai Mawun.</p></li>
                      <li><p>Day 2 : Bukit Setangi (Vila Hantu) - Bukit Malimbu - Bukit Malaka - Gili Trawangan, Meno dan Air (Snorkeling) - Monkey Forrest Pusuk.</p></li>
                      <li><p>Day 3 : Pantai Segui- Gili Petelu (Snorkeling) - Pantai Semangkok (Snorkeling) - Pantai Tangsi/Pink - Gili Pasir</p></li>
                      <li><p>Day 4 : Pusat Oleh-Oleh Lombok- Islamic Centre Mataram - Pura Lingsar - Taman Narmada - Desa Gerabah Banyumulek - Airport.</p></li>
                    </ul>
                    <hr>
                    <h4>Fasilitas :</h4>
                    <ul>
                      <li><p>- Mobil + Driver + BBM</p></li>
                      <li><p>- Hotel + Sarapan</p></li>
                      <li><p>- Makan Siang & Malam</p></li>
                      <li><p>- Air Mineral Selama Tour</p></li>
                      <li><p>- Lokal Guide</p></li>
                      <li><p>- Private Speed Boat</p></li>
                      <li><p>- Private Glass Bottom Trip 3 Gili</p></li>
                      <li><p>- Peralatan Snorkeling & Life Jacket</p></li>
                    </ul>
                  </div>
                  <div class="panel-footer">
                  </div>
                </div>
              </div>
            </div> 
          </div>
          <!-- End of Paket 2 -->
          <!-- Paket 3 -->
          <div class="col-sm-4 paket-box">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse3"><img src="img/pantai3.jpg" alt="Responsive image" class="img-thumbnail"></a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body">
                    <h1 align="center">5 HARI</h1><hr>
                    <h4>Objek Wisata :</h4>
                    <ul>
                      <li><p>Day 1 : Airport - Desa Tenun Sukarara - Desa Tradisional Sade - Pantai Kuta Lombok - Pantai Tanjung An - Bukit Merese - Pantai Mawun.</p></li>
                      <li><p>Day 2 : Bukit Setangi (Vila Hantu) - Bukit Malimbu - Bukit Malaka - Gili Trawangan, Meno dan Air (Snorkeling)</p></li>
                      <li><p>Day 3 : Monkey Forrest Pusuk - Air Terjun Sendang Gila - Air Terjun Tiu Kelep - Masjid Kuno Bayan</p></li>
                      <li><p>Day 4 :  Pantai Segui- Gili Petelu (Snorkeling) - Pantai Semangkok (Snorkeling) - Pantai Tangsi/Pink - Gili Pasir</p></li>
                      <li><p>Day 5 : Pusat Oleh-Oleh Lombok- Islamic Centre Mataram - Pura Lingsar - Taman Narmada - Desa Gerabah Banyumulek - Airport.</p></li>
                    </ul>
                    <hr>
                    <h4>Fasilitas :</h4>
                    <ul>
                      <li><p>- Mobil + Driver + BBM</p></li>
                      <li><p>- Hotel + Sarapan</p></li>
                      <li><p>- Makan Siang & Malam</p></li>
                      <li><p>- Air Mineral Selama Tour</p></li>
                      <li><p>- Lokal Guide</p></li>
                      <li><p>- Private Speed Boat</p></li>
                      <li><p>- Private Glass Bottom Trip 3 Gili</p></li>
                      <li><p>- Peralatan Snorkeling & Life Jacket</p></li>
                    </ul>
                  </div>
                  <div class="panel-footer">
                  </div>
                </div>
              </div>
            </div> 
          </div>
          <!-- End of Paket 3 -->
        </div>
      </div>
    </div>
  </section>
  <!-- Rekomendasi -->
  <section id="rekomendasi" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="rekomendasi-sec text-center">
            <h2>Ingin Mencari <span class="deco">Rekomendasi</span> Paket?</h2><br>
          </div>
          <br>
          <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" method="post" action="" id="rekomendasi-form">
              <div class="form-group">
                <label class="col-lg-4 control-label">Nama</label>
                <div class="col-lg-8">
                  <input class="form-control" id="nama" placeholder="Meidy Gumi Chalika" type="text" maxlength="40" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Jenis Kelamin</label>
                <div class="col-lg-8">
                  <div class="radio-inline">
                    <label>
                      <input name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" checked type="radio" required>
                      Laki-laki
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" type="radio" required>
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Usia</label>
                <div class="col-lg-8">
                  <input class="form-control" id="usia" placeholder="16 - 60 Tahun" type="number" min="16" max="60" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Pekerjaan</label>
                <div class="col-lg-8">
                  <select class="form-control" id="pekerjaan" required>
                    <option value=""></option>
                    <?php
                      $query = mysqli_query($conn, 'SELECT * FROM pekerjaan');
                      if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                          $id_pekerjaan = $data['id_pekerjaan'];
                          $pekerjaan = $data['jenis_pekerjaan'];
                            echo '<option value="'.$id_pekerjaan.'">'.$pekerjaan.'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Jumlah Orang</label>
                <div class="col-lg-8">
                  <select class="form-control" id="jumlah_orang" required>
                    <option value=""></option>
                    <?php 
                      $query = mysqli_query($conn, 'SELECT id_paket, jumlah_orang FROM paket GROUP BY jumlah_orang ORDER BY id_paket ASC ');
                      if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                          $jumlah_orang = $data['jumlah_orang'];
                          echo '<option value="'.$jumlah_orang.'">'.$jumlah_orang.' Orang</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Hotel Berbintang</label>
                <div class="col-lg-8">
                  <select class="form-control" id="hotel" required>
                    <option value=""></option>
                    <?php 
                      for ($j=2; $j <= 5; $j++) {
                        echo '<option value="'.$j.'">'.$j.'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Durasi Wisata</label>
                <div class="col-lg-8">
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="hari1" value="3 hari" checked type="radio" required>
                      3 Hari
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="hari2" value="4 hari" type="radio" required>
                      4 Hari
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="hari3" value="5 hari" type="radio" required>
                      5 Hari
                    </label>
                  </div>
                </div>
              </div>
              <br>
              <div class="col-lg-4 col-lg-offset-4">
                <button style="width: 100%;" type="submit" name="rekomendasi" class="btn btn-default">Cari Rekomendasi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Kontak -->
  <section id="contact" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-sec text-center">
            <h2>Ingin Pesan <span class="deco">Paket Wisata</span> Sekarang Juga?</h2>
          </div>
        </div>
        <div class="text-center"><a href="pengguna/autentikasi/index.php" type="button" class="btn btn-primary btn-lg">Pesan Paket Wisata</a></div>

      </div>
    </div>
  </section>

  <footer class="footer-2 text-center-xs bg--white">
    <div class="container">
      <!--end row-->
      <div class="row">
        <div class="col-md-6">
          <div class="footer">
            © Copyright Laura Theme. All Rights Reserved
            <div class="credits">
              <!--
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Laura
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
            </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </footer>

  <!-- Modal Pemesanan -->
  <div class="modal fade" id="hasilRekomendasi">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Hasil Rekomendasi</h4>
        </div>
        <div class="modal-body">
          <div class="col-sm-12">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-lg-4 control-label">Nama Paket Wisata</label>
                <div class="col-lg-8">
                  <input class="form-control" id="nama_paket" type="text" maxlength="10" disabled="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Harga</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input class="form-control" id="harga" type="text" disabled="" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Jumlah Orang</label>
                <div class="col-lg-8">
                  <select class="form-control" disabled="" required>
                    <option id="jumlah_orang_option"></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Hotel Berbintang</label>
                <div class="col-lg-8">
                  <select class="form-control" disabled="" required>
                    <option id="hotel_option"></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Durasi Wisata</label>
                <div class="col-lg-8">
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="modalHari1" value="3 hari" disabled="" type="radio" required>
                      3 Hari
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="modalHari2" value="4 hari" disabled="" type="radio" required>
                      4 Hari
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                      <input name="hari" id="modalHari3" value="5 hari" disabled="" type="radio" required>
                      5 Hari
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Objek Wisata</label>
                <div class="col-lg-8">
                  <textarea class="form-control" rows="10" id="objek_wisata" type="text" disabled="" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Fasilitas</label>
                <div class="col-lg-8">
                  <textarea class="form-control" rows="10" id="fasilitas" type="text" disabled="" required></textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer" style="margin-top:750px">
          <a href="pengguna/autentikasi/index.php" class="btn btn-primary" id="konfirm-pesan" type="button">Pesan</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End of Modal Pemesanan -->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>

  <script>
    // Menampilkan hasil rekomendasi
      $('#rekomendasi-form').on('submit',function(event){
        event.preventDefault();
        //alert('tes');

        var nama = $('#nama').val();
        var jenis_kelamin = $("input[name='jenis_kelamin']:checked").val();
        var usia = $('#usia').val();
        var pekerjaan = $("#pekerjaan").val();
        var hari = $("input[name='hari']:checked").val();
        var orang = $("#jumlah_orang").val();
        var hotel = $("#hotel").val();

        //alert(jenis_kelamin+nama+usia+pekerjaan+hari+orang+hotel);
        $.ajax({
          type:'POST',
          url:'process/rekomendasi.php',
          data:{jenis_kelamin:jenis_kelamin, nama:nama, usia:usia, pekerjaan:pekerjaan, hari:hari, orang:orang, hotel:hotel},
          success:function(data){
            $('#nama_paket').attr('value',data['nama_paket']);
            $('#harga').attr('value',data['harga_formated']);
            $('#jumlah_orang_option').text(data['jumlah_orang']);
            $('#hotel_option').text(data['hotel_bintang']);
            if (data['hari'] == '3 hari') {
              $('#modalHari1').prop('checked',true);
            } else if (data['hari'] == '4 hari') {
              $('#modalHari3').prop('checked',true);
            } else {
              $('#modalHari3').prop('checked',true);
            }            
            $('#objek_wisata').text(data['detail_tujuan']);
            $('#fasilitas').text(data['fasilitas']);
            // Memunculkan modal
            $('#hasilRekomendasi').modal('show');
          }
        });
      });
    
  </script>

  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>
  <!-- <script src="contactform/contactform.js"></script> -->

</body>

</html>