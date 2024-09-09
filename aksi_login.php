<?php
include ("koneksi.php");
if(isset($_POST['simpan'])){
    $user =$_POST['user'];
    $password = md5($_POST['password']);
    $ambil=$koneksi->query("SELECT * FROM tbl_member WHERE username='$user' AND password='$password' ");

    $cek=$ambil->num_rows;
    
    if($cek ==1){
        session_start();
        $akun=$ambil->fetch_assoc();
        $_SESSION['member']= $akun;
        echo"<script>alert ('Anda Berhasi Login')
       window.location='index.php';</script>";
    }else{
        echo"<script>alert ('Anda Gagal Login,Periksa akun anda')
           window.location='index.php';</script>";
    }
}
?>