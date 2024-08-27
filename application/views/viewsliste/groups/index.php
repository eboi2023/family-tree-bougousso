

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?php echo get_phrase('Groups'); ?></small>
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

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <?php if(in_array('createGroup', $user_permission)): ?>
            <a href="<?php echo base_url('groups/create') ?>" class="btn btn-primary"><?php echo get_phrase('Add Group'); ?></a>
            <br /> <br />
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo get_phrase('Manage Groups'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo get_phrase('Group Name'); ?></th>
                  <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                    <th><?php echo get_phrase('Action'); ?></th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($groups_data): ?>                  
                    <?php foreach ($groups_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['group_name']; ?></td>
                        <td>
                          <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                            <?php if(($v['id']!=7) && ($v['id']!=20)): ?>
                              <?php if(in_array('updateGroup', $user_permission)): ?>
                                <a href="<?php echo base_url('groups/edit/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>  
                              <?php endif; ?>
                                
                              <?php if(in_array('deleteGroup', $user_permission)): ?>
                                <a href="<?php echo base_url('groups/delete/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php if($this->session->userdata('id')==1): ?>
                                <?php if(in_array('updateGroup', $user_permission)): ?>
                                  <a href="<?php echo base_url('groups/edit/'.$v['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>  
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
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

  <script type="text/javascript">
    $("#Menuemploie").addClass('active');
    $(document).ready(function() {
      manageTable = $('#groupTable').DataTable({
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
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
      });

      
    });
  </script>
