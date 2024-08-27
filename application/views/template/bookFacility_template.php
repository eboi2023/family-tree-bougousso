<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
        <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Please complete the following data so that you can be reserved
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
        <?php
        foreach($data as $booking){?>
            	<div class="booking-form">
                            <form method = "post" action="<?php echo site_url('bookFacility') ?>">
								<div class="form-group">
									<span class="form-label">Facility Name</span>
									<input class = "form-control "type="text" name="facilityName" required="" value = "<?php echo $booking->NAMA_Fasilitas;?>" readonly/>
									<input class="form-control" type = "hidden" name="ID_fasilitas" type="text" value = "<?php echo $booking->ID_Fasilitas;?>" readonly>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input class="form-control" type="date" name="startDate" required="">
                                            <div style="color: red;margin-bottom: 15px;">
                                                <?php echo form_error('startDate'); ?>  
                                            </div> 
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="date" name="endDate" required>
                                            <div style="color: red;margin-bottom: 15px;">
                                                <?php echo form_error('endDate'); ?>  
                                            </div> 
										</div>
									</div>
								</div>
                                
								<div class="form-btn">
									<button class="submit-btn" name="save">Book Now</button>
                                    <a class="cancel-btn" href="<?php echo site_url('Home') ?>" style="color:white;">Cancel</a>
								</div>
							</form>
						</div>
        <?php } ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
				
<?php 
    }?>	