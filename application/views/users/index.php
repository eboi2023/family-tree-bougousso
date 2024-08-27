<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo get_phrase('Manage'); ?>
      <small><?= get_phrase($lien); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
      <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
        <li class="active"><?= $icon; ?>&nbsp;<?php echo get_phrase($lien); ?> </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <?php if(in_array('createUser', $user_permission)): ?>
          <a href="#" onclick="listenotpost()" data-toggle="modal" data-target="#modal-create-user" class="btn btn-primary"><?php echo get_phrase('Add job'); ?></a>
          <br /> <br />
        <?php endif; ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?php echo get_phrase('Manage job'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="manageTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?php echo get_phrase('N'); ?></th>
                  <th><?php echo get_phrase('Email'); ?></th>
                  <th><?php echo get_phrase('Name'); ?></th>
                  <th><?php echo get_phrase('Phone'); ?></th>
                  <th><?php echo get_phrase('Group'); ?></th>

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php if($user_data): ?>                  
                  <?php foreach ($user_data as $k => $v): ?>
                    <tr>
                      <td><?php
                        if (strlen($v['user_info']['code_m'])==1) {
                         $code='M000'.$v['user_info']['code_m'].'B' ;
                        }
                        if (strlen($v['user_info']['code_m'])==2) {
                         $code='M00'.$v['user_info']['code_m'].'B' ;
                        }
                        if (strlen($v['user_info']['code_m'])==3) {
                          $code='M0'.$v['user_info']['code_m'].'B';
                        }
                        if (strlen($v['user_info']['code_m'])==4) {
                          $code='M'.$v['user_info']['code_m'].'B';
                        }
                        echo $code; ?></td>
                      <td><?php echo $v['user_info']['email']; ?></td>
                      <td><?php echo $v['user_info']['firstname'] .' '. $v['user_info']['lastname']; ?></td>
                      <td><?php echo $v['user_info']['cel']; ?></td>
                      <td><?php echo $v['user_info']['group_name']; ?></td>

                      <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                      <td>
                        <?php if(in_array('deleteUser', $user_permission) || in_array('updateUser', $user_permission)): ?>
                          <?php if(in_array('updateUser', $user_permission)): ?>
                            <a href="#" data-toggle="modal" data-target="#modal-edit-user"  class="btn btn-primary pull-left" onclick="edit_d(<?=$v['user_info']['iduser'];?>,<?=$v['user_info']['idgroup'];?>)"><i class="fa fa-edit"></i></a> &nbsp;
                          <?php endif; ?>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                            <a href="#" data-toggle="modal" data-target="#modal-delete-user" class="btn btn-danger" onclick="deleted_d(<?=$v['user_info']['iduser'];?>)"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    <?php endif; ?>
                    </tr>
                  <?php endforeach ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- edit brand modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-create-user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo get_phrase('Niew personal'); ?></h4>
      </div>
      <?php 
        $attributes = array("class" => "",
                            "role" => "form",
                            "id" => "createForm",
                            "name" => "");
        echo form_open("users/create", $attributes);
      ?>
        <div class="modal-body">
          <div id="messages"></div>
          <input type="hidden" id="attribute_id" name="attribute_id" >
          <div class="form-group col-sm-12">
            <label for="username"><?php echo get_phrase('Username'); ?></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo get_phrase('Username'); ?>" autocomplete="off">
          </div>

          <div class="form-group col-sm-12">
            <label for="fname"><?php echo get_phrase('First name'); ?></label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo get_phrase('First name'); ?>" autocomplete="off">
          </div>

          <div class="form-group col-sm-12">
            <label for="lname"><?php echo get_phrase('Last name'); ?></label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="<?php echo get_phrase('Last name'); ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="gender"><?php echo get_phrase('Gender'); ?></label>
            <div class="radio">
              <label>
                <input type="radio" name="gender" id="male" value="1">
                <?php echo get_phrase('Male'); ?>
              </label>
              <label>
                <input type="radio" name="gender" id="female" value="2">
                <?php echo get_phrase('Female'); ?>
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="email"><?php echo get_phrase('Email'); ?></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Email'); ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="phone"><?php echo get_phrase('Phone'); ?></label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Phone'); ?>" autocomplete="off">
          </div>

          <input type="hidden" class="form-control" id="localization" name="localization" value="2">
            
          <div class="form-group">
            <label for="edit_active"><?php echo get_phrase('Personal post'); ?></label>
            <select class="form-control" id="edit_active" name="edit_active" required>
              <option value="">fait le choix</option>
              <?php 
                  if($group_poste){
                      foreach($group_poste as $selectvalue){
                        ?>
                        <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->group_name;?></option>
                <?php }} ?>
            </select>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
          </div>
          <input type="hidden" name="codeverifinconf" value="Post">
          <input type="hidden" name="verifcode" id="verifcode" value="1">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo get_phrase('Close'); ?></button>
          <button type="submit" class="btn btn-primary"><?php echo get_phrase('Save changes'); ?></button>
        </div>

      <?php echo form_close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog"x id="modal-edit-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">
            <center>
                <h2 class="box-title"><?php echo get_phrase('Voulez-vous vraiment le supprimer'); ?>?</h2>
                <h4><?php echo get_phrase('Si oui entrer le code de validation et cliquer sur supprimer'); ?></h4>
            </center>
        </h4>
      </div>
      <div class="modal-body box box-danger">
        <?php echo form_open('users/update') ; ?>
          <div class="box-body"> 
            <div class="form-group">
              <label for="code_group"><?php echo get_phrase('Personal post'); ?></label>
              <select class="form-control" id="vue_active" name="code_group" required>
                
              </select>
            </div>                       
            <div class="form-group">
              <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
            </div>
            <input type="hidden" name="codeverifinconf" value="Post">
            <input type="hidden" name="verifcode" id="verifcode" value="2">
            <input type="hidden" name="code_user" id="identi_adh_modif" >
          </div>
          <div class="modal-footer box box-danger">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
            <input type="submit" id="valider3" value="<?php echo get_phrase('edit'); ?>" class="btn btn-danger" name="envoi" />
          </div>
        <?php echo form_close() ; ?>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>  
