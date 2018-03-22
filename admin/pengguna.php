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
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span><div class="text-sidebar">Beranda</div></a></li>
          <li class="aktif"><a href="pengguna.php"><span class="glyphicon glyphicon-user"></span><div class="text-sidebar">Pengguna</div></a></li>
          <li><a href="riwayat.php"><span class="glyphicon glyphicon-shopping-cart"></span><div class="text-sidebar">Riwayat</div></a></li>
          <li><a href="paketwisata.php"><span class="glyphicon glyphicon-road"></span><div class="text-sidebar">Paket Wisata</div></a></li>
          <li><a href="../process/logout.php"><span class="glyphicon glyphicon-log-out"></span><div class="text-sidebar">Keluar</div></a></li>
        </ul>
      </div>
      <!-- End of Left Sidebar -->
      <div class="right-content">
        <div class="row">
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <?php 
                  if (ISSET($_GET['balasan']) AND !ISSET($_GET['action'])) {
                    if ($_GET['balasan'] == 3 OR $_GET['balasan'] == 4) {
                      // Menghapus data pengguna
                      echo '<li><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</a></li>
                        <li class="active"><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Pengguna</a></li>';
                      $tab2 = true;
                    } else {
                      // Menambah pengguna
                      echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Pengguna</a></li>';
                      $tab1 = true;
                    }
                  } elseif (ISSET($_GET['action'])) {
                    // Mengedit pengguna
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span> Ubah Pengguna</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Pengguna</a></li>';
                      $tab1 = true;
                      $action_ubah = true;
                      $id = $_GET['id'];
                  } else {
                    // Default halaman
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</a></li>
                      <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Pengguna</a></li>';
                    $tab1 = true;
                  }
                ?>
              </ul>
              <div class="tab-content">
                <?php 
                  if (ISSET($tab1)) {
                    if ($tab1) {
                      echo '<div class="tab-pane fade active in" id="tambah">';
                    }
                  } else {
                    echo '<div class="tab-pane fade" id="tambah">';
                  }
                ?>
                <!-- <div class="tab-pane fade active in" id="tambah"> -->
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <!-- Balasan -->
                      <?php 
                        if (ISSET($_GET['balasan'])) {
                          if ($_GET['balasan'] == 1) {
                            // Berhasil menambah
                            echo '<div class="alert alert-dismissible alert-success">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Berhasil</strong> menyimpan data pengguna.
                                </div>';
                          } elseif ($_GET['balasan'] == 2) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> menyimpan data pengguna.
                                </div>';
                          } elseif ($_GET['balasan'] == 5) {
                            // Berhasil menambah
                            echo '<div class="alert alert-dismissible alert-success">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Berhasil</strong> mengubah data pengguna.
                                </div>';
                          } elseif ($_GET['balasan'] == 6) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> mengubah data pengguna.
                                </div>';
                          }
                        }
                      ?>
                      <!-- End of Balasan -->
                      <?php 
                        if (ISSET($action_ubah)) {
                          // Ubah Pengguna
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/ubah_pengguna.php?id='.$id.'">';
                          $query = mysqli_query($conn, 'SELECT * FROM pengguna p, pekerjaan pk WHERE p.id_pekerjaan=pk.id_pekerjaan AND p.id_pengguna="'.$id.'"');
                          if (mysqli_num_rows($query) > 0) {
                            $data = mysqli_fetch_assoc($query);

                            $id_jenis_pekerjaan = $data['id_pekerjaan'];
                            $nama = $data['nama'];
                            $email = $data['email'];
                            $telepon = $data['no_hp'];
                            $jenis_kelamin = $data['jenis_kelamin'];
                            $usia = $data['usia'];
                          }
                        } else {
                          // Tambah Pengguna
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/tambah_pengguna.php">';
                        }
                      ?>
                        <fieldset>
                          <h2 style="text-align: center;">Data Pengguna</h2><br>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Pengguna
                                  echo '<input class="form-control" name="nama" placeholder="Meidy Gumi Chalika" type="text" maxlength="40" value="'.$nama.'" required>';
                                } else {
                                  // Tambah Pengguna
                                  echo '<input class="form-control" name="nama" placeholder="Meidy Gumi Chalika" type="text" maxlength="40" required>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Pengguna
                                  echo '<input class="form-control" name="email" placeholder="meidy.gumi@thevirgin.com" type="email" value="'.$email.'" required>';
                                } else {
                                  // Tambah Pengguna
                                  echo '<input class="form-control" name="email" placeholder="meidy.gumi@thevirgin.com" type="email" required>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nomor Telepon</label>
                            <div class="col-lg-9">
                              <div class="input-group">
                                <span class="input-group-addon" style="background-color: #2b3e50">+62</span>
                                <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Pengguna
                                  echo '<input class="form-control" name="telepon" type="number" placeholder="81234567890" min="1" maxlength="12" value="'.$telepon.'" required>';
                                } else {
                                  // Tambah Pengguna
                                  echo '<input class="form-control" name="telepon" type="number" placeholder="81234567890" min="1" maxlength="12" required>';
                                }
                              ?>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Pengguna
                                  if ($jenis_kelamin == 'laki-laki') {
                                    // Laki-laki
                                    echo '
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
                                    ';
                                  } else {
                                    // Perempuan
                                    echo '
                                      <div class="radio-inline">
                                        <label>
                                          <input name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" type="radio" required>
                                          Laki-laki
                                        </label>
                                      </div>
                                      <div class="radio-inline">
                                        <label>
                                          <input name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" type="radio" checked required>
                                          Perempuan
                                        </label>
                                      </div>
                                    ';
                                  }
                                } else {
                                  // Tambah Pengguna
                                  echo '
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
                                  ';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Usia</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Pengguna
                                  echo '<input class="form-control" name="usia" placeholder="16 - 60 Tahun" type="number" min="16" max="60" value="'.$usia.'" required>';
                                } else {
                                  // Tambah Pengguna
                                  echo '<input class="form-control" name="usia" placeholder="16 - 60 Tahun" type="number" min="16" max="60" required>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan</label>
                            <div class="col-lg-9">
                              <select class="form-control" name="pekerjaan" required>
                                <option value=""></option>
                                <?php
                                  $query = mysqli_query($conn, 'SELECT * FROM pekerjaan');
                                  if (mysqli_num_rows($query) > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                      $id_pekerjaan = $data['id_pekerjaan'];
                                      $pekerjaan = $data['jenis_pekerjaan'];

                                      if (ISSET($action_ubah)) {
                                        // Ubah Pengguna
                                        if ($id_jenis_pekerjaan == $id_pekerjaan) {
                                          echo '<option value="'.$id_pekerjaan.'" selected>'.$pekerjaan.'</option>';
                                        } else {
                                          echo '<option value="'.$id_pekerjaan.'">'.$pekerjaan.'</option>';
                                        }
                                      } else {
                                        // Tambah Pengguna
                                        echo '<option value="'.$id_pekerjaan.'">'.$pekerjaan.'</option>';
                                      }
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <?php 
                              if (ISSET($action_ubah)) {
                                // Ubah Pengguna
                                echo '
                                <div class="col-lg-4 col-lg-offset-2">
                                  <button style="width: 100%;" type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-lg-4">
                                  <a href="pengguna.php" style="width: 100%;" type="button" name="batal" class="btn btn-warning">Batal</a>
                                </div>';
                              } else {
                                // Tambah Pengguna
                                echo '
                                  <div class="col-lg-4 col-lg-offset-4">
                                    <button style="width: 100%;" type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                  </div>';
                              }
                            ?>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </div>
                </div>
                <?php 
                  if (ISSET($tab2)) {
                    if ($tab2) {
                      echo '<div class="tab-pane fade active in" id="lihat">';
                    }
                  } else {
                    echo '<div class="tab-pane fade" id="lihat">';
                  }
                ?>
                <!-- <div class="tab-pane fade" id="lihat"> -->
                <!-- Balasan -->
                <?php 
                  if (ISSET($_GET['balasan'])) {
                    if ($_GET['balasan'] == 3) {
                      // Berhasil menghapus
                      echo '<div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Berhasil</strong> menghapus data pengguna.
                          </div>';
                    } elseif ($_GET['balasan'] == 4) {
                      // Gagal menghapus
                      echo '<div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Gagal</strong> menghapus data pengguna.
                          </div>';
                    }
                  }
                ?>
                <!-- End of Balasan -->
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>E-mail</th>
                          <th>Nomor Telepon</th>
                          <th>Jenis Kelamin</th>
                          <th>Usia</th>
                          <th>Range Usia</th>
                          <th>Pekerjaan</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $query = mysqli_query($conn, 'SELECT * FROM pengguna p, pekerjaan pk WHERE p.id_pekerjaan=pk.id_pekerjaan ORDER BY p.id_pengguna DESC');
                          if (mysqli_num_rows($query) > 0) {
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                              $id_pengguna = $data['id_pengguna'];
                              $id_pekerjaan = $data['id_pekerjaan'];
                              $jenis_pekerjaan = $data['jenis_pekerjaan'];
                              $nama = $data['nama'];
                              $email = $data['email'];
                              $telepon = $data['no_hp'];
                              $jenis_kelamin = $data['jenis_kelamin'];
                              $usia = $data['usia'];
                              $range_usia = $data['range_usia'];

                              echo '
                              <tr>
                                <td>'.$i.'</td>
                                <td>'.$nama.'</td>
                                <td>'.$email.'</td>
                                <td>+62'.$telepon.'</td>
                                <td>'.$jenis_kelamin.'</td>
                                <td>'.$usia.' Tahun</td>
                                <td>'.$range_usia.' Tahun</td>
                                <td>'.$jenis_pekerjaan.'</td>
                                <td>
                                  <a href="pengguna.php?action=edit&id='.$id_pengguna.'" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                  <a href="../process/hapus_pengguna.php?id='.$id_pengguna.'" class="btn btn-danger" onclick="return hapus()"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                              </tr>
                            ';
                            $i++;
                            }
                          }
                        ?>
                      </tbody>
                    </table>
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

    <script>
      $(document).ready(function(){
        $('.alert').fadeOut(2500,'swing');
      });

      function hapus(){
        var konfirmasi = confirm("Apakah anda yakin untuk menghapus data ini ?");
        if(konfirmasi){
          return true;
        }else{
          return false;
        }
      }
    </script>

  </body>
</html>