<?php
session_start();
include "koneksi.php";

if (isset($_POST['pesan1'])) {
       // ambil data hasil submit dari form
       $id_member   = $_SESSION['member']['id_member'];
       // nopesan
       $a              = date('Y-m-d-h-i-s');
       $krr            = explode('-', $a);
       $nopen          = implode("", $krr);
       $no_boking       = 'NB-' . $nopen;
       
       // no kursi
       $meja1         = $_POST['meja'];
       $jumlah_meja      = count($meja1);

       // var_dump(count($kursi1));
       // echo $total;

       // exit;

       $source         = "";

       $tempat = substr($source, 0, -1);
       // 
       $tanggal_boking      = $_POST['tgl'];
       $jam            = $_POST['jam'];
       // $mobil            = $_POST['mobil'];
       // var_dump($kursi1);
       // exit;
       $query = mysqli_query($koneksi, "INSERT INTO `tbl_boking`( `id_member`, `no_boking`, `jumlah_meja`, `tanggal_boking`,`id_jam`) VALUES ('$id_member','$no_boking','$jumlah_meja','$tanggal_boking','$jam')");

       $id_boking = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT LAST_INSERT_ID() as id_boking"));
       // echo $id; exit;
       foreach ($meja1 as $meja_dipilih) {
              $koneksi->query("INSERT INTO `tbl_boking_detail`(`id_boking`, `id_meja`) VALUES ('$id_boking[id_boking]','$meja_dipilih')");
       }
       echo "  <script>alert('Meja telah di Booking  silahkan lakukan pemesanan menu'); 
              window.location='index.php?page=meja_diboking'; 
              </script>";
} else {
       echo "  <script>alert('Meja Gagal Di Booking'); 
              window.location='index.php?page=meja_diboking'; 
              </script>";
}
