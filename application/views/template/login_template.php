
    <div class="container">
        <div class="user" style="background-image: url('<?php $company_info = $this->model_company->getCompanyData(1); echo base_url('uploads/').''.$company_info['logo']; ?>')"></div>
        <form>
            <h1><?php echo get_phrase($page_title,1); ?></h1>
            <div class="input">
                <input type="text" required />
                <label><?php echo get_phrase('email',3); ?></label>
            </div>
            <div class="input box">
                <input type="password" required  style="-webkit-text-security: circle;" />
                <label><?php echo get_phrase('Password',3); ?></label>
                <div class="forgot"><a href="<?php echo site_url('passwordnew')?>"><?php echo get_phrase('Forgot Password',3); ?>?</a></div>
            </div>
            <input class="L_btn" type="submit" value="<?php echo get_phrase('connexion',1); ?>" />
        </form method="get">
        <div class="div">
            <div class="line"></div>
            <div class="signup"><?php echo get_phrase('Don`t Have an account',3); ?>? <a href="<?php echo site_url('register')?>"><?php echo get_phrase('Sign Up',1); ?></a></div>
        </div>
    </div>
