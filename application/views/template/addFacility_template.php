<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
     <div class="container-contact100">
            <div class="wrap-contact100">
            <?php echo form_open_multipart('Home/add_Facility','class="contact100-form validate-form"');?>
            	<span class="contact100-form-title">
					Add Facility
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Facility Name">
					<span class="label-input100">Facility Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter Facility Name" required="">
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Please Type Facility Description">
					<span class="label-input100">Description</span>
					<textarea class="input100" type="text" rows="10" cols="155" name="description" placeholder="Enter Facility Description" required=""></textarea>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Upload File">
					<span class="label-input100">Poster</span>
					<input class="input100" type="file" name="FileUpload" required="">
					<div style="color: red;margin-bottom: 15px;">
                        <?php echo form_error('FileUpload'); ?>
                    </div>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="save">
						<span>
							    Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<div class="container-contact100-form-btn">
					<a class="contact100-form-btn" href="<?php echo site_url('showFacilityListings')?>" style="background-color:red;margin-top=10px;" name="cancel">
						<span>
							Back
						</span>
					</a>
				</div>
<?php 
}?>
