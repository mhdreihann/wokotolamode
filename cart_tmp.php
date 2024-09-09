<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Proses Penyewaan</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Proses Penyewaan</li>
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
                            <p>Untuk proses penyewaan pembayaran dilakukan di awal sesuai dengan jumlah yang di tentukan, dan pelunasan dilakukan di <b><?= $tittle ?></b></p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Gambar produk</th>
                                    <th>Nama produk</th>
                                    <th>Harga produk</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th width="20px">Lama Penyewaan</th>
                                    <th>Request/Catatan Perubahan</th>
                                    <th>SubTotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id_member = $_SESSION['member']['id_member'];
                                $no = 1;
                                $total = 0;
                                $select = mysqli_query($koneksi, "SELECT * FROM tbl_penyewaan_tmp a Join tbl_produk b ON a.id_produk=b.id_produk where id_member = $id_member");
                                while ($d = mysqli_fetch_array($select)) {
                                    // $subtotal = $d['lama_hari'] * $d['harga_produk'];
                                    $subtotal = $d['harga_produk'];
                                    $ttl = $d['harga_produk'];
                                    $total = +$total + $ttl;
                                    $lama = $d['lama_hari'] ;
                                    $stok = $d['stok'] ;
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
                                        <td><?= $d['catatan'] ?></td>
                                        <td>Rp. <?= number_format( $d['lama_hari'] * $subtotal, 2) ?>


                                        </td>
                                        <td>
                                            <a href="?page=cart_delete&id=<?= $d['id_penyewaan_tmp'] ?>" class="btn-danger btn btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php  }  ?>
                                <tr>
                                    <td align="center" colspan="7">Total Keseluruhan</td>
                                    <td>Rp <?= number_format( $lama * $total, 2) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-sm-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <h4>Detail List</h4>
                        <hr>
                        <table>
                            <tr>
                                <th>Atas Nama</th>
                            </tr>
                            <tr>
                                <td><?= $_SESSION['member']['nama_member'] ?></td>
                            </tr>
                            <tr>
                                <th>Total Keseluruhan</th>
                            </tr>
                            <tr>
                                <td>Rp. <?= number_format($lama * $total, 2) ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table>
                            <tr>
                                <th style="font-size:12px">Minimal Pembayaran Awal</th>
                            </tr>

                            <tr>
                                <td>Rp. <?= number_format($lama * $total / 5, 2) ?></td>
                            </tr>
                        </table>
                        <a href="?page=aksi_order&idm=<?= $id_member ?>&p=<?= $total ?>&stok=<?= $stok ?>" style="margin-top:20px" class="btn-danger btn btn-sm">Checkout Penyewaan</a>
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