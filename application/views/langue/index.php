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
                    <input type="submit" value="<?php echo get_phrase('Update_Langue',3); ?>" class="btn btn-primary pull-right">
                    <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('add_or_remove_a_language',3); ?></a>
                    <a href="#" data-toggle="modal" data-target="#modal-deleted-language"  class="btn btn-danger pull-left"><?php echo get_phrase('action_deleted',3); ?></a>
                      <br /> <br />
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="manageTable" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                            <th><?php echo get_phrase('N',3); ?></th>
                            <th><?php echo get_phrase('qualification',3);$compte=0; ?></th>
                            <?php if($type_langue){
                                foreach($type_langue as $selectvalue){ $compte++; ?>
                                    <th><?php $libel[$compte] = $selectvalue->type_language; echo get_phrase($libel[$compte],3); ?></th>
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
                    <input type="submit" value="<?php echo get_phrase('Update Langue',3); ?>" class="btn btn-primary pull-right">
                    <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('add_or_remove_a_language',3); ?></a>
                    <a href="#" data-toggle="modal" data-target="#modal-deleted-language"  class="btn btn-danger pull-left"><?php echo get_phrase('action_deleted',3); ?></a>
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
                <h4 class="modal-title">
                  <h2 class="box-title">
                    <?php echo get_phrase('Add_or_delete_the_language',1); ?>
                  </h2>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body box box-danger"> 
                <?php echo form_open('langues/option') ; ?>
                    <div class="box-body">    
                        <div class="form-group">
                          <label for="currency"><?php echo get_phrase('section action',3); ?></label>
                          <?php ?>
                          <select class="form-control" id="currency" name="option_langue" onchange="selection_action()" required>
                            <option value="">~~SELECT~~</option>
                            <option value="1"><?php echo get_phrase('Add',1); ?></option>
                            <option value="2"><?php echo get_phrase('Delecte',1); ?></option>
                          </select>
                        </div>              
                        <div class="form-group" id="type_valeur">
                          
                        </div>
                        <input type="hidden" name="action_option_emision" id="action_option_emision">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><?php echo get_phrase('close',3); ?></button>
                        <input type="submit" id="valider3" value="<?php echo get_phrase("view",3);?>" class="btn btn-danger btn-outline-light" name="envoi" />
              
                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>  
    </div>
    <!-- /.modal add or deleted colone language -->

    <?php 
      $listposition = '';
      foreach ($aff_langue as $key => $value) {
        $listposition.='<option data-id="'.$value['phrase_id'].'" value="'.$value['phrase'].'"/>';
      }
    ?>
    <div class="modal modal-default fade" id="modal-deleted-language">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                  <h2 class="box-title">
                    <?php echo get_phrase('delete_the_sentence',1); ?>
                  </h2>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body box box-danger"> 
                        <?php 
                  $attributes = array("oninput" => "return selection_action_delete(this)");
                  echo form_open("langues/deleted", $attributes);
                ?>
                    <div class="box-body"> 
                        <div class="form-group">
                          <label for="selete_sentence"><?php echo get_phrase('select_the_sentence',3); ?></label>
                          <input type="text" class="form-control" id="selete_sentence" name="selete_sentence"  autocomplete="off" list="listsentence">
                          <datalist id='listsentence' style="background: red" >
                            <?php echo $listposition;?>
                          </datalist>
                        </div>
                        <input type="hidden" name="action_option_deleted" id="action_option_deleted">
                    </div>
                    <div class="modal-footer justify-content-between">
                       
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal"><?php echo get_phrase('close',3); ?></button>
                      <button type="submit" class="btn btn-danger btn-outline-light"><?php echo get_phrase("deleted",3);?></button>
                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>  
    </div>
    <!-- /.modal deleted ligne language -->
    <script type="text/javascript"> 
      function selection_action_delete(form){
        form.action_option_deleted.value = document.querySelector(`datalist option[value="${form.selete_sentence.value}"]`).dataset.id;
      }
      function selection_action(){
        var select = document.getElementById("currency");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur=="") {
          document.getElementById('type_valeur').innerHTML='';
        }else{
          if (valeur==1) {
            document.getElementById('type_valeur').innerHTML='<label for="add_langue"><?php echo get_phrase('section langue',3); ?></label><input class="form-control" type="text" name="add_langue" id="add_langue" placeholder="<?php echo get_phrase('enter in the name language',3); ?>" required>';
            
            document.getElementById('action_option_emision').value=1;
            document.getElementById('valider3').value='<?php echo get_phrase("create",3);?>';
          }
          if (valeur==2) {
            document.getElementById('type_valeur').innerHTML='<label for="langue"><?php echo get_phrase('section langue',3); ?></label><?php ?><select class="form-control" id="langue" name="langue" required><option value="">~~SELECT~~</option><?php if($type_langue){
                                foreach($type_langue as $selectvalue){$libel=$selectvalue->type_language;$id_langue=$selectvalue->id; 
                                  if ($id_langue==1 || $id_langue==2) {}else{?>
                                  <option value="<?=$libel?>" <?php if('aaa' == $libel) {echo "selected";} ?>><?php echo get_phrase($libel,3);?></option><?php }} ?>
                              <?php } ?></select>';
            document.getElementById('action_option_emision').value=2;
            document.getElementById('valider3').value='<?php echo get_phrase("deleted",3);?>';

          }
        }
        
      }
    </script>