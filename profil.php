<div class="all-title-box">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Profil</h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li>Profil</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="about-box">
	<div class="container">
		<div class="section-title text-left">
			<h3>Profil</h3>

		</div>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
					<img src="images/logo.png" alt="" class="img-responsive">
				</div><!-- end media -->
			</div>
			<div class="col-md-6">
				<div class="message-box right-ab">


				<?php

$ck = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
$bkl = mysqli_fetch_array($ck);
?>

<p align="justify" class="text-dark"><?= $bkl["isi_profil"]; ?></p>




				</div>
			</div>
		</div>
	</div>
</div>