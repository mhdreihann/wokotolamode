<?php include "koneksi.php" ?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Cetak Order</title>
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

<div class="about-box">
    <div style="padding-right:50px;padding-left:50px">
       
    <h3>FAKTUR PENYEWAAN</h3>
          KOTO LA MODE <br>
           <?= $alamat  ?> <br>

           Tanggal : <?= my_tanggal(date('Y-m-d') )?>
        
        <div style="margin-left:50px">
            <hr>
        </div>
        <div class="row">

            <div class="">
                <div class="col-sm-12">
                    <!-- <a href="?page=produk" style="width:10px;height:20px" class=" btn-primary btn-sm pull-right"> X</a> -->
                    <div class=""></div>

                    <div class="">

                        <table widh="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama </th>
                                    <th>Harga </th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Selesai</th>
                                    <th width="20px">Lama Penyewaan</th>
                                    <th>Jumlah Bayar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id_member = $_GET['id'];
                                $no = 1;
                                $total = 0;
                                $select = mysqli_query($koneksi, "SELECT * FROM tbl_penyewaan_detail a Join tbl_produk b ON a.id_produk=b.id_produk WHERE a.id_penyewaan = '$_GET[p]'");
                                while ($d = mysqli_fetch_array($select)) {
                                    $subtotal = $d['harga_produk'];
                                    $ttl = $d['harga_produk'];
                                    $total = +$total + $ttl;
                                    $xd = $koneksi->query("SELECT  *  FROM tbl_pembayaran where id_penyewaan = '$d[id_penyewaan]' ")->fetch_assoc();
                                                                 ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        </td>
                                        <td>Kode produk: <?= $d['kode_produk'] ?>| <br><?= $d['nama_produk'] ?></td>
                                        <td>Rp. <?= number_format($d['harga_produk'], 2) ?></td>
                                        <td><?= my_tanggal($d['tanggal_peminjaman']) ?></td>
                                        <td><?= my_tanggal($d['tanggal_selesai']) ?></td>
                                        <td><?= $d['lama_hari'] ?> Hari</td>
                                        <td>Rp. <?= number_format($subtotal, 2) ?>

                                        </td>

                                    </tr>
                                <?php  } 
                                
                             
                                ?>
                          
                                <tr>
                                    <td align="" colspan="7">Pembayaran Tahap Awal
                                    <td>Rp <?= number_format( $xd['jumlah_dibayarkan'], 2) ?></td>
                                </tr>
                                <tr>
                                    <td align="" colspan="7">Sisa Pembayaran
                                    <td>Rp <?= number_format($total- $xd['jumlah_dibayarkan'], 2) ?></td>
                                </tr>
                                <tr>
                                    <td align="" colspan="7">Total Bayar</td>
                                    <td>Rp <?= number_format($total, 2) ?></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

        </div>

        <h5 style="margin-right:50px;margin-top:30px" class="pull-right"><?= $_GET['nm'] ?></h5>
    </div>

</div>

<script>
    window.print();
</script>