<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Pembayaran</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li> Pembayaran</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="about-box">
    <div style="padding-right:50px;padding-left:50px">
        <hr>
        <div class="row">

            <div class="panel panel-primary ">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <!-- <a href="?page=produk" style="width:10px;height:20px" class=" btn-primary btn-sm pull-right"> X</a> -->
                    <div class="panel-heading"></div>
                    <div class="panel panel-footer alert-primary">
                        <div class="panel-body">
                      
                            <p>Untuk proses penyewaan pembayaran dilakukan di awal sesuai dengan jumlah yang di tentukan, dan pelunasan dilakukan di <b>  <?= $tittle ?></b></p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>

                                    <th>Nomor Pesanan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Besar Pembayaran</th>
                                    <th>Pembayaran Tahap Awal </th>
                                    <th> Sisa Pembayaran </th>
                                    <th>Status Pembayaran</th>
                                    <th>Detail Penyewaan</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id_member = $_SESSION['member']['id_member'];
                                $nama_member = $_SESSION['member']['nama_member'];
                                $no = 1;
                                $total = 0;
                             
                                // echo "SELECT * FROM tbl_penyewaan where id_member = '$id_member'";
                                $select = mysqli_query($koneksi, "SELECT * FROM tbl_penyewaan a JOIN tbl_penyewaan_detail b ON a.id_penyewaan=b.id_penyewaan where id_member = '$id_member'");
                                while ($d = mysqli_fetch_array($select)) {
                                    $count = $koneksi->query("SELECT  SUM(harga_produk * lama_hari)  as count_jml FROM tbl_penyewaan_detail  join tbl_produk  ON tbl_penyewaan_detail.id_produk=tbl_produk.id_produk where id_penyewaan = '$d[id_penyewaan]' ")->fetch_assoc();
                                    $count = $koneksi->query("SELECT  SUM(harga_produk * lama_hari)  as count_jml FROM tbl_penyewaan_detail  join tbl_produk  ON tbl_penyewaan_detail.id_produk=tbl_produk.id_produk where id_penyewaan = '$d[id_penyewaan]' ")->fetch_assoc();
                                   
                                   
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td>Klik Untuk Bayar - <a href="?page=konfirmasi_pembayaran_upload&p=<?= $d['id_penyewaan'] ?>" style="color:#44609c"> <u> <i><?= $d['id_penyewaan'] ?></i> </u> </a></td>
                                        <td><?= my_tanggal($d['tanggal_sewa']) ?></td>
                                        <!-- <td>Rp. <?= number_format($count['count_jml'], 2) ?></td> -->
                                        <td>Rp. <?= number_format($d['lama_hari'] * $d['total_pembayaran'], 2) ?></td>
                                        <td>Rp. <?= number_format( $count['count_jml']/5, 2) ?></td>
                                        <!-- xx -->
                                      
                                        <?php if ($d['status_penyewaan'] == NULL) { ?>
                                            <td style="color:red">-</td>
                                        <?php } elseif ($d['status_penyewaan'] == 1) { ?>
                                            <td>-
                                            </td>
                                        <?php } elseif ($d['status_penyewaan'] == 8) { ?>
                                            <td>Rp. <?= number_format(($d['lama_hari'] * $d['total_pembayaran'])- $count['count_jml']/5, 2) ?></td>
                                            <?php } elseif ( $d['status_penyewaan'] == 9) { ?>
                                            <td><span class="fa fa-check"></span> - </td>

                                        <?php } else { ?>
                                            <td><span class="fa fa-check"></span> Lunas <br>

                                
                                            </td>
                                        <?php } ?>
                                        <!-- xx -->
                                        <?php if ($d['status_penyewaan'] == NULL) { ?>
                                            <td style="color:red">Belum ada Pembayaran</td>
                                        <?php } elseif ($d['status_penyewaan'] == 1) { ?>
                                            <td><span class="fa fa-check"></span> Menunggu Konfirmasi Pembayaran<br>

                                            </td>
                                        <?php } elseif ($d['status_penyewaan'] == 8) { ?>
                                            <td><span class="fa fa-check"></span>Pembayaran Tahap Awal
                                            <?php } elseif ($d['status_penyewaan'] == 9) { ?>
                                            <td><span class="fa fa-check"></span> Dibatalkan/ Uang akan dikembalikan </td>

                                        <?php } else { ?>
                                            <td><span class="fa fa-check"></span> Pembayaran Selesai <br>

                                
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <a href="?page=order_detail&p=<?= $d['id_penyewaan'] ?>&id=<?= $id_member ?>&nm=<?= $nama_member ?>" class="btn btn-info "> <span class="fa fa-info-circle"></span> Detail</a>
                                            <a href="cetak_order_detail.php?p=<?= $d['id_penyewaan'] ?>&id=<?= $id_member ?>&nm=<?= $nama_member ?>" target="_blank" class="btn btn-success "> <span class="fa fa-print"></span> Cetak</a>
                                        </td>


                                    </tr>
                                <?php  }  ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div id="loginLu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Silahkan Login Terlebih Dahulu..</p>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>

    </div>
</div>