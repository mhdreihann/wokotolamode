    <div id="testimonials" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h3>Testimoni</h3>
                    <p class="lead">Terimakasih Telah Berkomentar dengan baik di <?= $tittle ?> <span class="fa fa-smile"></span></p>
                </div><!-- end col -->
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="testi-carousel owl-carousel owl-theme">
                    <?php 
				$berita=mysqli_query($koneksi,"SELECT * FROM `tbl_komentar` WHERE 1 ORDER BY id_komentar DESC LIMIT 6");
				while ($sql=mysqli_fetch_array($berita)){
				?>
                        <div class="testimonial clearfix">
                            <div class="desc">
                                <p class="lead"><?php echo substr($sql ['isi'],0,130) ?>...</p>
                            </div>
                            <div class="testi-meta">
                                <h4><?php echo $sql ['nama_komentar']; ?></h4>
                            </div>
                            <!-- end testi-meta -->
                        </div>
                        <?php } ?>
                        <!-- end testimonial -->
                    </div><!-- end carousel -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->