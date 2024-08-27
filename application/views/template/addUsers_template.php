<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
    <div class="container-contact100">
            <div class="wrap-contact100">
            <?php echo form_open_multipart('Home/add_users','method="post" id="contactForm" class="contact100-form validate-form"');?>
            	<span class="contact100-form-title">
					Add User
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Full Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name" required="">
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email " required="">
					<div style="color: red;margin-bottom: 15px;">
                        <?php echo form_error('email'); ?>
                    </div>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Password">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Enter Your Password" required="">
					<div style="color: red;margin-bottom: 15px;">
                        <?php echo form_error('password'); ?> 
                    </div>
				</div>

                <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Roles</span>
					<div>
						<select class="js-select2" name="role">
							<option>Admin</option>
							<option>User</option>
							<option>Management</option>
						</select>
						<div class="dropDownSelect2"></div>
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
					<a class="contact100-form-btn" href="<?php echo site_url('Home')?>" style="background-color:red;margin-top=10px;" name="cancel">
						<span>
							Back
						</span>
					</a>
				</div>
        <?php echo form_close(); ?>
        </div>
	</div>
<?php 
}?>




























	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function () {
				$(this).on('select2:close', function (e) {
					if ($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>

	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
		var filterBar = document.getElementById('filter-bar');

		noUiSlider.create(filterBar, {
			start: [1500, 3900],
			connect: true,
			range: {
				'min': 1500,
				'max': 7500
			}
		});

		var skipValues = [
			document.getElementById('value-lower'),
			document.getElementById('value-upper')
		];

		filterBar.noUiSlider.on('update', function (values, handle) {
			skipValues[handle].innerHTML = Math.round(values[handle]);
			$('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
			$('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
