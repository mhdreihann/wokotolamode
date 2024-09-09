<?php
include "koneksi.php";
$jam = $_POST['jam'];
    $sql = $koneksi->query("SELECT * FROM jam WHERE id_jam='$jam'");
    $row = $sql->fetch_assoc();
    echo json_encode($row);
?>