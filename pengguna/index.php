<?php 
  session_start();
  if ((!ISSET($_SESSION['email'])) AND (!ISSET($_SESSION['password']))) {
    // Mencegah direct access melalui url
    header('Location: autentikasi/index.php');
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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
          <div class="panel panel-primary">
            <div class="panel-heading" align="center">Form Pemesanan</div>
            <div class="panel-body">
              <?php 
                if (ISSET($_GET['balasan'])) {
                  if ($_GET['balasan'] == 1) {
                    // Berhasil pesan
                    echo '<div class="alert alert-dismissible alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                          <strong>Berhasil</strong> melakukan pemesanan paket wisata.
                        </div>';
                  } elseif ($_GET['balasan'] == 2) {
                    // Gagal pesan
                    echo '<div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                          <strong>Gagal</strong> melakukan pemesanan paket wisata.
                        </div>';
                  }
                }
              ?>
              <!-- <hr> -->
              <form class="form-horizontal" method="POST" action="" id="form-pesan">
                <div class="form-group">
                  <label class="col-lg-3 col-sm-offset-1 control-label">Jumlah Orang</label>
                  <div class="col-lg-6">
                    <select class="form-control" name="jumlah_orang" required id="dropdown_orang">
                      <option value=""></option>
                      <?php 
                        $query = mysqli_query($conn, 'SELECT id_paket, jumlah_orang FROM paket GROUP BY jumlah_orang ORDER BY id_paket ASC ');
                        if (mysqli_num_rows($query) > 0) {
                          while ($data = mysqli_fetch_assoc($query)) {
                            $orang = $data['jumlah_orang'];
                            echo '<option value="'.$orang.'">'.$orang.' Orang</option>';
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 col-sm-offset-1 control-label">Hotel Berbintang</label>
                  <div class="col-lg-6">
                    <select class="form-control" name="hotel" id="dropdown_hotel" required>
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
                  <label class="col-lg-3 col-sm-offset-1 control-label">Durasi Wisata</label>
                  <div class="col-lg-6">
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
                <div class="form-group">
                  <label class="col-lg-3 col-sm-offset-1 control-label">Waktu Berlaku</label>
                  <div class="col-lg-6">
                    <input class="form-control" name="tgl_paket" type="date" required>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-3 col-sm-offset-3">
                    <button class="btn btn-primary" id="form-submit" type="submit" name="pesan">Pesan</button>
                  </div>
                  <div class="col-sm-3">
                    <a href="../process/logout.php" style="width: 100%;" type="button" name="keluar" class="btn btn-default">Keluar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Pemesanan -->
    <div class="modal fade" id="paketKonfirmasi">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Konfirmasi Pemesanan<!-- Terisi Nama Paket melalui AJAX --></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal col-sm-12">
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
                    <option id="jumlah_orang"></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Hotel Berbintang</label>
                <div class="col-lg-8">
                  <select class="form-control" disabled="" required>
                    <option id="hotel"></option>
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
          <div class="modal-footer">
            <button class="btn btn-primary" id="konfirm-pesan" type="button" name="konfirm-pesan">Pesan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Modal Pemesanan -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Ada fitur baru yaitu prop() untuk radio button atau dropdown -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.alert').fadeOut(2500,'swing');

        // Muncul modal paket yang dipesan sekaligus submit via ajax
        $('#form-pesan').on('submit',function(event){
          event.preventDefault();
          var hari = $("input[name='hari']:checked").val();
          var orang = $("#dropdown_orang").val();
          var hotel = $("#dropdown_hotel").val();
          var tgl = $("input[name='tgl_paket']").val();
          //alert(h+' '+o+' '+htl+' '+tgl);
          $.ajax({
            type: 'GET',
            url: '../process/info_pesan.php',
            data: {hari:hari, orang:orang, hotel:hotel, tgl_paket:tgl},
            success:function(data){
              //alert(data['hari']);
              //$('.modal-title').text(data['nama_paket']);
              $('#nama_paket').attr('value',data['nama_paket']);
              $('#harga').attr('value',data['harga_formated']);
              $('#jumlah_orang').text(data['jumlah_orang']);
              $('#hotel').text(data['hotel_bintang']);
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
              $('#paketKonfirmasi').modal('show');
            }
          });
        });

        // Konfirmasi pesanan
        $('#konfirm-pesan').on('click',function(event){
          /*var id_paket = data['id_paket'];
          var hari = data['hari'];
          var hotel = data['hotel_bintang'];
          var orang = data['jumlah_orang'];
          var tgl_paket = data['tgl_paket'];*/
          var hari = $("input[name='hari']:checked").val();
          var orang = $("#dropdown_orang").val();
          var hotel = $("#dropdown_hotel").val();
          var tgl = $("input[name='tgl_paket']").val();

          //alert(hari);
          $.ajax({
            type:'POST',
            url:'../process/konfirm_pesan.php',
            data:{hari:hari, hotel:hotel, orang:orang, tgl_paket:tgl},
           /* contentType: false,
            processData: false,*/
            success:function(data){
              //alert('send : '+data['query']);
              if (data['query'] == true) {
                // Query berhasil
                $('#paketKonfirmasi').modal('hide');
                //window.location.reload(true);
                window.location.replace('http://localhost/TA_Meidy/pengguna/index.php?balasan=1');
              } else {
                // Query gagal
                window.location.replace('http://localhost/TA_Meidy/pengguna/index.php?balasan=2');
              }
            }
          });
        });
      });
    </script>
  </body>
</html>