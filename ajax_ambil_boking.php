<?php
require_once "koneksi.php";

    $json = array();
        $sql_meja = mysqli_query($koneksi, "SELECT * FROM tbl_pemesanan a LEFT JOIN tbl_member c ON a.id_member=c.id_member  LEFT JOIN tbl_boking bk ON a.id_boking=bk.id_boking LEFT JOIN jam ON jam.id_jam=bk.id_jam   where bk.id_boking ='$_POST[id_boking]'");
        while ($meja = mysqli_fetch_assoc($sql_meja)) {
            $json[] = $meja;
        
        }
        echo json_encode($json);
