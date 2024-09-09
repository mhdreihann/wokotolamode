<?php
require_once "koneksi.php";

    $json = array();
        $sql_meja = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk='$_POST[id_produk]'");
        while ($meja = mysqli_fetch_assoc($sql_meja)) {
            $json[] = $meja;
        
        }
        echo json_encode($json);
