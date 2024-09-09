   
   <?php
// File json yang akan dibaca
$file = "json/chart.json";
// Mendapatkan file json
$chart = file_get_contents($file);

// Mendecode chart.json
$data = json_decode($chart, true);

   $id_boking =  $_GET['id_boking'];
   // Membaca data array menggunakan foreach
   foreach ($data['chart'] as $key => $pecah) {
    // Hapus data kedua
    if ($pecah['id_boking'] === $id_boking) {
        // Menghapus data array sesuai dengan index
        // Menggantinya dengan elemen baru
        array_splice($data['chart'], $key);
    }
}

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
file_put_contents($file, $jsonfile);

echo"<script>
window.location.href='index.php?page=chart&m='.$id_boking;
</script>
";
?>


   
   
   
   
  