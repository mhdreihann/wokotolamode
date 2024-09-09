<div class="all-title-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Contact</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>Contact</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
<div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Request for Komentar</h3>
                <p class="lead">“A smart man makes a mistake, learns from it, and never makes that mistake again. <br>But a wise man finds a smart man and learns from him how to avoid the mistake altogether.” — Roy H. Williams</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-6">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form action="proses1.php" name="contactform" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_k" id="nama_k" class="form-control" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="komen" id="komen" rows="6" placeholder="Komentar....."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input type="submit" value="SEND" name="register" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">
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