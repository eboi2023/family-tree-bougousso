 

  <main id="main">
    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <br>
            <div class="section-header">
                <?php if ($this->session->flashdata('mms_error')) {
                 ?>
                 <p style="color: red;"><?php echo $this->session->flashdata('mms_error');?></p>
                <?php }?>
                <?php if ($donnes['fois']) {
                 ?>
                  <p style="color: blue;"><?php echo $this->session->flashdata('mss_succes');?></p>
                  <p>votre code de connexion est le: </p>
                  <h2><?php echo $donnes['code_membre'];?></h2><br/>
                  <h2>A remettre pour l'adhésion</h2><br/>
                <?php }?>
                
             
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--==========================
      inscription Section
    ============================-->
    <section id="nscription" class="section-bg wow fadeInUp">

      <div class="container">

       
        

      </div>
    </section><!-- #contact -->

  </main>