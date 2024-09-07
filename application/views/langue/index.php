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
                <?php echo form_open_multipart('Langue/update_langue',array('class' => 'form-horizontal UpdateDetails'));?>
                  <div class="card-header">
                    <input type="submit" value="<?php echo get_phrase('Update Langue'); ?>" class="btn btn-primary pull-right">
                    <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('Multi language action'); ?></a>
                      <br /> <br />
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
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
 
