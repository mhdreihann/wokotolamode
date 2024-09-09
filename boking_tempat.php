<?php

// $title = "Detail  : " . $titles;
include_once "header.php"; ?>
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Pemesanan</h2>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li>Pemesanan</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<div id="contact" class="contact-area">
  <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container ">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center"><br>
            <h2> Pemesanan Kamar</h2>
          </div>
        </div>
      </div>
     <?php 
     $member = $_SESSION['member']['id_member'];
     $count = $koneksi->query("SELECT count(id_boking) as hitung FROM tbl_boking Where status_boking IS NULL AND id_member ='$member' ")->fetch_assoc();
      ?>
      <div class="col-md-12">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong style="color:#fff" > Form Pemesanan Kamar </strong></h5>
          </div>
          <div class="panel-body">
          <ul class="nav nav-tabs">
            <li class="active"><a href="index.php?page=boking_tempat">Pemesanan Kamar </a></li>
            <!-- <li><a href="index.php?page=meja_diboking">Meja diboking & Menu <sup style="color:red"><b><?= $count['hitung'] ?></b></sup></a></li> -->
          </ul>
            <form action="prosespesan.php" method="post" enctype="multipart/form-data">
              <tr>
                <td>
                  <!-- <h5><img src="admin/superadmin/images/loket/<?= $foto_loket; ?>" border="0" width="350px" height="150px"></h5> -->
                </td>
              </tr>
              <tr>
                <td>
                  <i>
                    <h2 style="padding-top:12px">PIlih Kamar</h2>
                  </i>
                </td>
              </tr>
              <div class="form-group ">
                <label class="control-label" for="inputWarning1">Atas Nama </label>
                <input type="text" class="form-control" name="nama" value="<?= $_SESSION['member']['nama_member']; ?>"
                  id="nama">
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Kategori kamar </label> <b id="jb"></b>
                    <select name="kategori" id="kategori" class="form-control">
                      <option value="">-- PILIH KATEGORI KAMAR --</option>
                      <?php $data = $koneksi->query("SELECT * FROM tbl_kategori");
                  foreach ($data as $c) { ?>
                      <option value="<?= $c['id_kategori'] ?>"><?= $c['nama_kategori'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Tanggal Boking </label> <b id="tgl"></b>
                    <input type="date" class="form-control" name="tgl" id="tgl">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Berapa Hari </label> <b id="lama_hari"></b>
                    <input type="number" class="form-control" name="lama_hari" id="lama_hari">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Jumlah Bayar </label> <b id="jumlah_bayar"></b>
                    <input type="text" readonly  placeholder="Rp. -," class="form-control" name="jumlah_bayar" id="jumlah_bayar">
                  </div>
                </div>
              </div>
                
              </div>

              <!-- GROUP -->
              <div class="center">
              <div style="margin-left:20px">
              <label for=""> <i>Nomor Kamar</i> :</label>
                    <div class="">
                      <input type='checkbox' style="visibility: hidden;">
                    </div>
              </div>
                <div class='row'>

                  <div class="col-sm-2 ">
                    <div class="form-group">
                      <!-- <input type='checkbox' class="kasir" disabled> -->
                    </div>
                  </div>
                  <div class="col-sm-2 col-2">

                    <div class="form-group">
                      <input type='checkbox' id="meja1" name='meja[]' value="1" class="a" disabled>
                    </div>
                    <div class="form-group">
                      <input type='checkbox' id="meja2" name='meja[]' value="2" class="b" disabled>
                    </div>
                  </div>
                  <div class="col-sm-2 col-2">
                  <div class="form-group">
                      <input type='checkbox' id="meja3" name='meja[]' value="3" class="c" disabled>
                    </div>

                    <div class="form-group">
                      <input type='checkbox' id="meja4" name='meja[]' value="4" class="d" disabled>
                    </div>
                  </div>
                  <div class="col-sm-2 col-2">
                    <div class="form-group">
                      <input type='checkbox' id="meja5" name='meja[]' value="5" class="e" disabled>
                    </div>
                    <div class="form-group">
                      <input type='checkbox' id="meja6" name='meja[]' value="6" class="f" disabled>
                    </div>
                  </div>
                  <div class="col-sm-2 col-2">
                    <div class="form-group">
                      <input type='checkbox' id="meja7" name='meja[]' value="7" class="g" disabled>
                    </div>
                    <div class="form-group">
                      <input type='checkbox' id="meja8" name='meja[]' value="8" class="h" disabled>
                    </div>
                 </div>
                  <div class="col-sm-2 col-2">
                  <div class="form-group">
                      <input type='checkbox' id="meja9" name='meja[]' value="9" class="i" disabled>
                    </div>
                    <div class="form-group">
                      <input type='checkbox' id="meja10" name='meja[]' value="10" class="j" disabled>
                    </div>
                  </div>
                  <!-- row -->
                </div>
              </div>
              <!-- / GROUP -->
              <div class="input-group1 text-left" style="margin-top:10px  ">
                <button class="btn btn-primary" name="pesan1" type="submit">Submit Boking</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  function ambilMeja() {
    var data_ajax = {
      jam: document.getElementsByName("jam")[0].value,
      tgl_pesan: document.getElementsByName("tgl")[0].value
    }
    if (data_ajax.jam && data_ajax.tgl_pesan) {

      $.ajax({
        method: "POST",
        url: "ajax_ambil_meja.php",
        data: data_ajax,
        success: function (data) {
          console.log(data)
          data = JSON.parse(data)
          var status_meja = false;
          var warna_meja = "";
          for (var x = 0; x < data.length; x++) {
            if (data[x].status_meja == "0") {
              status_meja = true;
              warna_meja = "#000000";
            } else {
              status_meja = false;
              warna_meja = "#ebebeb";
            }
            document.getElementById("meja" + data[x].id_meja).disabled = status_meja;
            document.getElementById("meja" + data[x].id_meja).style.backgroundColor = warna_meja;
            // data[x] meja keberapa
          }
          // document.getElementById("daftar_meja").innerHTML = data;
        }
      })
    }
  }


  document.getElementsByName("jam")[0].addEventListener("change", ambilMeja)
  document.getElementsByName("tgl")[0].addEventListener("change", ambilMeja)
</script>