<?php
  include "koneksi.php";
  $query=mysqli_query($koneksi,"DELETE  from tbl_histori WHERE no_pesan='$_GET[id]'");
 if($query)
 {
    echo "<script>alert('data dihapus');
    window.location='index.php?page=riwayat_pesan';
    </script>";
 }

?>