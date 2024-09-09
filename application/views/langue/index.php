<style type="text/css">
  .text{
    border: none;
    background:transparent;
    width: 100%;
  }
  .text:hover, .text:focus{
    background: #000;
    color:#FFF;
  }
</style>
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <?php if($this->session->userdata('id')==1): ?>
                <?php echo form_open_multipart('langues/update_langue',array('class' => 'form-horizontal UpdateDetails'));?>
                  <div class="card-header">
                    <input type="submit" value="<?php echo get_phrase('Update Langue'); ?>" class="btn btn-primary pull-right">
                    <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('Multi language action'); ?></a>
                      <br /> <br />
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="manageTable" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                            <th><?php echo get_phrase('N'); ?></th>
                            <th><?php echo get_phrase('qualification');$compte=0; ?></th>
                            <?php if($type_langue){
                                foreach($type_langue as $selectvalue){ $compte++; ?>
                                    <th><?php $libel[$compte] = $selectvalue->type_language; echo get_phrase($libel[$compte]); ?></th>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $n=0;foreach ($aff_langue as $key => $value) {$n++;?> 
                            <tr> 
                                <td><?=$n;?></td>
                                <td><?=$value['phrase'];?></td>
                                <?php for ($i=1; $i <=$compte ; $i++) {$p=$libel[$i];?>
                                    <td>
                                        <input type="hidden" name="idvalue[]" value="<?=$value['phrase_id'];?>">
                                        <input type="hidden" name="Langue[]" value="<?=$p;?>">
                                        <input  class="text" type="text" name="value[]" value="<?=$value[$p];?>" >
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>          
                      </tbody>
                      <tfoot>
                          <tr>
                              <td><?php echo get_phrase('N'); ?></td>
                              <th><?php echo get_phrase('qualification');$compte=0; ?></th>
                              <?php if($type_langue){
                                  foreach($type_langue as $selectvalue){ $compte++; ?>
                                      <th><?php $libel[$compte] = $selectvalue->type_language; echo get_phrase($libel[$compte]); ?></th>
                                  <?php } ?>
                              <?php } ?>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <input type="submit" value="<?php echo get_phrase('Update Langue'); ?>" class="btn btn-primary pull-right">
                    <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('Multi language action'); ?></a>
                      <br /> <br />
                  </div>
                <?php echo form_close(); ?>
              <?php endif; ?>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 <div class="modal modal-default fade" id="modal-create-language">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  <h2 class="box-title">
                    <?php echo get_phrase('FORMULAIRE'); ?>
                  </h2>
                </h4>
                <h4>
                  <?php echo get_phrase('Add and delete the language'); ?>
                </h4>
              </center>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body box box-danger">
                <?php echo form_open('langues/option') ; ?>
                    <div class="box-body">    
                        <div class="form-group">
                          <label for="currency"><?php echo get_phrase('section action'); ?></label>
                          <?php ?>
                          <select class="form-control" id="tttt" name="option_langue" onchange="selection_action()" required>
                            <option value="">~~SELECT~~</option>
                            <option value="1"><?php echo get_phrase('Add'); ?></option>
                            <option value="2"><?php echo get_phrase('Delecte'); ?></option>
                          </select>
                        </div>              
                        <div class="form-group" id="type_valeur">
                          
                        </div>
                        <input type="hidden" name="action_option_emision" id="action_option_emision">
                    </div>
                    <div class="modal-footer box box-danger">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                        <input type="submit" id="valider3" value="<?php echo get_phrase("view");?>" class="btn btn-danger" name="envoi" />
              
                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>  
    </div>
    <script type="text/javascript"> 
      function selection_action(){
        var select = document.getElementById("tttt");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur=="") {
          document.getElementById('type_valeur').innerHTML='';
        }else{
          if (valeur==1) {
            document.getElementById('type_valeur').innerHTML='<label for="add_langue"><?php echo get_phrase('section langue'); ?></label><input class="form-control" type="text" name="add_langue" id="add_langue" placeholder="<?php echo get_phrase('enter in the name language'); ?>" required>';
            
            document.getElementById('action_option_emision').value=1;
            document.getElementById('valider3').value='<?php echo get_phrase("create");?>';
          }
          if (valeur==2) {
            document.getElementById('type_valeur').innerHTML='<label for="langue"><?php echo get_phrase('section langue'); ?></label><?php ?><select class="form-control" id="langue" name="langue" required><option value="">~~SELECT~~</option><?php if($type_langue){
                                foreach($type_langue as $selectvalue){$libel=$selectvalue->type_language;$id_langue=$selectvalue->id; 
                                  if ($id_langue==1 || $id_langue==2) {}else{?>
                                  <option value="<?=$libel?>" <?php if('aaa' == $libel) {echo "selected";} ?>><?php echo get_phrase($libel);?></option><?php }} ?>
                              <?php } ?></select>';
            document.getElementById('action_option_emision').value=2;
            document.getElementById('valider3').value='<?php echo get_phrase("deleted");?>';

          }
        }
        
      }
    </script>