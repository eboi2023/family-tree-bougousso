
    <div class="containerrpwd">
        <div class="userrpwd" style="background-image: url('<?php $company_info = $this->model_company->getCompanyData(1); echo base_url('uploads/').'question.jpg'; ?>')"></div>
        <?php 
          $attributes = array("class" => "",
                              "role" => "form",
                              "id" => "",
                              "name" => "");
          echo form_open("passwordnew/envoie", $attributes);
        ?>
            <h1><?php echo get_phrase('password reset request',1); ?></h1>
            <div class="input">
                <input type="email" name="email" size="64" maxlength="64" pattern="+@+.+" required />
                <label><?php echo get_phrase('the connection email',3); ?></label>
            </div>
            <div class="input box">
                <div class="forgot"><a href="<?php echo site_url('login')?>"><?php echo get_phrase('click_here_to_connected',1); ?></a></div>
            </div>
            <input class="L_btn" type="submit" value="<?php echo get_phrase('to transmit',1); ?>" />
        </form method="get">
        <div class="div">
            <div class="line"></div>
            <div class="signup"><?php echo get_phrase('Don`t Have an account',3); ?>? <a href="<?php echo site_url('register')?>"><?php echo get_phrase('Sign Up',1); ?></a></div>
        </div>
    </div>
