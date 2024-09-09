<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_pelaminan";
$tittle ='WO| Koto La Mode ';
$alamat ='Jl. Rangkayo Bungsu, Kec. Lima Kaum, Kabupaten Tanah Datar ';

$koneksi = mysqli_connect($server, $user, $password, $nama_database);

if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


function my_tanggal($tanggal){
    $bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


require "fungsi_tanggal.php";