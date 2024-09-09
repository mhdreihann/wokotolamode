<?php
    if(isset($_POST['register'])){
    include "koneksi.php";
    $tgl = date('Y-m-d');
    $password = md5($_POST['pass']);
    //input datanya
	$simpan=mysqli_query ($koneksi,"INSERT INTO `tbl_member`( `tgl_regis`, `username`, `password`, `nama_member`, `no_tlp`, `alamat`) VALUES(
                                                                    '$tgl',
                                                                    '$_POST[username]',
                                                                    '$password',
                                                                    '$_POST[nama]',
                                                                    '$_POST[tlp]',
                                                                 '$_POST[almt]')");

                                                        

if($simpan){
	echo "<script>alert('Registrasi success');
    window.location='index.php?page=login';
    </script>";
}else{
	echo "<script>alert(' Gagal Di Simpan');
    window.location='index.php?page=registrasi';
    </script>";
}
}
   
    ?>