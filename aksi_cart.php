<?php
    include 'koneksi.php';

    if(isset($_POST)){
         
            $id_member = $_POST['id_member'];
            $id_produk = $_POST['id_produk'];
            $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
            $tanggal_selesai = $_POST['tanggal_selesai'];
            $catatan = $_POST['catatan'];
          

            $awal  = new DateTime($tanggal_peminjaman);
            $akhir = new DateTime($tanggal_selesai); 
            $diff  = $awal->diff($akhir);
            $lama_hari1 = $diff->d ;
            $lama_hari = $lama_hari1 +1;


            if(isset($_POST['yesmakeup'])){
                $makeup = $_POST['yesmakeup'];
                $input = $koneksi->query("INSERT INTO `tbl_penyewaan_tmp`(`id_member`, `id_produk`, `tanggal_peminjaman`, `tanggal_selesai`, `lama_hari`, makeup) VALUES  ('$id_member','$id_produk','$tanggal_peminjaman','$tanggal_selesai','$lama_hari','$makeup')");
            }else{
                $input = $koneksi->query("INSERT INTO `tbl_penyewaan_tmp`(`id_member`, `id_produk`, `tanggal_peminjaman`, `tanggal_selesai`, `lama_hari`,catatan) VALUES  ('$id_member','$id_produk','$tanggal_peminjaman','$tanggal_selesai','$lama_hari','$catatan')");
            }
      
       
            
    }?>

<script>
    window.location.href='index.php?page=cart_tmp';
</script>




