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
          <li><a href="riwayat.php"><span class="glyphicon glyphicon-shopping-cart"></span><div class="text-sidebar">Riwayat</div></a></li>
          <li class="aktif"><a href="paketwisata.php"><span class="glyphicon glyphicon-road"></span><div class="text-sidebar">Paket Wisata</div></a></li>
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
                      // Menghapus data paket wisata
                      echo '<li><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Paket Wisata</a></li>
                        <li class="active"><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Paket Wisata</a></li>';
                      $tab2 = true;
                    } else {
                      // Menambah paket wisata
                      echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Paket Wisata</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Paket Wisata</a></li>';
                      $tab1 = true;
                    }
                  } elseif (ISSET($_GET['action'])) {
                    // Mengedit paket wisata
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span> Ubah Paket Wisata</a></li>
                        <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Paket Wisata</a></li>';
                      $tab1 = true;
                      $action_ubah = true;
                      $id = $_GET['id'];
                  } else {
                    // Default halaman
                    echo '<li class="active"><a href="#tambah" data-toggle="tab"><span class="glyphicon glyphicon-plus"></span> Tambah Paket Wisata</a></li>
                      <li><a href="#lihat" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span> Lihat Paket Wisata</a></li>';
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
                                  <strong>Berhasil</strong> menyimpan data paket wisata.
                                </div>';
                          } elseif ($_GET['balasan'] == 2) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> menyimpan data paket wisata.
                                </div>';
                          } elseif ($_GET['balasan'] == 5) {
                            // Berhasil menambah
                            echo '<div class="alert alert-dismissible alert-success">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Berhasil</strong> mengubah data paket wisata.
                                </div>';
                          } elseif ($_GET['balasan'] == 6) {
                            // Gagal menambah
                            echo '<div class="alert alert-dismissible alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                  <strong>Gagal</strong> mengubah data paket wisata.
                                </div>';
                          }
                        }
                      ?>
                      <!-- End of Balasan -->
                      <?php 
                        if (ISSET($action_ubah)) {
                          // Ubah Paket Wisata
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/ubah_paketwisata.php?id='.$id.'">';
                          $query = mysqli_query($conn, 'SELECT * FROM paket WHERE id_paket="'.$id.'"');
                          if (mysqli_num_rows($query) > 0) {
                            $data = mysqli_fetch_assoc($query);
                            $id_paket = $id;
                            $nama_paket = $data['nama_paket'];
                            $harga = $data['harga'];
                            $hari = $data['hari'];
                            $detail_tujuan = $data['detail_tujuan'];
                            $hotel = $data['hotel_bintang'];
                            $fasilitas = $data['fasilitas'];
                            $jumlah_orang = $data['jumlah_orang'];
                          }
                        } else {
                          // Tambah Paket Wisata
                          echo '<form class="form-horizontal col-sm-6 col-sm-offset-3" method="post" action="../process/tambah_paketwisata.php">';
                        }
                      ?>
                        <fieldset>
                          <h2 style="text-align: center;">Data Paket Wisata</h2><br>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Paket Wisata</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Paket Wisata
                                  echo '<input class="form-control" name="nama_paket" placeholder="Paket 13" type="text" maxlength="10" value="'.$nama_paket.'" required>';
                                } else {
                                  // Tambah Paket Wisata
                                  echo '<input class="form-control" name="nama_paket" placeholder="Paket 13" type="text" maxlength="10" required>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Harga</label>
                            <div class="col-lg-9">
                              <div class="input-group">
                                <span class="input-group-addon" style="background-color: #2b3e50">Rp.</span>
                                <?php 
                                  if (ISSET($action_ubah)) {
                                    // Ubah Paket Wisata
                                    echo '<input class="form-control" name="harga" type="number" placeholder="3.500.000" min="1" value="'.$harga.'" required>';
                                  } else {
                                    // Tambah Paket Wisata
                                    echo '<input class="form-control" name="harga" type="number" placeholder="3.500.000" min="1" required>';
                                  }
                                ?>
                              </div>
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
                                      $orang = $data['jumlah_orang'];

                                      if (ISSET($action_ubah)) {
                                        // Ubah Riwayat
                                        if ($orang == $jumlah_orang) {
                                          echo '<option value="'.$orang.'" selected>'.$orang.' Orang</option>';
                                        } else {
                                          echo '<option value="'.$orang.'">'.$orang.' Orang</option>';
                                        }
                                      } else {
                                        // Tambah Riwayat
                                        echo '<option value="'.$orang.'">'.$orang.' Orang</option>';
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
                                      // Ubah Paket Wisata
                                        if ($hotel == $j) {
                                          echo '<option value="'.$j.'" selected>'.$j.'</option>';
                                        } else {
                                          echo '<option value="'.$j.'">'.$j.'</option>';
                                        }
                                    } else {
                                      // Tambah Paket Wisata
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
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Objek Wisata</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Paket Wisata
                                  echo '<textarea class="form-control" rows="5" name="objek_wisata" placeholder="Objek 1 : Pantai Gili, Objek 2 : Kampung Batik, Objek 3 : Danau Biru" type="text" required>'.$detail_tujuan.'</textarea>';
                                } else {
                                  // Tambah Paket Wisata
                                  echo '<textarea class="form-control" rows="5" name="objek_wisata" placeholder="Objek 1 : Pantai Gili, Objek 2 : Kampung Batik, Objek 3 : Danau Biru" type="text" required></textarea>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 control-label">Fasilitas</label>
                            <div class="col-lg-9">
                              <?php 
                                if (ISSET($action_ubah)) {
                                  // Ubah Paket Wisata
                                  echo '<textarea class="form-control" rows="5" name="fasilitas" placeholder="Transportasi, Penginapan, Konsumsi" type="text" required>'.$fasilitas.'</textarea>';
                                } else {
                                  // Tambah Paket Wisata
                                  echo '<textarea class="form-control" rows="5" name="fasilitas" placeholder="Transportasi, Penginapan, Konsumsi" type="text" required></textarea>';
                                }
                              ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <?php 
                              if (ISSET($action_ubah)) {
                                // Ubah Paket Wisata
                                echo '
                                <div class="col-lg-4 col-lg-offset-2">
                                  <button style="width: 100%;" type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-lg-4">
                                  <a href="paketwisata.php" style="width: 100%;" type="button" name="batal" class="btn btn-warning">Batal</a>
                                </div>';
                              } else {
                                // Tambah Paket Wisata
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
                            <strong>Berhasil</strong> menghapus data paket wisata.
                          </div>';
                    } elseif ($_GET['balasan'] == 4) {
                      // Gagal menghapus
                      echo '<div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            <strong>Gagal</strong> menghapus data paket wisata.
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
                          <th>Nama Paket Wisata</th>
                          <th>Durasi Wisata</th>
                          <th>Hotel Berbintang</th>
                          <th>Jumlah Orang</th>
                          <th>Harga</th>
                          <th>Objek Wisata</th>
                          <th>Fasilitas</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $query = mysqli_query($conn, 'SELECT * FROM paket ORDER BY id_paket DESC');
                          if (mysqli_num_rows($query) > 0) {
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                              $id_paket = $data['id_paket'];
                              $paket = $data['nama_paket'];
                              $harga = $data['harga'];
                              $hari = $data['hari'];
                              $objek_wisata = $data['detail_tujuan'];
                              $hotel = $data['hotel_bintang'];
                              $fasilitas = $data['fasilitas'];
                              $jumlah_orang = $data['jumlah_orang'];

                              echo '
                                <tr>
                                  <td>'.$i.'</td>
                                  <td>'.$paket.'</td>
                                  <td>'.$hari.'</td>
                                  <td>';
                              for ($j=1; $j <= $hotel; $j++) { 
                                echo '<span class="glyphicon glyphicon-star"></span>';
                              }
                              echo '</td>
                                  <td>'.$jumlah_orang.' Orang</td>
                                  <td>Rp. '.number_format($harga,0,'','.').'</td>
                                  <td><a href="" class="btn btn-success buttonObjekWisata" data-toggle="modal" data-target="#detailObjekWisata" data-id="'.$id_paket.'"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                  <td><a href="" class="btn btn-success buttonFasilitas" data-toggle="modal" data-target="#detailFasilitas" data-id="'.$id_paket.'"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                  <td>
                                    <a href="paketwisata.php?action=edit&id='.$id_paket.'" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="../process/hapus_paketwisata.php?id='.$id_paket.'" class="btn btn-danger" onclick="return hapus()"><span class="glyphicon glyphicon-remove"></span></a>
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

    <!-- Modal Detail Objek Wisata -->
    <div class="modal fade" id="detailObjekWisata">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </button>
            <h5 class="modal-title">Objek Wisata</h5>
          </div>
          <div class="modal-body">
            <h3 align="center" id="nama-paket"></h3><hr>
            <textarea class="form-control" type="text" rows="10" disabled id="infoDetailTujuan"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Detail Objek Wisata -->

    <!-- Modal Detail Fasilitas -->
    <div class="modal fade" id="detailFasilitas">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </button>
            <h5 class="modal-title">Fasilitas</h5>
          </div>
          <div class="modal-body">
            <h3 align="center" id="nama-fasilitas"></h3><hr>
            <textarea class="form-control" type="text" rows="10" disabled id="infoDetailFasilitas"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Fasilitas -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Ada fitur baru yaitu prop() untuk radio button atau dropdown -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets2/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.alert').fadeOut(2500,'swing');

        // Modal Info Objek Wisata Dinamis
        $(".buttonObjekWisata").click(function(){
            id_paket = $(this).attr('data-id');
            $.ajax({
                type:'GET',
                url:'../process/info_objekwisata.php?id_paket='+id_paket,
                data:{send:true},
                success:function(data){
                    // Disini belom ada parsing data foto laptop. Karna di db emg blm ada fotonya
                    $('#nama-paket').text(data['nama_paket']);
                    $("#infoDetailTujuan").text(data['detail_tujuan']);
                }
            });
        });

        // Modal Info Fasilitas Dinamis
        $(".buttonFasilitas").click(function(){
            id_paket = $(this).attr('data-id');
            $.ajax({
                type:'GET',
                url:'../process/info_objekwisata.php?id='+id_paket,
                data:{send:true},
                success:function(data){
                    // Disini belom ada parsing data foto laptop. Karna di db emg blm ada fotonya
                    $('#nama-fasilitas').text(data['nama_paket']);
                    $("#infoDetailFasilitas").text(data['fasilitas']);
                }
            });
        });

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