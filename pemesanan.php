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
            <h3><i></i></h3>
        </div>
        <div class="row">
            <div class="col-md-9">
                <hr>
                <div class="row">
                    <?php
        $select = mysqli_query($koneksi, "SELECT * from tbl_produk ORDER BY id_produk DESC");
        $no=1;
        while($d = mysqli_fetch_array($select)){ ?>
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <img witdh="500px" class="img-responsive" style="width:150px;height:150px"
                                    src="images/produk/<?= $d['img_produk'] ?>" alt="image">

                                <div style="margin-top:5px">
                                    <a href="?page=deksripsi&m=<?= $_GET['m']?>&p=<?= $d['id_produk'] ?>"> <button class="btn btn-primary btn-sm"> <span
                                                class="fa fa-list"></span> Detail</button> </a>

                                    <button class="btn btn-primary btn-sm" onclick="ambil_produk(<?= $d['id_produk']?>)"
                                        id="jumlahBeli"> <span class="fa fa-check"></span> Pesan</button>
                                </div>
                                <h3><?= $d['nama_produk'] ?></h3>
                                <sup>Rp. <?= number_format($d['harga_produk'], 2) ?></sup>
                                <a href="?page=deksripsi">
                                    <h6><?= substr($d['deskripsi_produk'],0,45) ?>...</h6>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="panel panel-info ">
                        <div class="panel-heading ">
                            <h2 class="panel-title  " style="color:#FFF"> <span class="fa fa-list"></span><strong> List Dipilih</strong></h5>
                        </div>
                        <div class="panel-body">
                            <?php
                                $file = "json/chart.json";
                                $detail = file_get_contents($file);
                                $data = json_decode($detail, true);  
                                $countTotal = 0;
                                $total_list = 0;
                                $dataJson = $data['chart'];
                            foreach($data['chart'] as $key => $detail){ 
                                $xx = $koneksi->query("SELECT nama_produk, harga_produk FROM tbl_produk where id_produk = '$detail[id_produk]'")->fetch_assoc();   
                                $countTotal = $countTotal += $detail['jumlah_pesan'];
                                $total_list = $total_list += $xx['harga_produk'] * $detail['jumlah_pesan'];
                                $id_produk[] = $detail['id_produk'];
                                $jumlah_pesan[] = $detail['jumlah_pesan'];
                               
                            ?>
                            
                            <div class="panel panel-success panel-dashboard">
                                <div class="panel-heading centered">
                                  <h6><span style="margin-right:5px"><a href="chart_hapus.php?id_chart=<?= $detail['id_chart'] ?>&m=<?= $detail['id_boking'] ?> "><b>X</b></a></span><?= $key+1 ?>. <?= substr( $xx['nama_produk'], 0,15) ?> ..| <?= $detail['jumlah_pesan'] ?> | </h6>
                                 <!-- <h6>Rp. <?= number_format($xx['harga_produk'],2) ?></h6> -->
                                 <sup>Rp.<?= number_format($xx['harga_produk'],2) ?> X <?= $detail['jumlah_pesan'] ?> = Rp.<?= number_format($xx['harga_produk'] * $detail['jumlah_pesan'],2) ?></sup>
                                </div>
                            </div>
                            <?php } ?>
                                <?php if($data['chart'] == null){ ?>
                                  ! <b><i>  Belum adam list</i></b>
                                <?php } else{?>
                            
                               <form action="pesan_makanan.php" method="POST">
                                    <input type="hidden" name="id_boking" value="<?= $detail['id_boking'] ?>">
                                    <input type="hidden" name="id_member" value="<?= $detail['id_member'] ?>">
                                    <input type="hidden" name="total_pesan" value="<?=  $countTotal?>">
                                 
                                   <?php foreach($id_produk as $key => $kuy){ ?>
                                   <input type="hidden" name="id_produk[]" value="<?= $kuy ?>">
                                   <?php } ?>

                                   <?php foreach($jumlah_pesan as $key => $kuy){ ?>
                                   <input type="hidden" name="jumlah_pesan[]" value="<?= $kuy ?>">
                                    <?php } ?>
                                    <h6>Total List: Rp. <?php echo number_format($total_list,2) ?></h6>
                                   <button class="btn btn-primary btn-sm">Checkout pesanan</button>
                               </form>
                         
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>