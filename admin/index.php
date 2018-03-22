<?php 
  session_start();
  if ((!ISSET($_SESSION['email'])) AND (!ISSET($_SESSION['password']))) {
    // Mencegah direct access melalui url
    header('Location: ../pengguna/autentikasi/index.php');
  } else {
    // Berhasil Login
    include '../process/connect_db.php';
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pak Ragil Idolaku</title>

    <!-- Bootstrap -->
    <link href="../assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets2/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <div class="left-sidebar">
        <ul class="sidebar nav nav-pills nav-stacked">
          <li class="aktif"><a href="index.php"><span class="glyphicon glyphicon-home"></span><div class="text-sidebar">Beranda</div></a></li>
          <li><a href="pengguna.php"><span class="glyphicon glyphicon-user"></span><div class="text-sidebar">Pengguna</div></a></li>
          <li><a href="riwayat.php"><span class="glyphicon glyphicon-shopping-cart"></span><div class="text-sidebar">Riwayat</div></a></li>
          <li><a href="paketwisata.php"><span class="glyphicon glyphicon-road"></span><div class="text-sidebar">Paket Wisata</div></a></li>
          <li><a href="../process/logout.php"><span class="glyphicon glyphicon-log-out"></span><div class="text-sidebar">Keluar</div></a></li>
        </ul>
      </div>
      <!-- End of Left Sidebar -->
      <?php 
        $query = mysqli_query($conn, 'SELECT COUNT(id_pengguna) AS total_pengguna FROM pengguna');
        if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
          $total_pengguna = $data['total_pengguna'];
        }

        $query = mysqli_query($conn, 'SELECT COUNT(id_paket) AS total_paket FROM paket');
        if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
          $total_paket = $data['total_paket'];
        }

        $query = mysqli_query($conn, 'SELECT COUNT(id_riwayat) AS total_riwayat FROM riwayat WHERE status_pembayaran="Lunas"');
        if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
          $total_riwayat_lunas = $data['total_riwayat'];
        }

        $query = mysqli_query($conn, 'SELECT COUNT(id_riwayat) AS total_riwayat FROM riwayat WHERE status_pembayaran="Belum Lunas"');
        if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
          $total_riwayat_belum = $data['total_riwayat'];
        }
      ?>
      <div class="right-content">
        <div class="row">
            <div class="col-sm-3 box-dashboard">
              <div class="box-inside-dashboard">
                <div class="row">
                  <div class="col-sm-3">
                    <span style="color:#46b8da;" class="glyphicon glyphicon-user box-icon"></span>
                  </div>
                  <div class="col-sm-9 box-text-group" align="left">
                    <div class="box-text">Pengguna</div>
                    <div style="font-size:14pt;"><?php echo $total_pengguna; ?></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 box-dashboard">
              <div class="box-inside-dashboard">
                <div class="row">
                  <div class="col-sm-3">
                    <span style="color:#f0ad4e;" class="glyphicon glyphicon-road box-icon"></span>
                  </div>
                  <div class="col-sm-9 box-text-group" align="left">
                    <div class="box-text">Paket Wisata</div>
                    <div style="font-size:14pt;"><?php echo $total_paket; ?></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 box-dashboard">
              <div class="box-inside-dashboard">
                <div class="row">
                  <div class="col-sm-3">
                    <span style="color:#5cb85c;" class="glyphicon glyphicon-shopping-cart box-icon"></span>
                  </div>
                  <div class="col-sm-9 box-text-group" align="left">
                    <div class="box-text">Riwayat Lunas</div>
                    <div style="font-size:14pt;"><?php echo $total_riwayat_lunas; ?></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3 box-dashboard">
              <div class="box-inside-dashboard">
                <div class="row">
                  <div class="col-sm-3">
                    <span style="color:#d9534f;" class="glyphicon glyphicon-usd box-icon"></span>
                  </div>
                  <div class="col-sm-9 box-text-group" align="left">
                    <div class="box-text">Riwayat Belum Lunas</div>
                    <div style="font-size:14pt;"><?php echo $total_riwayat_belum; ?></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- End of Right Content -->
    </div>
    <!-- End of Wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Ada fitur baru yaitu prop() untuk radio button atau dropdown -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets2/js/bootstrap.min.js"></script>
  </body>
</html>