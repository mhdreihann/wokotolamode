<?php

include "koneksi.php";
if (isset($_POST)) {

    $nama_foto = $_FILES['img_upload']['name'];
    $lokasi = $_FILES['img_upload']['tmp_name'];
    $tipe = $_FILES['img_upload']['type'];

    $id_penyewaan = mysqli_escape_string($koneksi, $_POST['id_penyewaan']);
    $id_member = mysqli_escape_string($koneksi, $_POST['id_member']);
    $jumlah_dibayarkan = mysqli_escape_string($koneksi, $_POST['jumlah_dibayarkan']);
    $tanggal_transfer = mysqli_escape_string($koneksi, $_POST['tanggal_transfer']);
    $atas_nama = mysqli_escape_string($koneksi, $_POST['atas_nama']);
    $total_keseluruhan = mysqli_escape_string($koneksi, $_POST['total_keseluruhan']);
    $img_upload = $_FILES['img_upload']['name'];




    $query = "INSERT INTO `tbl_pembayaran`(`id_penyewaan`, `id_member`,  `jumlah_dibayarkan`, `jumlah_pelunasan`,  `atas_nama`, `tanggal_transfer`, `img_upload`, total_keseluruhan) VALUES ('$id_penyewaan','$id_member','$jumlah_dibayarkan','0','$atas_nama','$tanggal_transfer','$img_upload','$total_keseluruhan')";

    $proses = mysqli_query($koneksi, $query);

    if ($proses) {
        move_uploaded_file($lokasi, "./images/bukti/$nama_foto");

        if ($_POST['total_keseluruhan'] == $_POST['jumlah_dibayarkan']) {
            $koneksi->query("UPDATE `tbl_penyewaan` SET  `status_penyewaan`= 2 WHERE `id_penyewaan`='$id_penyewaan'");
        } else {
            $koneksi->query("UPDATE `tbl_penyewaan` SET  `status_penyewaan`= 1 WHERE `id_penyewaan`='$id_penyewaan'");
        }


        echo "<script>alert(' Pembayaran Berhasil');
        window.location='index.php?page=konfirmasi_pembayaran';
        </script>";
    } else {

        echo "<script>alert(' Gagal ');
        window.location='index.php?page=konfirmasi_pembayaran';
        </script>";
    }
}
