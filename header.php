<?php
error_reporting(0);
session_start();

?>
<header class="header header_style_01">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <nav class="megamenu navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#"><img witdh="500px" height="63px" src="images/logo/logo.jpg" alt="image"></a> -->
                <a href="#" style="font-size:20px;color:#FFFFFF"><img src="images/logo.png" width="65px" alt="">    KOTO LA MODE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="active" style="margin-right:20px;" href="index.php">Home</a></li>
                    <?php if (@$_SESSION['member']['id_member']) : ?>
                        <li><a href="?page=profil">Profil</a></li>
                    <?php else : ?>
                        <li><a href="?page=profil">Profil</a></li>
                    <?php endif; ?>
                    <?php if (@$_SESSION['member']['id_member']) : ?>

                    <?php else : ?>
                        <li> <a href="?page=produk">Penyewaan </a></li>
                    <?php endif; ?>
                    <?php if (@$_SESSION['member']['id_member']) : ?>
                        <li> <a href="?page=produk"> Penyewaan </a></li>
                    <?php else : ?>
                    <?php endif; ?>
                    <?php if (@$_SESSION['member']['id_member']) : ?>
                        <!-- <li> <a href="?page=riwayat_pesan">History </a></li> -->
                        <li><a href="?page=kontak">Contact</a></li>
                        <li> <a href="?page=konfirmasi_pembayaran"> Pembayaran </a></li>
                    <?php else : ?>
                        <li><a href="?page=kontak">Contact</a></li>
                    <?php endif; ?>
                    <?php if (@$_SESSION['member']['id_member']) : ?>
                        <li><a href="logout.php" style="margin-right:25px;">Logout</a></li>
                    <?php else : ?>
                        <li><a href="?page=registrasi">Registrasi</a></li>
                    <?php endif; ?>
                    <?php if (@$_SESSION['member']['id_member']) : ?>
                        <li><a class="fa fa-user" style="font-size:'12px'"> <?= @$_SESSION['member']['nama_member']; ?></a></li>
                    <?php else : ?>
                        <li><a href="?page=login">Login</a></li>
                    <?php endif; ?>

                    <?php if (@$_SESSION['member']['id_member']) :
                        $id_member = $_SESSION['member']['id_member'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_penyewaan_tmp where id_member= $id_member");
                        $jmlp = 0;
                        while ($rm = mysqli_fetch_array($sql)) {
                            $jmlp++;
                        }

                    ?>

                        <li class="social-links"><a href="?page=cart_tmp"><i class="fa fa-shopping-cart global-radius"><sup style="color:black"><b><?= $jmlp ?></b></sup></i> </a></li>
                    <?php else : ?>
                        <li class="social-links"><a href="#"><i class="fa fa-shopping-cart global-radius"></i></a></li>
                    <?php endif; ?>


                    <li class="social-links"><a target="_blank" href="https://api.whatsapp.com/send?phone=6281371079335&text=Saya%20tertarik%20untuk%20menyewa%20Pelaminan"><i class="t global-radius"><img width="20px" src="images/wa.png" alt=""></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>