<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 col-lg-5">
            <div class="wrap">
              <div class="img PICRegister"></div>
              <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                  <div class="w-100">
                    <h3 class="mb-4">Sign Up</h3>
                  </div>
                  <div class="w-100">
                    <p class="social-media d-flex justify-content-end">
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                    </p>
                  </div>
                </div>
                <form method = "post" action = "<?php echo site_url('register')?>" id = "formLogIn" class="signin-form">
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="name" id="name" required="" />
                    <label class="form-control-placeholder" for="name">Name</label>
                        <div style="color: red;margin-bottom: 15px;">
                        <?php
                            echo form_error('name'); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="email" id="email" required="" />
                    <label class="form-control-placeholder" for="email">Email</label>
                    <div style="color: red;margin-bottom: 15px;">
                        <?php
                            echo form_error('email'); 
                        ?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <input id="password-field" type="password" class="form-control" name="password" required="" />
                    <label class="form-control-placeholder" for="password">Password</label>
                  </div>

                  <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LdiF28dAAAAAD1OdfBBZI9qckxv2K-kQgl0Z8A2"></div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                  </div>
                  <div style="color: red;margin-bottom: 15px;">
                    <?php
                        echo form_error('password'); 
                    ?>
                </div>
                <p class="text-center">Already have an Account? <a data-toggle="tab" href="<?php echo site_url('loginTemplate')?>">Sign In</a></p>
                <div style="color: red;margin-bottom: 15px;text-align:center;">
                    <?php
                        if($this->session->flashdata('message')){
                            echo $this->session->flashdata('message'); 
                        }
                    ?> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
