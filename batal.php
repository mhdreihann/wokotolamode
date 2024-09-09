<?php

include "koneksi.php";
$id = $_GET['id'];

$sql = mysqli_query($koneksi,"DELETE FROM `tbl_boking` WHERE id_boking='$id'");
mysqli_query($koneksi,"DELETE FROM `tbl_boking_detail` WHERE id_boking='$id'");
echo "<script>alert('Pesanan Dibatalkan'); 
    window.location='index.php?page=meja_diboking';
    </script>";