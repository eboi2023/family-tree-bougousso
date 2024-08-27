
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.5.0
    </div>
    <strong>Copyright &copy; 2019-<?php echo date('Y') ?>.</strong> <?php echo get_phrase('All rights reserved'); ?>.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php if(in_array('updateCode_Modification_company', $user_permission) || in_array('updateCode_Modification_Bureau', $user_permission) || in_array('updateCode_Modification_repport', $user_permission) || in_array('updateCode_Modification_checkout', $user_permission) || in_array('updateCode_Modification_member', $user_permission) || in_array('updateCode_Modification_job', $user_permission)): ?>
  <div class="modal modal-default fade" id="modal-code-modif">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">
                  <center id="titre_ache">
                      
                  </center>
              </h4>
          </div>
          <div class="modal-body box box-success">
            <?php echo form_open('users/controle_pass') ; ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="form-group col-md-3" for="anciencode"><?php echo get_phrase('Ancien code'); ?></label>
                    <input type="password" title="<?php echo get_phrase('Entrer l ancien mot de passe'); ?>" class="form-group col-md-8" name="anciencode" id="anciencode" required>
                </div> 
                <div class="form-group">
                  <label class="form-group col-md-3" for="nouvcode"><?php echo get_phrase('Nouveau code'); ?></label>
                    <input type="password" title="<?php echo get_phrase('Entrer le nouveau mot de passe'); ?>" class="form-group col-md-8" name="nouvcode" id="nouvcode"  required>
                </div> 
                <div class="form-group">
                  <label class="form-group col-md-3" for="confirnouvcode"><?php echo get_phrase('Confimer le code'); ?></label>
                    <input type="password" title="<?php echo get_phrase('Confirmer le nouveau mot de passe'); ?>" class="form-group col-md-8" name="confirnouvcode" id="confirnouvcode"  required>
                </div> 
                <input type="hidden" class="form-group col-md-8" name="namecode" id="namecode">
                <input type="hidden" class="form-group col-md-8" name="demendeur" id="demendeur" value="<?php echo $this->session->userdata('id'); ?>">
                <input type="hidden" class="form-group col-md-8" name="urlcode" id="urlcode" value="<?php $urlbase=$_SERVER['REQUEST_URI']; echo substr($urlbase, 16, strlen($urlbase));?>">
              </div>
              <div class="modal-footer box box-success">
                  <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                  <input type="submit" id="valider" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success" name="envoi" />
              </div>
            <?php echo form_close() ; ?>
          </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>  
  </div>
  <!-- /.modal-content -->
  <script type="text/javascript">
       
        function code_modif_acces(titre){
          var note = titre;
          document.getElementById('titre_ache').innerHTML="<h2 class='box-title'><?php echo get_phrase('modification de'); ?> </h2><h4><?php echo get_phrase('l acces sur'); ?> "+titre+"</h4>";
          document.getElementById('namecode').value = note;
        }
        
    </script>
  <?php endif; ?>

  <?php  if(!empty($this->session->flashdata('success_code')) or !empty($this->session->flashdata('verif_code')) or !empty($this->session->flashdata('erreur_code'))): ?>
      <?php 
        if($this->session->flashdata('success_code')){
          $class_codeconfirme="modal-success";
          $text_codeconfirme=$this->session->flashdata('success_code');
        }
        if($this->session->flashdata('verif_code')){
          $class_codeconfirme="modal-warning";
          $text_codeconfirme=$this->session->flashdata('verif_code');
        }
        if($this->session->flashdata('erreur_code')){
          $class_codeconfirme="modal-danger";
          $text_codeconfirme=$this->session->flashdata('erreur_code');
        }
      ?>  
      <div class="modal <?=$class_codeconfirme;?> fade " id="<?=$class_codeconfirme;?>1" onclick="viewsd('<?=$class_codeconfirme;?>')">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="false" >&times;</span></button>
              <h4 class="modal-title"><?=$text_codeconfirme;?></h4>
            </div>
            
          </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <script type="text/javascript">
          $(document).ready(function() {
            $("#<?=$class_codeconfirme;?>1").addClass('in');
            $("#<?=$class_codeconfirme;?>1").css('display', 'block');
            $("#<?=$class_codeconfirme;?>1").css('padding-right','17px');

          });
          function viewsd(a){
            $(document).ready(function() {
              $("#<?=$class_codeconfirme;?>1").addClass('in');
              $("#<?=$class_codeconfirme;?>1").css('display', 'none');

            });
          } 
        </script>
      </div>
  <?php endif; ?>
    <!-- notifications CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo site_url('assets/');?>css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/');?>css/notifications/notifications.css">
    <script type="text/javascript">
      $(document).ready(function() {
        <?php if($this->session->flashdata('basicWarning') !== null){ ?> 
          Lobibox.notify('warning', {
            sound: true,
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            msg: '<?php echo $this->session->flashdata('basicWarning'); ?>'
          });
        <?php }?> 
        <?php if($this->session->flashdata('basicErreur') !== null){ ?> 
          Lobibox.notify('error', {
            sound: true,
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            msg: '<?php echo $this->session->flashdata('basicErreur'); ?>'
          });
        <?php }?>  
        <?php if($this->session->flashdata('basicSucces') !== null){ ?>
          Lobibox.notify('success', {
            sound: true,
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            msg: '<?php echo $this->session->flashdata('basicSucces'); ?>'
          });
        <?php }?>
        <?php if($this->session->flashdata('basicInfo') !== null){ ?>
          Lobibox.notify('info', {
            sound: true,
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            msg: '<?php echo $this->session->flashdata('basicInfo'); ?>'
          });
        <?php }?>
        <?php if($this->session->flashdata('basicDefault') !== null){ ?>
          Lobibox.notify('default', {
            sound: true,
            showClass: 'bounceIn',
            hideClass: 'bounceOut',
            msg: '<?php echo $this->session->flashdata('basicDefault'); ?>'
          });
        <?php }?>
      });
    </script>
    <!-- notification JS
        ============================================ -->
    <script src="<?php echo site_url('assets/');?>js/notifications/Lobibox.js"></script>
    <script src="<?php echo site_url('assets/');?>js/notifications/notification-active.js"></script>
