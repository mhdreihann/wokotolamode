<div class="all-title-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Registrasi</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>Registrasi</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
<div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Registrasi</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-6">
                    <div class="contact_form">
                        <form action="proses.php" method="post" name="contactform">
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="username"  class="form-control" required placeholder="Username">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="pass"  class="form-control" required placeholder="Password">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama"  class="form-control" required placeholder="Nama Lengkap">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="tlp" class="form-control" placeholder="No Telp">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="almt" rows="6" placeholder="Alamat"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input type="submit" name="register"  value="DAFTAR" class="btn btn-light btn-radius btn-brd grd1 btn-block">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
				<div class="col-md-6">
					<div class="right-box-contact">
						<h4>Phone</h4>
						<div class="support-info">
							<div class="info-title">
								<i class="fa fa-phone" aria-hidden="true"></i>
								+62813 7107 9336
								<span>Booking Time: 24 Hrs</span>
							</div>
						</div>
					</div>
					<div class="right-box-contact">
						<h4>Address</h4>
						<div class="support-info">
							<div class="info-title">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								Address
								<span><?= $alamat  ?></span>
							</div>
						</div>
					</div>
				</div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>