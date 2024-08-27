<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ 
        foreach ($data as $facility){?>
  
<div class="container-contact100">
            <div class="wrap-contact100">
            <?php echo form_open_multipart('Home/do_update_Facility','class="contact100-form validate-form"');?>
            	<span class="contact100-form-title">
					Update Facilities
				</span>
                <input type="hidden" name="id_Facility" class = "form-control" value = "<?php echo $facility->ID_Fasilitas; ?>" readonly/> <br>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Enter Facility Name">
					<span class="label-input100">Full Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter Facility Name" value="<?php echo $facility->NAMA_Fasilitas; ?>" required="">
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Enter Facility Description">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="description"  required=""><?php echo $facility->Description; ?></textarea>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Upload File">
                    <span class="label-input100">Poster</span>
                    <br>
                    <img src = "<?php echo base_url(). '/assets/poster/'. $facility->URL_Gambar;?>" width = "300" style="margin-top:10px;margin-bottom:10px">
                    <br>
                    <button class="btnfiles addfiles">Add Files</button>
                    <input class="input100" type="file" name="FileUpload" id="file" mutliple style="display:none" value="">
                </div>
                
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="save">
						<span>
							    Update
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<div class="container-contact100-form-btn">
					<a class="contact100-form-btn" href="<?php echo site_url('Home')?>" style="background-color:red;margin-top=10px;" name="cancel">
						<span>
							Back
						</span>
					</a>
				</div>
        <?php echo form_close(); ?>
        </div>
		<script>
$('.addfiles').on('click', function() { $('#file').click();return false;});
</script>
<?php }
}?>



