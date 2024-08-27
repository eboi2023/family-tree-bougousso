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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
          <?= get_phrase($lien); ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
          <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
          <li class="active"><?= $icon; ?>&nbsp;<?= get_phrase($lien); ?></li>
      </ol>
  </section>
 <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php if($this->session->userdata('id')==1): ?>
      <?php echo form_open_multipart('Langue/update_langue',array('class' => 'form-horizontal UpdateDetails'));?>  
          
          <input type="submit" value="<?php echo get_phrase('Update Langue'); ?>" class="btn btn-primary pull-right">
          
          <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('Multi language action'); ?></a>
          <br /> <br />
      <?php endif; ?>
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      <?php if($this->session->userdata('id')==1): ?>
        <input type="submit" value="<?php echo get_phrase('Update Langue'); ?>" class="btn btn-primary pull-right">
        
        <a href="#" data-toggle="modal" data-target="#modal-create-language"  class="btn btn-primary pull-left"><?php echo get_phrase('Multi language action'); ?></a>
        <br /> <br />
      <?php echo form_close(); ?>
      <?php endif; ?>
    </div>
    <!-- /.row -->
  </section>
    <div class="modal modal-default fade" id="modal-create-language">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('FORMULAIRE'); ?></h2>
                        <h4><?php echo get_phrase('Add and delete the language'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-danger">
                <?php echo form_open('langue/option') ; ?>
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
</div>
<script type="text/javascript">
  var manageTable;
    var base_url = "<?php echo base_url(''); ?>";

    $(document).ready(function() {
      $("#languageNav").addClass('active');
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
            'autoWidth'   : false,
            'order': []
        });
        
        $('#manageTable tfoot th').each( function () {
            var title = $(this).text();
            if (title=='<?php echo get_phrase('qualification'); ?>') {
              $(this).html( '<input type="text" placeholder="<?php echo get_phrase('search'); ?>" />' );
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