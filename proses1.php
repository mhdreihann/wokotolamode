<?php
    include "koneksi.php";
    $tgl = date('Y-m-d');
    //input datanya
if(isset($_POST['register'])){
	$simpan=mysqli_query ($koneksi,"INSERT INTO `tbl_komentar` (`tgl_komentar`, 
                                                                 `nama_komentar`, 
                                                                 `email`, 
                                                                 `isi`) VALUES (
                                                                    '$tgl',
                                                                    '$_POST[nama_k]',
                                                                    '$_POST[email]',
                                                                    '$_POST[komen]')");

if($simpan){
	echo "<script>alert('Data Udah Di Simpan');
    window.location='index.php?page=kontak';
    </script>";
}else{
	echo "<script>alert('Data Gagal Di Simpan');
    window.location='index.php?page=kontak';
    </script>";
}
}
   
    ?>