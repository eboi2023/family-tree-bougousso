<?php
    if( ! $this->session->userdata('authenticated')){
        echo base_url();                
    }
    else{ ?>
    <div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-area hero-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 offset-lg-2 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Hotel</p>
								<h1>Détendu Sàns</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-star"></i>
						</div>
						<div class="content">
							<h3>High Quality 5 Start Hotel</h3>
							<p>Détendu Sàns give the guest the best experience and the most comfortable hotels.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day, anything you want just ask our staff.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fa fa-dollar"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund all your money if you disatisfied with our hotel.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Facilities</h3>
						<p>Welcome into Détendu Sàns, below here you can choose and book our facilities. You can also click facilities  to show facilities details</p>
					</div>
				</div>
			</div>
			<div class="row">
					<?php 
						foreach($data as $booking){
							$id = $booking['ID_Fasilitas'];
							$nama = $booking['NAMA_Fasilitas'];
							$poster = $booking['URL_Gambar'];?>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
						<a href="single-product.html"><?php echo "<img src = '",base_url(). '/assets/poster/'. $poster, "' height = '150' width = '300'>"; ?></a>
					</div>
							<?php echo "<h3>".$nama."<h3>";
							echo "<a class='cart-btn' href='",site_url('showData'),"?id=".$id."'>Detail </a>"; ?>	
					</div>
				</div>
				<?php } ?>
			</div>
		
	<div class="list-section pt-80 pb-80">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Check</span> Your Lists</h3>
						<p>You can check your list below!!!</p>
					</div>
				</div>
				<div class="col-lg-12 text-center">
				<?php echo	"<a href='",site_url('showRequestListing'),"' class='boxed-btn' style='margin: 10px; '>Show Request Lists</a>" ?>
				</div>
			</div>
	</div>
<?php } ?>

