<?php

// $title = "Detail  : " . $titles;
include_once "header.php"; ?>
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>History</h2>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li>History</li>
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
            <h2> History Pesanan</h2>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Nama: <?= $_SESSION['member']['nama_member'];?> </strong></h5>
          </div>
          <div class="panel-body">
            <hr>
            <?php
              $member = $_SESSION['member']['id_member'];

                $sqlt = mysqli_query($koneksi,"SELECT * FROM tbl_boking a LEFT JOIN tbl_member c ON a.id_member=c.id_member LEFT JOIN jam ON jam.id_jam=a.id_jam WHERE a.id_member='$member' AND status_boking ='1' ORDER BY a.id_boking DESC ");
                $no=1;
                while($xx = mysqli_fetch_array($sqlt)){
                    // LEFT JOIN tbl_loket d ON d.id_loket=a.id_loket  LEFT JOIN jam ON jam.id=a.jam
              ?>
            <div class="col-md-4">
              <div class="box">
                <div class="box-body">
                  <h3><i><b></b></h3></i>
                  <p>Tanggal Pemesanan: <?= my_tanggal($xx['tanggal_boking']) ?> &nbsp; &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= $xx['no_boking'] ?></b>
                    <hr>
                    <p>Nama Pemesan : <b><?= $xx['nama_member'] ?></b> &nbsp; <b
                        style="width: 0px; height: 200px; border: 1px #000 solid;"></b>&nbsp;&nbsp;&nbsp;&nbsp;<i></b><br>Jam
                        Boking : <b><?= $xx['jam'] ?></b></i>
                      <br><i>Jumlah : <b><?= $xx['jumlah_meja'] ?></b> Meja Dipesan</i>
                      <?php
                      $id_boking = $xx['id_boking'];
                      $data = mysqli_query($koneksi,"SELECT * FROM tbl_boking_detail WHERE id_boking='$id_boking'");
                      foreach($data as $a): ?>
                      <br><i>No Meja : <b><?= $a['id_meja'] ?></b>,</i>
                      <?php endforeach ?>

                      <br><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-info"
                          onclick="tampilDetail(<?= $xx['id_boking'] ?>)" style="width:130px"> <span
                            class=" fa fa-product-hunt "></span> Detail</a>

                    </p>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<!-- Modal -->
<div id="modalDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pesanan</h4>
      </div>
      <div class="modal-body">
     <!-- row1 -->
        <div class="row">
          <div class="col-md-6">
              <table>
                <h4><i> <u>Detail Boking  </u> </i></h4>
                <tr>
                  <td><strong>No Boking</strong></td>
                  <td>: </td>
                  <td id="no_boking"></td>
                </tr>
                <tr>
                  <td><strong>Atas Nama</strong> </td>
                  <td>: </td>
                  <td id="nama_member"></td>
                </tr>
                <tr>
                  <td><strong>Tanggal Boking </strong></td>
                  <td>: </td>
                  <td id="tanggal_boking"></td>
                </tr>
                <tr>
                  <td><strong>Jam Boking </strong></td>
                  <td>: </td>
                  <td id="jam"></td>
                </tr>
              </table>
          </div>

          <div class="col-md-6">
              <table>
                <h4><i>--------------------------------</i></h4>
                <strong>Meja Dipilih</strong> 
                <p id="meja_dipilih"></p>
        
                <tr>
                  <td><strong>Jumlah Meja</strong></td>
                  <td>: </td>
                  <td id="jumlah_meja"></td>
                </tr>
              
              </table>
          </div>
        </div>
     <!-- /row1 -->
                        <hr>
     <!-- row 2 -->
     <div class="row" style="margin-top:30px">
          <div class="col-md-6">
              <table>
                <h4><i> <u>Detal Pesanan </u> </i></h4>
                <tr>
                  <td><strong>No Pemesanan</strong></td>
                  <td>: </td>
                  <td id="id_pemesanan"></td>
                </tr>
                <tr>
                  <td><strong>Atas Nama </strong></td>
                  <td>: </td>
                  <td id="atas_nama"></td>
                </tr>
              </table>
          </div>

          <div class="col-md-6">
              <table>
              <h4><i>--------------------------------</i></h4>
              <strong>List Pesanan</strong> 
                <p id="jumlah_pesan"></p>
        
                <tr>
                  <td><strong>Total Pesanan</strong></td>
                  <td>: </td>
                  <td id="total_pesan"></td>
                </tr>
                <tr>
                  <td><strong>Total Pembayaran</strong></td>
                  <td>: </td>
                  <td id="total_bayar"></td>
                </tr>
              
              </table>
          </div>
        </div>
     <!-- /row 2 -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>