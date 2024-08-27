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
  <section class="content">
        <div class="row">

            
            <div class="pull-left col-xs-12">
                <?php if(in_array('createCaisse', $this->permission)) {?>
                <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-success" onclick="listeadh()" >
                    &nbsp;<?php echo get_phrase('Ajout cotisation'); ?>
                </button>
                <?php }?>
            </div>
            <br>

            <div class="col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-header"><br>
                        <!-- /.box-header -->
                        <div class="box-body" id="matrice_membre">  
                            <table id="manageTable" class="table table-bordered table-striped col-md-12 col-xs-12">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <center><?php echo get_phrase('N'); ?></center>
                                        </th>
                                        <th width="20%">
                                            <center><?php echo get_phrase('name'); ?></center>
                                        </th>
                                        <th width="15%">
                                            <center><?php echo get_phrase('Montant du'); ?></center>
                                        </th>
                                        <th width="25%">
                                            <center><?php echo get_phrase('Montant verser'); ?></center>
                                        </th>
                                        <th width="20%">
                                            <center><?php echo get_phrase('reste'); ?></center>
                                        </th>
                                        <th width="5%">
                                            <center><?php echo get_phrase('Action'); ?></center>
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>           
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th width="5%">
                                        <center><?php echo get_phrase('N'); ?></center>
                                      </th>
                                      <td width="20%"><?php echo get_phrase('name'); ?></td>
                                      <th width="15%">
                                          <center><?php echo get_phrase('Montant du'); ?></center>
                                      </th>
                                      <th width="25%">
                                          <center><?php echo get_phrase('Montant verser'); ?></center>
                                      </th>
                                      <th width="20%">
                                          <center><?php echo get_phrase('reste'); ?></center>
                                      </th>
                                      <th width="5%">
                                          <center><?php echo get_phrase('Action'); ?></center>
                                      </th>
                                    </tr>
                                </tfoot>
                            </table>
                                                    
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                
            </div>
            
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<div class="modal modal-default fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('Formulaire'); ?></h2>
                        <h4><?php echo get_phrase('Nouveau Mouvement'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                <?php echo form_open('') ; ?>
                    <div class="box-body">
                        <label for=""><?php echo get_phrase('membership'); ?></label>
                        <div class="form-group col-md-12">
                            <input type='text' class='form-control' name='nom_indivi' placeholder='le numero membre' list="Num" required>
                            <datalist id="Num">
                            </datalist>
                        </div>
                        <div class="form-group col-md-12">
                          <label for=""><?php echo get_phrase('Montant'); ?></label>
                          <div class="input-group" id="verifmontant">
                            <input type="number" min="0" class="form-control" name="montant" id="montant"  required>
                            <span class="input-group-addon"><?=$company_currency;?></span>
                          </div> 
                        </div>
                        <div class="form-group col-md-12">
                          <div class="form-group col-md-6">
                              <input type="date" class="form-control" name="d_act" id="d_act" required max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                          </div>
                        
                          <div class="form-group col-md-6 pull-right">
                             <input type="time" class="form-control pull-left" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">
                          </div>
                        </div>
                        <div class="form-group col-md-12">
                             <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Caisse">
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider2" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success" name="envoi" />
              
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
    var base_url = "<?php echo base_url(''); ?>";
    $(document).ready(function() {
        $("#Memberships_fee").addClass('active');
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
            'ajax': base_url + 'cotisation/fetchCotisationdata',
            'order': []
        });
        $('#manageTable tfoot td').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" id="'+title+'" placeholder="<?php echo get_phrase('search'); ?>" />' );
            
            
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
    function listeadh(){
     $.ajax({
        url: base_url+'cotisation/fetchlistadhet',
        type: 'GET',
        dataType: 'json',
        success:function(response) {
            document.getElementById('Num').innerHTML=response;
        }
    });
    }

    

    function modif_mouv(pp){
        
        $.ajax({
            url: base_url+'Caisses/fetchCaisseValueById/'+pp,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('page_modification').innerHTML=response;
            }
        });
    }
</script>