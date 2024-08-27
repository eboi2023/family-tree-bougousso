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
      <div class="row">

        <div class="col-md-3">
            <?php if(in_array('validateAccessory', $this->permission)) { ?>
            <a href="#" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#modal-create" onclick="typeenvoie(1)"><?php echo get_phrase(' envoyer SMS'); ?></a>

            <a href="#" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#modal-create" onclick="typeenvoie(2)"><?php echo get_phrase('envoyer mail'); ?></a>
          <?php } ?>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo get_phrase('Folders'); ?></h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li id="liremenu1" class="active">
                            <a href="#" onclick="refreshmenu(1)" >
                                <i class="fa fa-wechat"></i> 
                                <?php echo get_phrase('Inbox'); ?> <?php echo get_phrase('sms'); ?>
                                <span class="label label-primary pull-right">12</span>
                            </a>
                        </li>
                        <li id="liremenu2">
                            <a href="#" onclick="refreshmenu(2)" >
                                <i class="fa fa-envelope"></i>
                                <?php echo get_phrase('Inbox'); ?> <?php echo get_phrase('mail'); ?>
                                <span class="label label-primary pull-right">12</span>
                            </a>
                        </li>
                       <li id="liremenu3">
                            <a href="#" onclick="refreshmenu(3)" >
                                <i class="fa fa-calendar"></i>
                                <?php echo get_phrase('Inbox'); ?> <?php echo get_phrase('evenement'); ?>
                                <span class="label label-primary pull-right">12</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            
            

            
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-refresh"></i>
                    </button>
                  </div>
                  <div class="btn-group pull-right">
                    <label class="btn btn-default btn-sm" for="permission">
                      <i class="fa fa-square-o"></i>
                    </label>
                  </div>
                  
              </div>
              <div class="table-responsive mailbox-messages">
               <table id="manageTable" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th><?php echo get_phrase('select'); ?></th>
                      <th><?php echo get_phrase('Type'); ?></th>
                      <th><?php echo get_phrase('Description'); ?></th>
                      <th><?php echo get_phrase('Group'); ?></th>

                      <th><?php echo get_phrase('Date'); ?></th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=1; $i <14 ; $i++) {  ?>
                    
                    <tr>
                      <td><input type="checkbox" id="permission" /></td>
                      <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce<?=$i;?></a></td>
                      <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                      </td>
                      <td class="mailbox-attachment" ><i class="fa fa-male" title="membre"></i></td>
                      <td class="mailbox-date"><?=$i;?>/01/2020</td>
                    </tr><?php  
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><?php echo get_phrase('select'); ?></th>
                      <td><?php echo get_phrase('Type'); ?></td>
                      <td><?php echo get_phrase('Description'); ?></td>
                      <th><?php echo get_phrase('Group'); ?></th>

                      <th><?php echo get_phrase('Date'); ?></th> 
                    </tr>
                  </tfoot>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="mailbox-controls">
                  <!-- Check all button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                      <i class="fa fa-square-o"></i>
                    </button>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-trash-o"></i>
                    </button>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fa fa-refresh"></i>
                    </button>
                  
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- /.content -->
  </div>
  <div class="modal modal-default fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('envoie du sms'); ?></h2>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-warning">
                <?php echo form_open('') ; ?>

                    <div class="box-body">   

                        <label class="col-sm-12 control-label"><?php echo get_phrase('type evenement'); ?></label>
                        <div class="form-group col-md-12 col-xs-12">
                          <select onchange="infopersonne()" class="form-control" title="<?php echo get_phrase('votre choix'); ?>" name="typeevenement" id="typeevenement" required>
                            <option value="0" selected ><?php echo get_phrase('all the members'); ?></option>
                            <option value="1" ><?php echo get_phrase('all the memberships'); ?></option>
                            <option value="2"><?php echo get_phrase('all the personnal'); ?></option>
                            <option value="3"><?php echo get_phrase('selected'); ?></option>
                          </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12" id="selected_person">
                            <label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>
                        </div>
                        <div class="form-group col-md-12 col-xs-12" id="title_message">
                            
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="edite" name="editesms" maxlength="160">
                                
                            </textarea>
                        </div>                     
                          
                        <input type="hidden" name="verifcode" id="verifcode3" >


                    </div>
                    <div class="modal-footer box box-warning">
                        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider4" value="<?php echo get_phrase('envoie donnees'); ?>" class="btn btn-warning" name="envoi" />
              
                    </div>
                <?php echo form_close() ; ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
</div>
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/select2/dist/css/select2.min.css">

<!-- Select2 -->
<script src="<?php echo site_url('assets/');?>bower_components/select2/dist/js/select2.full.min.js"></script>
<style type="text/css">
    .select2{
        width: 100%!important;
    }
</style>
<!-- include summernote -->
<link rel="stylesheet" href="<?php echo site_url('assets/');?>css/summernote/summernote.css">
      <!-- summernote JS
============================================ -->
<script src="<?php echo site_url('assets/');?>js/summernote/summernote.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/summernote/summernote-active.js"></script>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";
  $("#Menuaccessoire").addClass('active');
  $(document).ready(function() {
    
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
      'order': [4]
    });
    $('#manageTable tfoot td').each( function () {
            var title = $(this).text();
            if (title=='<?php echo get_phrase('Realiser le'); ?>') {
              $(this).html( '<input type="date" placeholder=" Recherche" style="width:100%"/>' );

            }else{
                if (title=='<?php echo get_phrase('Type'); ?>') {
                    $(this).html( '<input type="text" id="'+title+'" placeholder="<?php echo get_phrase('search'); ?>" list="mouv" /><datalist id="mouv"><option  value="<?php echo get_phrase('sms'); ?>"><?php echo get_phrase('SMS'); ?></option><option  value="<?php echo get_phrase('mail'); ?>"><?php echo get_phrase('mail'); ?></option></select>' );

                }else{
                  $(this).html( '<input type="text" id="'+title+'" placeholder="<?php echo get_phrase('search'); ?>" />' );
                }
            }
            
        } );
 
        // DataTable
        var table = $('#manageTable').DataTable();
     
        // Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change clear', function () {
              if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
              }
            } );
        } );

  });
  
  function typeenvoie(a){
    if (a == 1) {
      document.getElementById('valider4').value='<?php echo get_phrase(' envoyer SMS'); ?>';
      document.getElementById('title_message').innerHTML='';
      document.getElementById('edite').classList.remove('summernote');
    }
    if (a == 2) {
      document.getElementById('valider4').value='<?php echo get_phrase('envoyer mail'); ?>';
      document.getElementById('title_message').innerHTML='<label class="col-sm-12 control-label" for="title"><?php echo get_phrase('title'); ?></label><input type="text" name="title" class="form-control" />';
     
      $(document).ready(function() {
              $("#edite").addClass('summernote');
              
            }); 
    }
  }

  function infopersonne(){

    
        var select = document.getElementById("typeevenement");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur==0) {
            document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>';
        }else{
            if (valeur==1) {
                document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the memberships'); ?>';
            }else{
                if (valeur==2) {
                    document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the personnal'); ?></label>';
                }else{
                    if (valeur==3) {
                        $.ajax({
                            url: base_url+'Evenement/listPersMember',
                            type: 'GET',
                            dataType: 'json',
                            success:function(response) {
                                document.getElementById('selected_person').innerHTML = response;
                                
                                $('.select2').select2({
                                    theme: 'classic'
                                });
                                
                            }
                        });
                        
                    } 
                }
            }
        }
    }
    function refreshmenu(a){
      var p = 'liremenu'+a;
      for (var i = 1; i <= 3; i++) {
        var f = 'liremenu'+i;
        if (p == f) {
          $("#"+f).addClass('active');
        }else{
          document.getElementById(f).classList.remove('active');
        }
      }
    }
    

</script>