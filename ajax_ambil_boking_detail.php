<?php 
require_once "koneksi.php";

    $json = array();
    $sql_meja = mysqli_query($koneksi, "SELECT * FROM tbl_boking_detail  where id_boking ='$_POST[id_boking]'");
    while ($meja = mysqli_fetch_assoc($sql_meja)) {
        $json[] = $meja;
    }
    echo json_encode($json);
    

    ?>