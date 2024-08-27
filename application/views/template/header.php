<!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
</div> -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">	
	<?php
		if( ! $this->session->userdata('authenticated')){
		}
		else{ 
			if($this->session->userdata('role') == 'Admin'){?>
				<div class="main-menu-wrap">
				<div class="site-logo">
					<a href="index.html">
						<img src="<?php echo base_url('../assets/img/LOGO_Hotel.png')?>" alt="">
					</a>
				</div>
				<nav class="main-menu">
					<ul>
						<li class="active current-list-item"><a href="<?php echo site_url('showUserListings') ?>">User Listing</a>
						</li>
						<li class="active current-list-item"><a href="<?php echo site_url('showFacilityListings') ?>">Facility Listing</a>
						</li>
						<li class="active current-list-item"><a href="<?php echo site_url('showAdminRequestListings') ?>">Requests Listing</a>
						</li>
						<li>
							<div class="header-icons">
								<a href="#">Hello, <?php echo $this->session->userdata("nama")?></a>
								<?php echo "<a href='",site_url('logout'),"'>Log out</a></li>"; ?>
							</div>
						</li>
					</ul>
				</nav>

				<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
			</div>		
			<?php
			}
			else if($this->session->userdata('role') == 'Management'){?>
				<div class="main-menu-wrap">
				<div class="site-logo">
					<a href="index.html">
						<img src="<?php echo base_url('../assets/img/LOGO_Hotel.png')?>" alt="">
					</a>
				</div>
				<nav class="main-menu">
					<ul>
						<li class="active current-list-item"><a href="<?php echo site_url('showFacilityListings') ?>">Facility Listing</a>
						</li>
						<li class="active current-list-item"><a href="<?php echo site_url('showManagementRequestListings') ?>">Requests Listing</a>
						</li>
						<li>
							<div class="header-icons">
							    	<a href="#">Hello, <?php echo $this->session->userdata("nama")?></a>
								<?php echo "<a href='",site_url('logout'),"'>Log out</a></li>"; ?>
							</div>
						</li>
					</ul>
				</nav>

				<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
			</div>		
			<?php }
			else if($this->session->userdata('role') == 'User'){?>
				<div class="main-menu-wrap">
						<div class="site-logo">
							<a href="index.html">
								<img src="<?php echo base_url('../assets/img/LOGO_Hotel.png')?>" alt="">
							</a>
						</div>
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="<?php echo site_url('Home') ?>">Home</a>
								</li>
								<li><a href="#">Facilities</a>
									<ul class="sub-menu">
										<?php foreach($users as $row){
											$id = $row['ID_Fasilitas'];
											$nama = $row['NAMA_Fasilitas'];
											$poster = $row['URL_Gambar'];
											echo "<li><a href='",site_url('showBookTemplate'),"?id=".$id."'>".$nama."</a><li>";
										}?>
									</ul>
								</li>
								<li>
									<div class="header-icons">
									    	<a href="#">Hello, <?php echo $this->session->userdata("nama")?></a>
										<?php echo "<a href='",site_url('logout'),"'>Log out</a></li>"; ?>
									</div>
								</li>
							</ul>
						</nav>

						<div class="mobile-menu"></div>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<?php
	}
}?>
</ul>
</div>
</nav>