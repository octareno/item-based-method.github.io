<?php include '../../process/connect_db.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pak Ragil Idolaku</title>

    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      h2 {
        text-align: center;
      }
      body {
        background-color: #eee;
      }
      #form-submit {
        width: 100%;
      }
      #form {
        margin-top: 30px;
      }
      .panel-heading {
        font-size: 25pt;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid" id="form">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="panel panel-success">
            <div class="panel-heading" align="center">Form Registrasi</div>
            <div class="panel-body">
              <?php 
                if (ISSET($_GET['balasan'])) {
                  if ($_GET['balasan'] == 1) {
                    // Berhasil registrasi
                    echo '<div class="alert alert-dismissible alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                          <strong>Berhasil</strong> melakukan registrasi.
                        </div>';
                  } elseif ($_GET['balasan'] == 2) {
                    // Gagal registrasi
                    echo '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                          <strong>Gagal</strong> melakukan registrasi.
                        </div>';
                  } elseif ($_GET['balasan'] == 3) {
                    // Password dan konfirmasi password berbeda
                    echo '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                          <strong>Password</strong> dan <strong>konfirmasi password</strong> berbeda.
                        </div>';
                  }
                }
              ?>
              <!-- <hr> -->
              <form class="form-horizontal" method="post" action="../../process/registrasi.php">
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Nama</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Meidy Gumi Chalika" name="nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Email</label>
                  <div class="col-sm-5">
                    <input type="email" class="form-control"  placeholder="meidy.gumi@gmail.com" name="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Password</label>
                  <div class="col-sm-5">
                    <input type="password" class="form-control" placeholder="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Konfirmasi Password</label>
                  <div class="col-sm-5">
                    <input type="password" class="form-control" placeholder="konfirmasi password" name="konfirm_password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Nomor Telepon</label>
                  <div class="col-sm-5">
                    <div class="input-group">
                      <span class="input-group-addon">+62</span>
                      <input type="number" class="form-control" placeholder="81234567890" name="telepon" min="1" maxlength="12" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Jenis Kelamin</label>
                  <div class="col-sm-5">
                    <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="laki-laki" checked required> Laki-laki
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan
                  </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Pekerjaan</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="pekerjaan" required>
                      <?php
                        $query = mysqli_query($conn, 'SELECT * FROM pekerjaan');
                        if (mysqli_num_rows($query) > 0) {
                          echo '<option value=""></option>';
                          while ($data = mysqli_fetch_assoc($query)) {
                            $jenis_pekerjaan = $data['jenis_pekerjaan'];
                            $id_pekerjaan = $data['id_pekerjaan'];
                            echo '<option value="'.$id_pekerjaan.'">'.$jenis_pekerjaan.'</option>';
                          }
                        }
                      ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-1 control-label">Usia</label>
                  <div class="col-sm-5">
                    <input class="form-control" name="usia" placeholder="16 - 60 Tahun" type="number" min="16" max="60" required>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-3 col-sm-offset-3">
                    <button class="btn btn-success" id="form-submit" type="submit" name="registrasi">Registrasi</button>
                  </div>
                  <div class="col-sm-3">
                    <a href="index.php" style="width: 100%;" type="button" name="kembali" class="btn btn-default">Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Ada fitur baru yaitu prop() untuk radio button atau dropdown -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.alert').fadeOut(2500,'swing');
      });
    </script>
  </body>
</html>