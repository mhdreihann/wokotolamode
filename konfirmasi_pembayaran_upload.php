<div class="all-title-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Upload Bukti Pembayaran</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li> Bukti Pembayaran</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
    </div>
    <?php 
    $id_member = $_SESSION['member']['id_member'];
    $count = $koneksi->query("SELECT  SUM(harga_produk * lama_hari)  as count_jml FROM tbl_penyewaan_detail  join tbl_produk  ON tbl_penyewaan_detail.id_produk=tbl_produk.id_produk where id_penyewaan = '$_GET[p]' ")->fetch_assoc();
 
    ?>
<div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Upload Bukti Pembayaran</h3>
            </div><!-- end title -->

            <div class="row">
            
                <div class="col-md-8">
                    <div class="contact_form">
                        <form action="aksi_pembayaran.php" method="post" name="contactform" enctype="multipart/form-data">
                        <input type="hidden" name="id_member"  value="<?= $_SESSION['member']['id_member'] ?>"  >
                        <input type="hidden" name="total_keseluruhan"  value="<?=$count['count_jml'] ?>"  >
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Nomor Transaksi</label>
                                    <input type="text" name="id_penyewaan" value="<?= $_GET['p'] ?>"  readonly class="form-control" >
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Nama Penyewa</label>
                                    <input type="text" name="nama_member"  value="<?= $_SESSION['member']['nama_member'] ?>" readonly class="form-control" >
                                   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Minimal Pembayaran Awal </label>
                                    <input type="text" required name="mimimal_bayar" readonly value="Rp. <?=  $count['count_jml']/5?>" class="form-control" >
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Jumlah Yang Dibayarkan </label>
                                    <input type="number" min="<?= $count['count_jml']/5 ?>" max="<?=$count['count_jml'] ?>" required name="jumlah_dibayarkan" class="form-control" >
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Tanggal Transfer </label>
                                    <input type="date" required name="tanggal_transfer" class="form-control" >
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label for="">Upload Bukti Pembayaran</label>
                                    <input type="file" required name="img_upload"  class="form-control" >
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label for="">Transfer Atas Nama </label>
                                    <input type="text" required name="atas_nama" class="form-control" >
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input type="submit" name="register"  value="Submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
					<div class="right-box-contact">
						<div class="support-info">
							<div class="info-title">
                              <h5>Total Pembayaran:
                                  RP.<?= number_format($count['count_jml']) ?></h5>
							<table class="table">
                                <tr>
                                    <th>BRI</th>
                                    <th>:1519 55 7858 757</th>
                                </tr>
                                <tr>
                                <th colspan="2">AN/ Devi Suharnis</th>
                                </tr>
                            
                                <tr>
                                    <th>BNI</th>
                                    <th>:1278 55 785 65</th>
                                   
                                </tr>
                                <tr>
                                <th colspan="2">AN/ Devi Suharnis</th>
                                </tr>
                            </table>
							</div>
						</div>
					</div>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>