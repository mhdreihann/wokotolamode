<?php
if (isset($_GET)) {
    $id_penyewaan = 'PLM-' . uniqid();
    $id_member = $_GET['idm'];
    $total_pembayaran  = $_GET['p'];
    $stok  = $_GET['stok']-1;
    $tanggal_sewa = date('Y-m-d');
    $count = $koneksi->query("SELECT  COUNT(*)  as count_jml FROM tbl_penyewaan_tmp where id_member = $id_member ")->fetch_assoc();
    $jumlah_pelaminan = $count['count_jml'];
    $input = $koneksi->query("INSERT INTO `tbl_penyewaan`(`id_penyewaan`, `id_member`, `jumlah_pelaminan`, `tanggal_sewa`,total_pembayaran ) VALUES ('$id_penyewaan','$id_member','$jumlah_pelaminan','$tanggal_sewa','$total_pembayaran ')");

    if ($input) {

        $sewa = $koneksi->query("SELECT *  FROM tbl_penyewaan_tmp where id_member = $id_member ");
        while ($data = $sewa->fetch_assoc()) {

            $detail = $koneksi->query("INSERT INTO `tbl_penyewaan_detail`(`id_penyewaan`, `id_produk`, `tanggal_peminjaman`, `tanggal_selesai`, `lama_hari`,catatan) VALUES ('$id_penyewaan','$data[id_produk]','$data[tanggal_peminjaman]','$data[tanggal_selesai]','$data[lama_hari]','$data[catatan]')");

            $koneksi->query("UPDATE `tbl_produk` SET  `status_produk`= 1, `stok`= $stok WHERE `id_produk`='$data[id_produk]'");
        }

        if ($detail) {
            $koneksi->query("DELETE FROM tbl_penyewaan_tmp WHERE id_member = $id_member");
        }
    }
} ?>

<script>
    window.location.href = 'index.php?page=konfirmasi_pembayaran';
</script>