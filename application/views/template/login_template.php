        
        
    <div class="container">
        <div class="user" style="background-image: url('<?php $company_info = $this->model_company->getCompanyData(1); echo base_url('uploads/').''.$company_info['logo']; ?>')"></div>
        <?php 
          $attributes = array("class" => "",
                              "id" => "",
                              "method"=> "get",
                              "name" => "");
          echo form_open("", $attributes);
        ?>
            <?php if (empty($errors)) {?>
                <div class="alert_wrapper active">
                    <div class="alert_backdrop"></div>
                    <div class="alert_inner ">
                        
                        <div class="alert_item alert_error ">
                            <div class="icon data_icon">
                                <i class="fas fa-bomb"></i>
                            </div>
                            <div class="data">
                                <p class="title"><span><?php echo get_phrase('Error',3); ?>:</span>
                                    <?php echo get_phrase('connected',3); ?>
                                </p>
                                <p class="sub"><?php echo $errors; ?>.</p>
                            </div>
                            <div class="icon close">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
            <h1><?php echo get_phrase($page_title,1); ?></h1>
            <div class="input">
                <input type="email" name="mail" required />
                <label><?php echo get_phrase('email',3); ?></label>
            </div>
            <div class="input box">
                <input type="password" name="password" required/>
                <label><?php echo get_phrase('Password',3); ?></label>
                <div class="forgot"><a href="<?php echo site_url('passwordnew')?>"><?php echo get_phrase('Forgot Password',3); ?>?</a></div>
            </div>
            <input class="L_btn" type="submit" value="<?php echo get_phrase('connexion',1); ?>" />
         <?php echo form_close(); ?>
        <div class="div">
            <div class="line"></div>
            <div class="signup"><?php echo get_phrase('Don`t Have an account',3); ?>? <a href="<?php echo site_url('register')?>"><?php echo get_phrase('Sign Up',1); ?></a></div>
        </div>
    </div>

    
    <script>
            var alert_items = document.querySelectorAll(".alert_item");
            var btns = document.querySelectorAll(".btn");
            var alert_wrapper = document.querySelector(".alert_wrapper");
            var close_btns = document.querySelectorAll(".close");

            

            close_btns.forEach(function(close, close_index){
                close.addEventListener("click", function(){
                    alert_wrapper.classList.remove("active");

                    alert_items.forEach(function(alert_item, alert_index){
                        alert_item.style.top = "-100%";
                    })
                })
            })

        </script>