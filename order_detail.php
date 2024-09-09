<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Order Detail</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Order Detail</li>
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
                <div class="col-sm-10">
                    <!-- <a href="?page=produk" style="width:10px;height:20px" class=" btn-primary btn-sm pull-right"> X</a> -->
                    <div class="panel-heading"></div>
                    <div class="panel panel-footer alert-primary">
                        <div class="panel-body">
                            <p>Untuk proses penyewaan pembayaran dilakukan di awal sesuai dengan jumlah yang di tentukan, dan pelunasan dilakukan di <b> <?= $tittle ?></b></p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <a href="?page=konfirmasi_pembayaran" style="margin-bottom:10px" class="btn btn-sm btn-danger"> <i class="fa fa-reply"> </i><i> Back</i> </a>
                        <a style="margin-bottom:10px" href="./cetak_order_detail.php?p=<?= $_GET['p'] ?>&id=<?= $_GET['id'] ?>&nm=<?= $_GET['nm'] ?>" target="_blank" class="btn btn-sm btn-success "> <span class="fa fa-print"></span> Cetak</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Gambar </th>
                                    <th>Nama </th>
                                    <th>Harga </th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Selesai</th>
                                    <th width="20px">Lama Meminjam</th>
                                    <th>Jumlah Bayar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id_member = $_SESSION['member']['id_member'];
                                $no = 1;
                                $total = 0;
                                $select = mysqli_query($koneksi, "SELECT * FROM tbl_penyewaan_detail a Join tbl_produk b ON a.id_produk=b.id_produk WHERE a.id_penyewaan = '$_GET[p]'");
                                while ($d = mysqli_fetch_array($select)) {
                                    $subtotal = $d['harga_produk'];
                                    $ttl = $d['harga_produk'] ;
                                    $total = +$total + $ttl;
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img width="200px" src="images/produk/<?= $d['img_produk'] ?>" alt="No SELECTED">
                                        </td>
                                        <td>Kode produk: <?= $d['kode_produk'] ?>| <br><?= $d['nama_produk'] ?></td>
                                        <td>Rp. <?= number_format($d['harga_produk'], 2) ?></td>
                                        <td><?= my_tanggal($d['tanggal_peminjaman']) ?></td>
                                        <td><?= my_tanggal($d['tanggal_selesai']) ?></td>
                                        <td><?= $d['lama_hari'] ?> Hari</td>
                                        <td>Rp. <?= number_format($subtotal, 2) ?>
                                        </td>

                                    </tr>
                                <?php  }  ?>
                                <tr>
                                    <td align="center" colspan="7">Total Keseluruhan</td>

                                    <td>Rp <?= number_format($total, 2) ?></td>
                                </tr>
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