<?php if(in_array('viewCalcul', $user_permission)): ?>
  <!-- edit brand modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-calculatrice">
      <style>
          .title{
              font-size: 25px;
              font-style: italic;
              font-family: sans-serif;
              color: #0C620C;
          }
          #case{
              height: 37px;
              width: 200px;
              border: 2px solid #2D882D;
              border-radius: 10px;
          }

          .number{
              height: 50px;
              width: 50px;
              font-size: 25px;
              color: white;
              border: 2px solid #2D882D;
              border-radius: 10px;
              background-color: #5FAE5F;
          }
          .number:hover {
              background-color: #0C620C;
          }

          .operator{
              height: 50px;
              width: 50px;
              font-size: 25px;
              color: white;
              border: 2px solid #5FAE5F;
              border-radius: 10px;
              background-color: #9FD29F;
          }
          .operator:hover{
              background-color: #0C620C;
          }
      </style>
      <script type="text/javascript">
          /* JavaScript */
          function btm(val) {
              document.getElementById("calc-output").innerHTML += val;
          }
          function btmClean(){
              document.getElementById("calc-output").innerHTML = "";
          }
          function btmPlus() {
              document.getElementById("calc-output").innerHTML += "+";
          }
          function btmLess() {
              document.getElementById("calc-output").innerHTML += "-";
          }
          function btmMultiply() {
              document.getElementById("calc-output").innerHTML += "*";
          }
          function btmDivision() {
              document.getElementById("calc-output").innerHTML += "/";
          }

          function btmEgal() {
              var egal = eval(document.getElementById("calc-output").innerHTML);
              document.getElementById("calc-output").innerHTML = egal;
          }
      </script>
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 17em;">
          <div class="modal-body" id="calcul">
          </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script type="text/javascript">
    function pages(){
        $.ajax({
            url: "<?php echo base_url('parametre_ass/calculatirice') ?>",
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('calcul').innerHTML=response;
            }
        });
    }
  </script>
<?php endif; ?> 
</body>
</html>
