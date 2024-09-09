<?php

include_once('koneksi.php');
if(isset($_GET)){
          

    $id = $_GET['id'];



    $input = $koneksi->query("DELETE FROM `tbl_penyewaan_tmp` Where id_penyewaan_tmp=$id");

    
}?>

<script>
window.location.href='index.php?page=cart_tmp';
</script>