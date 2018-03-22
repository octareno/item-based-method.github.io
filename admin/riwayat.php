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
          <li><a href="pengguna.php"><span class="glyphicon glyphicon-user"></span><div class="text-sidebar">Pengguna</div></a></li>
          <li class="aktif"><a href="riwayat.php"><span class="glyphicon glyphicon-shopping-cart"></span><div class="text-sidebar">Riwayat</div></a></li>
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
                    if ($_GET['balasan'] == 3 OR $_GET['balasan'] == 4 OR $_GET['balasan'] == 7 OR $_GET['balasan'] == 8) {
                      // Menghapus data riwayat
                      echo '<li><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Riwayat</a></li>
                        <li class="active"><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Riwayat</a></li>';
                      $tab2 = true;
                    } else {
                      // Menambah riwayat
                      echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Riwayat</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Riwayat</a></li>';
                      $tab1 = true;
                    }
                  } elseif (ISSET($_GET['action'])) {
                    // Mengedit riwayat
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span> Ubah Riwayat</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Riwayat</a></li>';
                      $tab1 = true;
                      $action_ubah = true;
                      $id = $_GET['id'];
                  } else {
                    // Default halaman
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Riwayat</a></li>
                      <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Riwayat</a></li>';
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
                                  <strong>Berhasil</strong> menyimpan data riwayat.
                                </div>';
                          } elseif ($_GET['balasan'] == 2) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> menyimpan data riwayat.
                                </div>';
                          } elseif ($_GET['balasan'] == 5) {
                            // Berhasil menambah
                            echo '<div class="alert alert-dismissible alert-success">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Berhasil</strong> mengubah data riwayat.
                                </div>';
                          } elseif ($_GET['balasan'] == 6) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> mengubah data riwayat.
                                </div>';
                          }
                        }
                      ?>
                      <!-- End of Balasan -->
                      <?php 
                        if (ISSET($action_ubah)) {
                          // Ubah Pengguna
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/ubah_riwayat.php?id='.$id.'">';
                          $query = mysqli_query($conn, 'SELECT * FROM riwayat r, pengguna p WHERE r.id_pengguna=p.id_pengguna AND r.id_riwayat="'.$id.'"');
                          if (mysqli_num_rows($query) > 0) {
                            $data = mysqli_fetch_assoc($query);
                            $id_riwayat = $id;
                            $id_pengguna = $data['id_pengguna'];
                            $nama = $data['nama'];
                            $orang = $data['rencana_jumlah_orang'];
                            $hotel = $data['rencana_hotel'];
                            $hari = $data['rencana_hari'];
                            $tgl_pesan = $data['tanggal_pesan'];
                            $tgl_paket = $data['tanggal_paket'];
                            $status = $data['status_pembayaran'];
                          }
                        } else {
                          // Tambah Pengguna
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/tambah_riwayat.php">';
                        }
                      ?>
                        <fieldset>
                          <h2 style="text-align: center;">Data Riwayat</h2><br>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama</label>
                            <div class="col-lg-9">
                              <select class="form-control" name="nama" required>
                                <option value=""></option>
                                <?php 
                                  $query = mysqli_query($conn, 'SELECT * FROM pengguna ORDER BY id_pengguna DESC');
                                  if (mysqli_num_rows($query) > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                      $id_nama_pengguna = $data['id_pengguna'];
                                      $nama = $data['nama'];

                                      if (ISSET($action_ubah)) {
                                        // Ubah Riwayat
                                        if ($id_nama_pengguna == $id_pengguna) {
                                          echo '<option value="'.$id_nama_pengguna.'" selected>'.$nama.'</option>';
                                        } else {
                                          echo '<option value="'.$id_nama_pengguna.'">'.$nama.'</option>';
                                        }
                                      } else {
                                        // Tambah Riwayat
                                        echo '<option value="'.$id_nama_pengguna.'">'.$nama.'</option>';
                                      }
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Jumlah Orang</label>
                            <div class="col-lg-9">
                              <select class="form-control" name="jumlah_orang" required>
                                <option value=""></option>
                                <?php 
                                  $query = mysqli_query($conn, 'SELECT id_paket, jumlah_orang FROM paket GROUP BY jumlah_orang ORDER BY id_paket ASC ');
                                  if (mysqli_num_rows($query) > 0) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                      $jumlah_orang = $data['jumlah_orang'];

                                      if (ISSET($action_ubah)) {
                                        // Ubah Riwayat
                                        if ($orang == $jumlah_orang) {
                                          echo '<option value="'.$jumlah_orang.'" selected>'.$jumlah_orang.' Orang</option>';
                                        } else {
                                          echo '<option value="'.$jumlah_orang.'">'.$jumlah_orang.' Orang</option>';
                                        }
                                      } else {
                                        // Tambah Riwayat
                                        echo '<option value="'.$jumlah_orang.'">'.$jumlah_orang.' Orang</option>';
                                      }
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Hotel Berbintang</label>
                            <div class="col-lg-9">
                              <select class="form-control" name="hotel" required>
                                <option value=""></option>
                                <?php 
                                  for ($j=2; $j <= 5; $j++) {
                                    if (ISSET($action_ubah)) {
                                      // Ubah Riwayat
                                        if ($hotel == $j) {
                                          echo '<option value="'.$j.'" selected>'.$j.'</option>';
                                        } else {
                                          echo '<option value="'.$j.'">'.$j.'</option>';
                                        }
                                    } else {
                                      // Tambah Riwayat
                                      echo '<option value="'.$j.'">'.$j.'</option>';
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Durasi Wisata</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Riwayat
                                  if ($hari == '3 hari') {
                                    // 3 hari
                                    echo '
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
                                    ';
                                  } elseif($hari == '4 hari') {
                                    // 4 hari
                                    echo '
                                      <div class="radio-inline">
                                        <label>
                                          <input name="hari" id="hari1" value="3 hari" type="radio" required>
                                          3 Hari
                                        </label>
                                      </div>
                                      <div class="radio-inline">
                                        <label>
                                          <input name="hari" id="hari2" value="4 hari" checked type="radio" required>
                                          4 Hari
                                        </label>
                                      </div>
                                      <div class="radio-inline">
                                        <label>
                                          <input name="hari" id="hari3" value="5 hari" type="radio" required>
                                          5 Hari
                                        </label>
                                      </div>
                                    ';
                                  } else {
                                    // 5 hari
                                    echo '
                                      <div class="radio-inline">
                                        <label>
                                          <input name="hari" id="hari1" value="3 hari" type="radio" required>
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
                                          <input name="hari" id="hari3" value="5 hari" checked type="radio" required>
                                          5 Hari
                                        </label>
                                      </div>
                                    ';
                                  }
                                } else {
                                  // Tambah Riwayat
                                  echo '
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
                                  ';
                                }
                              ?>
                            </div>
                          </div>
                          <!-- <div class="form-group">
                            <label class="col-lg-3 control-label">Waktu Pemesanan</label>
                            <div class="col-lg-9">
                              <?php 
                                /*if (ISSET($action_ubah)) {
                                  // Ubah Riwayat
                                  echo '<input class="form-control" name="tgl_pesan" type="date" value="'.$tgl_pesan.'" required>';
                                } else {
                                  // Tambah Riwayat
                                  echo '<input class="form-control" name="tgl_pesan" type="date" required>';
                                }*/
                              ?>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Waktu Berlaku</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Riwayat
                                  echo '<input class="form-control" name="tgl_paket" type="date" value="'.$tgl_paket.'" required>';
                                } else {
                                  // Tambah Riwayat
                                  echo '<input class="form-control" name="tgl_paket" type="date" required>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Status</label>
                            <div class="col-lg-9">
                              <select class="form-control" name="status" required>
                                <option value=""></option>
                                <?php 
                                  if (ISSET($action_ubah)) {
                                    // Ubah Riwayat
                                    if ($status == 'Lunas') {
                                      echo '<option value="Lunas" selected>Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>';
                                    } else {
                                      echo '<option value="Lunas">Lunas</option>
                                          <option value="Belum Lunas" selected>Belum Lunas</option>';
                                    }
                                  } else {
                                    // Tambah Riwayat
                                    echo '<option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>';
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <?php 
                              if (ISSET($action_ubah)) {
                                // Ubah Riwayat
                                echo '
                                <div class="col-lg-4 col-lg-offset-2">
                                  <button style="width: 100%;" type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-lg-4">
                                  <a href="riwayat.php" style="width: 100%;" type="button" name="batal" class="btn btn-warning">Batal</a>
                                </div>';
                              } else {
                                // Tambah Riwayat
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
                <!-- Balasan -->
                <?php 
                  if (ISSET($_GET['balasan'])) {
                    if ($_GET['balasan'] == 3) {
                      // Berhasil menghapus
                      echo '<div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Berhasil</strong> menghapus data riwayat.
                          </div>';
                    } elseif ($_GET['balasan'] == 4) {
                      // Gagal menghapus
                      echo '<div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Gagal</strong> menghapus data riwayat.
                          </div>';
                    } elseif ($_GET['balasan'] == 7) {
                      // Berhasil menghapus
                      echo '<div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Berhasil</strong> mengubah status pembayaran data riwayat.
                          </div>';
                    } elseif ($_GET['balasan'] == 8) {
                      // Gagal menghapus
                      echo '<div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Gagal</strong> mengubah status pembayaran data riwayat.
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
                          <th>Paket Wisata</th>
                          <th>Jumlah Orang</th>
                          <th>Hotel Berbintang</th>
                          <th>Durasi Wisata</th>
                          <th>Tanggal Pemesanan</th>
                          <th>Tanggal Berlaku</th>
                          <th>Status Pembayaran</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $query = mysqli_query($conn, 'SELECT * FROM riwayat r, paket p, pengguna pg WHERE r.id_paket=p.id_paket AND r.id_pengguna=pg.id_pengguna ORDER BY id_riwayat DESC');
                          if (mysqli_num_rows($query) > 0) {
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                              $id_riwayat = $data['id_riwayat'];
                              $id_pengguna = $data['id_pengguna'];
                              $nama = $data['nama'];
                              $id_paket = $data['id_paket'];
                              $paket = $data['nama_paket'];
                              $jumlah_orang = $data['rencana_jumlah_orang'];
                              $hotel = $data['rencana_hotel'];
                              $hari = $data['rencana_hari'];
                              $tgl_pesan = $data['tanggal_pesan'];
                              $tgl_paket = $data['tanggal_paket'];
                              $status = $data['status_pembayaran'];

                              echo '
                              <tr>
                                <td>'.$i.'</td>
                                <td>'.$nama.'</td>
                                <td>'.$paket.'</td>
                                <td>'.$jumlah_orang.'</td>';
                              echo '<td>';
                              for ($j=1; $j <= $hotel; $j++) { 
                                echo '<span class="glyphicon glyphicon-star"></span>';
                              }
                              echo '</td>';
                              echo '
                                <td>'.$hari.'</td>
                                <td>'.$tgl_pesan.'</td>
                                <td>'.$tgl_paket.'</td>
                                <td>'.$status.'</td>';
                              echo '<td>';
                              if ($status == 'Belum Lunas') {
                                echo '<a href="../process/lunas.php?id='.$id_riwayat.'" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                                  <a href="riwayat.php?action=edit&id='.$id_riwayat.'" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                  <a href="../process/hapus_riwayat.php?id='.$id_riwayat.'" class="btn btn-danger" onclick="return hapus()"><span class="glyphicon glyphicon-remove"></span></a>';
                              } else {
                                echo '<a href="#" class="btn btn-success disabled"><span class="glyphicon glyphicon-ok"></span></a>
                                  <a href="riwayat.php?action=edit&id='.$id_riwayat.'" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                  <a href="../process/hapus_riwayat.php?id='.$id_riwayat.'" class="btn btn-danger" onclick="return hapus()"><span class="glyphicon glyphicon-remove"></span></a>';
                              }   
                              echo '</td>
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