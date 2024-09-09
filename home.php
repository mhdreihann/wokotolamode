<?php include "slide.php"; ?>

<div class="about-box">
	<div class="container">
		<div class="about-area area-padding">
			<div class="container">
				<input type="hidden" name='latitude' id='latitude'>
				<input type="hidden" name='longitude' id='longitude'>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h2>Welcome </h2>

						</div>
					</div>
				</div>
				<div class="row">


					<div class="col-lg-3">
					</div>
					<hr class="hr1">
					<div class="row">
						<div class="col-md-4">
							<div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
								<img style="witdh:50px; height:350px" src="images/logo.png" alt="" class="img-responsive">
							</div><!-- end media -->
						</div>
						<div class="col-md-8">
							<div class="message-box right-ab">
								<div class="row">
									<?php

									$ck = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
									$bkl = mysqli_fetch_array($ck);
									?>

									<p align="justify" class="text-dark"><?= $bkl["isi_profil"]; ?></p>
								</div>
								<a href="?page=profil" class="btn btn-light btn-radius grd1 btn-brd"> Read More </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSnFipxaBhQcKE_i8itckeTlY3cbOh9TE&callback=initMap">
</script>

<?php include "testimoni.php"; ?>