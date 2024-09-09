<?php 
require_once "koneksi.php";



    $json = array();
    $sql_meja = mysqli_query($koneksi, "SELECT * FROM tbl_pemesanan_detail  JOIN tbl_produk  ON tbl_pemesanan_detail.id_produk= tbl_produk.id_produk  where tbl_pemesanan_detail.id_pemesanan ='$_POST[id_pemesanan]'");
    while ($meja = mysqli_fetch_assoc($sql_meja)) {
        $json[] = $meja;
    }
    echo json_encode($json);
    

    ?>