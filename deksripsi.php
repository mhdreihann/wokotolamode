<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Pelaminan</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Pelaminan</li>
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
            <?php
            $select = mysqli_query($koneksi, "SELECT b.nama_kategori, a.* from tbl_produk a JOIN tbl_kategori b on a.id_kategori=b.id_kategori WHERE a.id_produk= '$_GET[p]'");
            $d = mysqli_fetch_array($select); ?>
            <div class="col-sm-8">
                <div class="panel panel-warning ">
                    <!-- <a href="?page=produk" style="width:10px;height:20px" class=" btn-primary btn-sm pull-right"> X</a> -->
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <img class="img-responsive" style="width:1000px;height:500px" src="images/produk/<?= $d['img_produk'] ?>" alt="image">
                    </div>
                    <div class="panel panel-warning">
                        <div class="panel-heading"></div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <h5>No produk: <?= $d['kode_produk'] ?>| <?= $d['nama_kategori'] ?></h5>

                                 
                                    <h3><?= $d['nama_produk'] ?></h3>
                                    
                            <?php if ( $d['stok'] == 0) { ?>
                            
                            <p style="color:red ;font-size:10x"><i>Stok Telah Habis Disewa</i></p>
                        <?php } else{?>
                            <h5>STOK : <?= $d['stok'] ?> </h5>
                            <?php } ?> 
                                    <h4>Rp. <?= number_format($d['harga_produk'], 2) ?></h4>
                                    <a href="?page=produk" class="btn btn-danger btn-sm"><span class="fa fa-reply"></span> Back</a>
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

                                <div class="col-sm-8">
                                    <label for="">Deskripsi</label>
                                    <h6><?= $d['deskripsi_produk'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <?php
                $select = mysqli_query($koneksi, "SELECT b.nama_kategori, a.* from tbl_produk a JOIN tbl_kategori b on a.id_kategori=b.id_kategori where a.id_produk!= '$_GET[p]' AND a.status_produk IS  NULL ORDER BY a.id_produk DESC LIMIT 3");
                $no = 1;
                while ($d = mysqli_fetch_array($select)) { ?>

                    <div class="panel panel-warning">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <img class="img-responsive" style="width:370px;height:210px" src="images/produk/<?= $d['img_produk'] ?>" alt="image">
                            <h5>No produk: <?= $d['kode_produk'] ?>| <?= $d['nama_kategori'] ?></h5>
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
                         
                            <h5 style="margin-top:5px"><?= $d['nama_produk'] ?></h5>
                             
                            <?php if ( $d['stok'] == 0) { ?>
                            
                            <p style="color:red ;font-size:10x"><i>Stok Telah Habis Disewa</i></p>
                        <?php } else{?>
                            <h5>STOK : <?= $d['stok'] ?> </h5>
                            <?php } ?> 
                            <h5>Rp. <?= number_format($d['harga_produk'], 2) ?> </h5>

                            </a>
                        </div>
                    </div>


                <?php } ?>
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