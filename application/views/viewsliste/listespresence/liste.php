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
            <li><a href="<?php echo site_url();?>domino"><?= $icon; ?>&nbsp;<?php echo get_phrase($lien); ?></a></li>
            <li class="active"><i class="fa fa-plug" ></i> <?php echo get_phrase('liste'); ?> <?php echo get_phrase('consomation'); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="pull-left col-xs-12">
                  <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-success">
                      &nbsp;<?php echo get_phrase('nouvelle prise'); ?>
                  </button>
                  <label class="btn btn-success pull-right">
                      &nbsp;<?php echo get_phrase('compteur').': '.$name_page; ?>
                  </label>
            </div>
            <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                   <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">
                                    <?php echo get_phrase('date'); ?>
                                </th>
                                <th width="20%">
                                    <?php echo get_phrase('notation'); ?>
                                </th>
                                <th width="20%">
                                    <?php 
                                        if ($type_page == 0) {
                                            echo get_phrase('consomation');
                                        }else{
                                           echo get_phrase('view');  
                                        } 
                                    ?>
                                </th>
                                <th width="40%">
                                    <?php echo get_phrase('evolution'); ?>
                                </th>
                                <th width="10%">
                                    <?php echo get_phrase('action'); ?>
                                </th>
                                
                            </tr>
                        </thead>
                      
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10%"><?php echo get_phrase('date'); ?></th>
                                <th width="20%"><?php echo get_phrase('notation'); ?></th>
                                <th width="20%"><?php if ($type_page == 0) { echo get_phrase('consomation');}else{echo get_phrase('view');}?></th>
                                <th width="40%"><?php echo get_phrase('evolution'); ?></th>
                                <th width="10%"><?php echo get_phrase('action'); ?></th>
                                
                            </tr>
                        </tfoot>
                    </table> 
                     <!-- en cours de realisation-->
                </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
    </section>
</div>
<div class="modal modal-default fade" id="modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('Formulaire'); ?></h2>
                        <h4><?php echo get_phrase('Nouveau consomation'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                <?php 
                  $attributes = array("class" => "contactForm",
                                      "role" => "form",
                                      "name" => "");
                  echo form_open("", $attributes);
                ?>
                    <div class="box-body"> 
                        
                        <?php
                        if ($type_page == 0) {
                            ?>
                            <div class="form-group col-md-12">
                                <input type="number" class="form-control" name="consomation" id="consomation" title="<?php echo get_phrase('consomation'); ?>" min="<?php echo $maxvalcompt; ?>" required>
                            </div>
                            <?php
                        }
                        
                        else{
                            ?>
                            <div class="form-group col-md-12">
                                <select name="typepagerecharge" class="form-control" title="<?php echo get_phrase('Que vouliz vous fait'); ?>?" required>
                                    <option value=""><?php echo get_phrase('selected'); ?></option>
                                    <option value="1"><?php echo get_phrase('Apres rechargement'); ?></option>
                                    <option value="0"><?php echo get_phrase('Apres utilisation'); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="number" class="form-control" name="consomation1" id="consomation1" title="<?php echo get_phrase('reste consomation'); ?>" required>
                            </div>
                            <div class="form-group col-md-1" style="margin-top: 1em;">
                                ,
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control" name="consomation2" id="consomation2" title="<?php echo get_phrase('reste consomation'); ?>" required>
                            </div>
                            <input type="hidden" class="form-control" name="maxmod" id="maxmod" value="<?php echo $maxvalcompt; ?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for=""><?php echo get_phrase('Effectue le'); ?></label>
                        </div>
                        <div class="form-group col-md-6">
                             <input type="date" class="form-control" name="d_act" id="d_act" required max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                        </div>
                        <div class="form-group col-md-1">
                             à
                        </div>
                        <div class="form-group col-md-5">
                             <input type="time" class="form-control" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">
                        </div>
                            <input type="hidden" name="id_type_compteur" value="<?=$idreunion;?>">
                            <input type="hidden" name="forme_compteur" value="<?=$type_page;?>">
                        

                        
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input onclick="refrechpage()" type="submit" id="valider4" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success" name="envoi" />
      
                    </div>
                <?php echo form_close() ; ?>
            </div>
        <!-- /.modal-content -->
        </div>
        <div id="voireattent2" >
              
              </div>
    <!-- /.modal-dialog -->
    </div>  
</div>

<div class="modal modal-default fade" id="modal-modifs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('Formulaire'); ?></h2>
                        <h4><?php echo get_phrase('update consomation'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                <?php 
                  $attributes = array("class" => "contactForm",
                                      "role" => "form",
                                      "name" => "");
                  echo form_open("", $attributes);
                ?>
                    <div class="box-body" id="updatef"> 
                        
                        
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input onclick="refrechpage()" type="submit" id="valider4" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success" name="envoi" />
      
                    </div>
                <?php echo form_close() ; ?>
            </div>
        <!-- /.modal-content -->
        </div>
        <div id="voireattent2" >
              
              </div>
    <!-- /.modal-dialog -->
    </div>  
</div>

<div class="modal modal-default fade" id="modal-supp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('Voulez-vous vraiment le supprimer?'); ?></h2>
                        <h4><?php echo get_phrase('Si oui entrer le code de validation et cliquer sur supprimer'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-danger">
                <?php 
                $attributes = array("class" => "contactForm",
                "role" => "form",
                "name" => "");
                echo form_open_multipart("", $attributes);
                ?>
                    <div class="box-body">                        
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Caisse">
                        <input type="hidden" name="verifcode" id="verifcode">
                        <input type="hidden" name="lienbase" id="lienbase">
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
    var base_url = "<?php echo base_url(''); ?>";

    $(document).ready(function() {
      $("#Menucompteur").addClass('active');
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
            'ajax': base_url + 'domino/fetchlistecompteur/'+<?=$idreunion;?>,
            'order': [],
            dom: 'Bfrtip',
                    buttons:[
                      'copy', 'csv', 'excel', 'pdf'
                    ]
        });
        
        $('#manageTable tfoot td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="<?php echo get_phrase('Recherche'); ?>" style="width:100%"/>' );
        
        
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
    function refrechpage(){
        $(document).ready(function() {
            $("#voireattent").addClass('overlay');
            document.getElementById('voireattent').innerHTML='<i class="fa fa-refresh fa-spin"></i>';
            
        });
    }

    function action_supp(p){
        document.getElementById('verifcode').value = p;
    } 

    function action_modif(p){
        $.ajax({
            url: base_url+'domino/verifidateIntervalconsomValue/',
            type: 'GET',
            dataType: 'json',
            data : {id : p},    
            success:function(response) {
                if (response == false) {
                   document.getElementById('updatef').innerHTML=response; 
                }else{
                   document.getElementById('updatef').innerHTML=response; 
                }
                
            }
        });
    }  
</script>
