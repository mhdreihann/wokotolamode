<?php
require_once "koneksi.php";
function angkaHuruf($angka)
{
    $huruf = [
        "",
        "A",
        "B",
        "C",
        "D",
        "E",
        "F",
        "G",
        "H",
        "I",
        "J",
        "K",
        "L",
        "M",
        "N",
        "O",
        "P",
        "Q",
        "R",
        "S",
        "T",
        "U",
        "V",
        "W",
        "X",
        "Y",
        "Z"
    ];
    return $huruf[$angka];
}

$tgl_pesan = $_POST['tgl_pesan'];
$jam = $_POST['jam'];


$json = array();
$sql_meja = mysqli_query($koneksi, "SELECT meja.id_meja, 
IF(hasil.id_boking IS NOT NULL, false, true) 
AS status_meja
FROM meja 
LEFT JOIN ( 
SELECT boking_detail.* 
FROM `tbl_boking` boking 
JOIN tbl_boking_detail boking_detail 
ON boking.id_boking = boking_detail.id_boking 
WHERE boking.tanggal_boking = date('$tgl_pesan')
AND boking.id_jam = $jam ) hasil ON hasil.id_meja = meja.id_meja");
while ($meja = mysqli_fetch_assoc($sql_meja)) {
    $json[] = $meja;
    // $json .= "<div class='col-md-4'><input type='checkbox' name='kursi[]' value='".$kursi['no_kursi']."' class='".strtolower(angkaHuruf($kursi['no_kursi']))."' ".$kursi['status_kursi']." /></div>";
}
echo json_encode($json);
