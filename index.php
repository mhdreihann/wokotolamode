<!DOCTYPE html>
<html lang="en">
<?php
include 'koneksi.php';
@session_start();      // memulai session
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "error") {
        echo "<script>err
                alert('Mohon Login Terlebih Dahulu!');
                window.location='index.php';
              </script>";
    }
}
?>
<!-- Basic -->

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title><?= $tittle ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<!-- <link rel="shortcut icon" href="images/logo/logo.jpg" type="image/x-icon" /> -->
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- Colors CSS -->
<link rel="stylesheet" href="css/colors.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">
<!--  -->
<link rel="stylesheet" href="style1.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
<!-- Modernizer for Portfolio -->
<script src="js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .center input[type="checkbox"].kasir:after {
        content: 'kasir';
        background: #ebebeb;
    }
</style>
</head>

<body class="realestate_version">

    <!-- LOADER -->
    <!-- <div id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->
    <?php include "header.php"; ?>

    <?php include "content.php"; ?>
    <!-- ============================================================================================================================== -->
    <!-- Logika Jika Selesai Baru Bisa Di Order -->

    <?php


    $ambil = $koneksi->query('SELECT * FROM tbl_penyewaan_detail');
    while ($d = $ambil->fetch_assoc()) {


        $timestamp = strtotime($d['tanggal_selesai']); // 1589493600
        $tambah_satuhari = date('Y-m-d', strtotime('+1 day', $timestamp)); // 01-03-2017
        // echo $tambah_satuhari; 
    ?>
        <?php
        if (date('Y-m-d') >  $tambah_satuhari) {
            // var_dump($tambah_satuhari); die;

            $koneksi->query("UPDATE `tbl_produk` SET  `status_produk`= NULL WHERE `id_produk`='$d[id_produk]'");

           
            $count = $koneksi->query("SELECT * from tbl_produk  WHERE `id_produk`='$d[id_produk]'")->fetch_assoc();
            $asanyar =   $count['stok'] +1;
                                
            $koneksi->query("UPDATE `tbl_produk` SET stok= $asanyar WHERE `id_produk`='$d[id_produk]'");
        } ?>
    <?php  


       } ?>

    <!-- ============================================================================================================================== -->



    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Alamat</h3>
                        </div>

                        <p><?= $alamat  ?></p>
                    </div><!-- end clearfix -->
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Info Link</h3>
                        </div>

                        <ul class="twitter-widget footer-links">
                            <li><a href="index.php"> Home </a></li>
                            <li><a href="?page=profil"> About </a></li>
                            <li><a href="?page=kontak"> Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">kotolamode21@gmail.com</a></li>
                            <li><a href="#">www.kotolamode.com</a></li>

                            <li> +62813 7107 9336</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Social</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="#"><i class="fa fa-github"></i> Github</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">All Rights Reserved. <a href="#">&copy; <?= date('Y') ?> <?= $tittle ?></a> </p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <!-- Modal -->
    <div id="modalChart" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="aksi_cart.php" method='POST'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_produk" id="id_produk">
                            <input type="hidden" id="member_id" name="id_member" value="<?= $_SESSION['member']['id_member'] ?>">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <div class="panel panel-warning">
                                        <div id="img_produk"></div>
                                        <div style="padding:20px">
                                            <h6 id="kode_produk"></h6>
                                            <h6 id="nama_produk"></h6>
                                            <h6 id="harga_produk"></h6>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <label for="">Tanggal Pemijaman</label>
                                        <input type="date" required name="tanggal_peminjaman" class="form-control">
                                    </div>
                                    <div>
                                        <label for="">Tanggal Selesai</label>
                                        <input type="date" required name="tanggal_selesai" class="form-control">
                                        <br>

                                    </div>
                                    <div>
                                        <label for="">* Catatan Jika Ada Request/Perubahan Pesanan Dalam Paket</label>
                                        <textarea name="catatan" class="form-control" id=""></textarea>
                                        <br>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-scondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> -->

    <!-- Modal -->
    <div id="disewa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-danger">
                        <p>Mohon Maaf , Paket Pelaminan Ini telahHabis  disewa Silahkan cari yang tidak dalam penyewaan</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>

        </div>
    </div>


    <script src="js/bootstrap.js"></script>
    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>
    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->


    <!-- MAP & CONTACT -->
    <script src="js/map.js"></script>

    <!-- 
