<?php
include 'koneksi.php';
header('Content-Type: application/json');


$position = explode(',', trim(urldecode($_GET['position'])));

$sql = "SELECT id_loket, nama_loket, alamat, latitude, longitude, foto_loket,
        (acos(cos(radians(".$position[0].")) 
        * cos(radians(latitude)) * cos(radians(longitude) 
        - radians(".$position[1].")) + sin(radians(".$position[0].")) 
        * sin(radians(latitude)))) 
        AS jarak 
        FROM tbl_loket 
        HAVING jarak <= ".$_GET['jarak']." 
        ORDER BY jarak";

$data   = mysqli_query($koneksi,$sql);
$json   = array();
$output = array();
$i = 0;

if (!empty($data)) {
    $json = '{"data": {';
    $json .= '"loket":[ ';
    while($x = mysqli_fetch_array($data)){
        $json .= '{';
        $json .= '"id_loket":"'.$x['id_loket'].'",
                 "nama_loket":"'.$x['nama_loket'].'",
                 "alamat":"'.htmlspecialchars_decode($x['alamat']).'",
                 "latitude":"'.$x['latitude'].'",
                 "longitude":"'.$x['longitude'].'",
                 "foto_loket":"'.htmlspecialchars_decode($x['foto_loket']).'"
                 },';
    }
 
    $json = substr($json,0,strlen($json)-1);
    $json .= ']';
    $json .= '}}';
     
    echo $json;
} 