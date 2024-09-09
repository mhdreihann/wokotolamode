<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Menu</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Menu</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="about-box">
    <div class="container">
        <div class="section-title text-center">
            <h3><?= $tittle ?></h3>
            <h5>Member Bisa Melakukan Kostumisasi Jika Adanya Pelanggan Melakukan Penabahan Barang Yang Di Ingginkan dengan Menghbungi kontak di dalam aplikasi atau WhatsApp, Jika Ada Penambahan Barang Maka Harga Bisa Saja Berubah Pada Paket yang ditentukan Tergantung Barang Apa Saja Yang Di tambahakan Pelanggan</h5>
        </div>
        <hr>
        <div class="row">
            <?php
   $idx = $_SESSION['member']['id_member'];
            $slx = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from tbl_penyewaan Where id_member= '$idx'"));

            $select = mysqli_query($koneksi, "SELECT b.nama_kategori, a.* from tbl_produk a JOIN tbl_kategori b on a.id_kategori=b.id_kategori ORDER BY a.id_produk DESC");
            $no = 1;
            while ($d = mysqli_fetch_array($select)) { ?>
                <div class="col-sm-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <img class="img-responsive" style="width:500px;height:300px" src="images/produk/<?= $d['img_produk'] ?>" alt="image">

                            <h5>Kode produk: <?= $d['kode_produk'] ?>| <?= $d['nama_kategori'] ?></h5>
<!-- 
                            <?php if (($d['status_produk'] == NULL) || $d['status_produk'] == 0) { ?>
                                <p style="color:green ;font-size:10x"> <i>Tidak Dalam Sewa</i> </p>
                            <?php } elseif ($d['status_produk'] == 1 &&  $slx['id_member']== $idx) { ?>
                                <p style="color:red ;font-size:10x"><i>Disewa</i></p>
                            <?php } else{?>

                                <p style="color:green ;font-size:10x"> <i>Tidak Dalam Sewa</i> </p>
                                <?php } ?> -->
                            <div style="margin-top:3px">
                                <a href="?page=deksripsi&p=<?= $d['id_produk'] ?>"> <button class="btn btn-warning btn-sm"> <span class="fa fa-info-circle "></span> Detail</button> </a>

                                <?php if (@$_SESSION['member']['id_member']) : ?>

                               

                                    <?php if ( $d['stok'] == 0) { ?>
                            
                                                       <button class="btn btn-warning btn-sm" onclick="produk_disewa(<?= $d['id_produk'] ?>)" id="jumlahBeli2"> <span class="fa fa-check"></span> Pesan</button>
                                         
                        <?php } else{?>

                                          <button class="btn btn-warning btn-sm" onclick="ambil_produk(<?= $d['id_produk'] ?>)" id="jumlahBeli"> <span class="fa fa-check"></span> Pesan</button>
                            <?php } ?> 


                                <?php else : ?>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#loginLu"> <span class="fa fa-check"></span> Pesan </button>
                                <?php endif; ?>

                            </div>
                            <h3 style="margin-top:10px"><?= $d['nama_produk'] ?></h3>

                       
                            <?php if ( $d['stok'] == 0) { ?>
                            
                                <p style="color:red ;font-size:10x"><i>Stok Telah Habis Disewa</i></p>
                            <?php } else{?>
                                <h5>STOK : <?= $d['stok'] ?> </h5>
                                <?php } ?> 


                            <h5>Rp. <?= number_format($d['harga_produk'], 2) ?> </h5>
                            <a href="?page=deksripsi">
                               
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
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