<script>

    function tampilDetail(id_boking){
      alert(id_boking)
        $.ajax({ // ajax 1
            url : 'ajax_ambil_boking.php',
            type:'POST',
            dataType: 'json',
            data: {id_boking:id_boking},
            success: function(data){
                // console.log(data)
                 var id_boking2 = data[0].id_boking
                 var id_pemesanan3 = data[0].id_pemesanan
                    $('#modalDetail').modal('show')

                    // boking
                    $('#no_boking').html(data[0].no_boking)
                    $('#nama_member').html(data[0].nama_member)
                    $('#tanggal_boking').html(data[0].tanggal_boking)
                    $('#jumlah_meja').html(data[0].jumlah_meja)
                    $('#jam').html(data[0].jam)

                    // pemesanan
                    $('#id_pemesanan').html(data[0].id_pemesanan)
                    $('#atas_nama').html(data[0].nama_member)
                    $('#total_pesan').html(data[0].total_pesan)

                    $.ajax({ //ajax 2
                        url : 'ajax_ambil_boking_detail.php',
                        type:'POST',
                        dataType: 'json',
                        data: {id_boking:id_boking2},
                        success: function(res){
                            var id_bok_3 = res[0].id_boking
                                var i;
                                var meja_dipilih=''
                                for(i=0; i < res.length; i++ ){
                                    meja_dipilih += 'Nomor Meja : <u><b>'+res[i].id_meja+'</b></u><br>';
                                }
                                $('#meja_dipilih').html(meja_dipilih)


                            }  // /res ajax 2
                        });// /ajax 2


                        $.ajax({ // ajax 3
                            url : 'ajax_ambil_pemesanan_detail.php',
                            type:'POST',
                            dataType: 'json',
                            data: {id_pemesanan:id_pemesanan3},
                            success: function(response){
                            console.log(response)

                            var i;
                                var jumlah_pesan=''
                                var subTotal = 0;
                                var totalBayar = 0;
                                for(i=0; i < response.length; i++ ){
                                    subTotal = (response[i].harga_produk * response[i].jumlah_pesan)
                                    totalBayar = totalBayar+= subTotal

                                          jumlah_pesan += '<p>-'+response[i].nama_produk+':Rp. '+response[i].harga_produk+'x'+response[i].jumlah_pesan+'= Rp. '+subTotal+'</p>';
                                }
                                var bayar = 'Rp. '+totalBayar
                                $('#jumlah_pesan').html(jumlah_pesan)
                                $('#total_bayar').html(bayar)

                        }  // /res ajax 3
                        });// /ajax 3

        
            }  // /res ajax 1 paling luar kulit kacang
        });// /ajax 1 paling luar
       

  
    }  
</script> -->

    <script>
        function ambil_produk(id_produk) {

            $.ajax({ //ajax produk
                url: 'ajax_ambil_produk.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_produk: id_produk
                },
                success: function(data) {
                    console.log(data)
                    // produk
                    $('#img_produk').html('<img src="images/produk/' + data[0].img_produk + '"  style="width:340px;height:20opx;padding:20px" alt="NO IMAGES">')
                    $('#kode_produk').html('Kode  :' + data[0].kode_produk)
                    $('#nama_produk').html('Nama  :' + data[0].nama_produk)
                    $('#harga_produk').html('Harga  Rp.' + data[0].harga_produk)
                    $('#id_produk').val(data[0].id_produk)
                    $('#modalChart').modal('show')

                }
            });

        }

        function produk_disewa(id_produk) {
            $('#id_produk').val(id_produk)
            $('#disewa').modal('show')

        }
    </script>
</body>

</html>