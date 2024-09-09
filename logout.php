<?php


// File json yang akan dibaca
$file = "json/chart.json";

    $data['chart'] = [];
  
// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
file_put_contents($file, $jsonfile);

session_start();
session_destroy();
echo"<script>
window.location='index.php';
</script>";
?>