</div>
<div class="modal fade" tabindex="-1" role="dialog"x id="modal-delete-user">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">
                  <center>
                      <h2 class="box-title"><?php echo get_phrase('Voulez-vous vraiment le supprimer'); ?>?</h2>
                      <h4><?php echo get_phrase('Si oui entrer le code de validation et cliquer sur supprimer'); ?></h4>
                  </center>
              </h4>
          </div>
          <div class="modal-body box box-danger">
              <?php echo form_open('users/update') ; ?>
                  <div class="box-body">                        
                      <div class="form-group col-md-12">
                           <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                      </div>
                      <input type="hidden" name="codeverifinconf" value="Post">
                      <input type="hidden" name="verifcode" id="verifcode" value="3">
                      <input type="hidden" name="code_user" id="identi_adh" >


                  </div>
                  <div class="modal-footer box box-danger">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                      <input type="submit" id="valider3" value="<?php echo get_phrase('Supprimer'); ?>" class="btn btn-danger" name="envoi" />
            
                  </div>
              <?php echo form_close() ; ?>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>  
</div>
<script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";
  $("#mainUserNav").addClass('active');
  $("#manageUserNav").addClass('active');
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
       "language": {
                "decimal": ",",
                "thousands": ".",
                "info": "<?php echo get_phrase('to'); ?> _START_ <?php echo get_phrase('to'); ?> _END_ <?php echo get_phrase('for'); ?> _TOTAL_ <?php echo get_phrase('ligne(s)'); ?>",
                "infoEmpty": "<?php echo get_phrase('Aucune entree'); ?>",
                "infoPostFix": "",
                "infoFiltered": " - <?php echo get_phrase('filtre du total'); ?> _MAX_ <?php echo get_phrase('entrees'); ?>",
                "loadingRecords": "<?php echo get_phrase('Veuillez patienter - Chargement des donnees ...'); ?>",
                "lengthMenu": "<?php echo get_phrase('Nombre de ligne a afficher'); ?>: _MENU_",
                "paginate": {
                    "first": "<?php echo get_phrase('Premier'); ?>",
                    "last": "<?php echo get_phrase('Dernier'); ?>",
                    "next": "<?php echo get_phrase('Suivant'); ?>",
                    "previous": "<?php echo get_phrase('Precedent'); ?>"
                },
                "processing": "<?php echo get_phrase('veillez passienter ...'); ?>",
                "search": "<?php echo get_phrase('search'); ?>: ",
                "searchPlaceholder": "",
                "zeroRecords": "<?php echo get_phrase('Pas de donnees! S il vous plait changer votre terme de recherche'); ?>.",
                "emptyTable": "<?php echo get_phrase('Aucune donnee disponible'); ?>",
                "aria": {
                    "sortAscending":  ": <?php echo get_phrase('permet de trier la colonne par ordre croissant'); ?>",
                    "sortDescending": ": <?php echo get_phrase('permet de trier la colonne par ordre decroissant'); ?>"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "<?php echo get_phrase('Nouveau'); ?>",
                    "edit": "<?php echo get_phrase('Changement'); ?>",
                    "remove": "<?php echo get_phrase('Effacer'); ?>",
                    "copy": "<?php echo get_phrase('copie'); ?>",
                    "csv": "<?php echo get_phrase('CSV-Datei'); ?>",
                    "excel": "<?php echo get_phrase('Excel-Tabelle'); ?>",
                    "pdf": "<?php echo get_phrase('PDF-Document'); ?>",
                    "print": "<?php echo get_phrase('Imprimer'); ?>",
                    "colvis": "<?php echo get_phrase('Selection de colonne'); ?>",
                    "collection": "<?php echo get_phrase('selection'); ?>"
                },
                select: {
                    rows: {
                        _: '%d <?php echo get_phrase('Lignes selectionnees'); ?>',
                        0: '<?php echo get_phrase('Cliquez sur la ligne pour selectionner'); ?>',
                        1: '<?php echo get_phrase('Une ligne selectionnee'); ?>'
                    }
                }
            },
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order': []
    });

  });

  

  function deleted_d(A){
    document.getElementById('identi_adh').value=A; 
  }

  function edit_d(A,B){
    $.ajax({
            url: base_url+'Users/fetchlistposte/'+B,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('vue_active').innerHTML=response;
                document.getElementById('identi_adh_modif').value=A;
            }
        });
     
  }


</script>
