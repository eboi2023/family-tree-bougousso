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
            <div class="pull-left col-xs-12">
                
                  <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-success" >
                      &nbsp;<?php echo get_phrase('Nouveau compteur'); ?>
                  </button>
            </div>
            <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                   <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="2%">
                                    <?php echo get_phrase('N'); ?>
                                </th>
                                <th width="10%">
                                    <?php echo get_phrase('forme'); ?>
                                </th>
                                <th width="45%">
                                    <?php echo get_phrase('Name'); ?>
                                </th>
                                <th width="23%">
                                    <?php echo get_phrase('identification'); ?>
                                </th>
                                <th width="10%">
                                    <?php echo get_phrase('consomation initial'); ?>
                                </th>
                                <th width="10%">
                                    <?php echo get_phrase('Action'); ?>
                                </th>
                            </tr>
                        </thead>
                      
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="2%"><?php echo get_phrase('N'); ?></th>
                                <th width="2%"><?php echo get_phrase('forme'); ?></th>
                                <th width="45%"><?php echo get_phrase('name'); ?></th>
                                <th width="33%"><?php echo get_phrase('identification'); ?></th>
                                <th width="10%"><?php echo get_phrase('consomation initial'); ?></th>
                                <th width="10%"><?php echo get_phrase('Action'); ?></th>
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
                        <h4><?php echo get_phrase('Nouveau type compteur'); ?></h4>
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
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="lieu_reuion" id="lieu_reuion" placeholder="<?php echo get_phrase('nomme le compteur a numerote'); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="code_presence" id="code_presence" placeholder="<?php echo get_phrase('identifient du compteur'); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <select onchange="choixenergi()" class="form-control" name="point" id="point" placeholder="<?php echo get_phrase('le type de compteur'); ?>" required>
                                <option value=''><?php echo get_phrase('selected type compteur'); ?></option>
                                <option value='0'><?php echo get_phrase('not rechargable'); ?></option>
                                <option value='1'><?php echo get_phrase('rechargable'); ?></option>
                            </select>
                        </div>

                        <div id="choix_energi">
                        </div>
                        
                        <div class="form-group col-md-12">
                             <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Caisse">
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider4" value="<?php echo get_phrase('Enregistrer'); ?>" class="btn btn-success" name="envoi" />
      
                    </div>
                <?php echo form_close() ; ?>
            </div>
        <!-- /.modal-content -->
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

<div class="modal modal-default fade" id="modal-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('view page liste consomation type compteur'); ?></h2>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-default">
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
                        <input type="hidden" name="verifcode" id="verifcode3">

                    </div>
                    <div class="modal-footer box box-default">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider6" value="<?php echo get_phrase('view'); ?>" class="btn btn-default" name="envoi" />
              
                    </div>
                <?php echo form_close() ; ?>
            </div>
        <!-- /.modal-content -->
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
                        <h4><?php echo get_phrase('Modification type compteur'); ?></h4>
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
                        
                        
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="lieu_reuion" id="lieu_reuionupdate" placeholder="<?php echo get_phrase('nomme le compteur a numerote'); ?>" required>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="code_presence" id="code_presenceupdate" placeholder="<?php echo get_phrase('identifient du compteur'); ?>" required>
                        </div>

                        <div class="form-group col-md-12" id='definitype'>
                            
                        </div>

                        <div id="choix_energiupdate">
                        </div>

                        <div class="form-group col-md-12">
                             <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Caisse">
                        <input type="hidden" name="verifcode" id="verifcode1">
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider5" value="<?php echo get_phrase('updated'); ?>" class="btn btn-success" name="envoi" />
      
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
            'ajax': base_url + 'domino/fetchpointlisteData',
            'order': []
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
    
    function action_supp(p){
    document.getElementById('verifcode').value = p;
  }

   function action_view(p){
    document.getElementById('verifcode3').value = p;
  }
  function action_modif(p){
    $.ajax({
        url: base_url+'domino/fechrecepreuion/'+p,
        type: 'GET',
        dataType: 'json',
        success:function(response) {
            $.each(response, function(index, values) {
                var numero = values.num;
                var lieu_reuion = values.type_de_compteur;
                document.getElementById('verifcode1').value = p;
                document.getElementById('lieu_reuionupdate').value = numero;
                document.getElementById('code_presenceupdate').value = lieu_reuion;
                var f='<select onchange="choixenergi2()" class="form-control" name="point" id="point2" placeholder="<?php echo get_phrase('le type de compteur'); ?>" required><option value=""><?php echo get_phrase('selected type compteur'); ?></option><option value="0"';
                if(values.type_recharge == 0){ f=f+'selected';}
                f=f+'><?php echo get_phrase('not rechargable'); ?></option><option value="1"';
                if(values.type_recharge == 1){ f=f+'selected';}  
                f=f+'><?php echo get_phrase('rechargable'); ?></option></select>';
                document.getElementById('definitype').innerHTML = f;
                if (values.type_recharge == 0) {
                    f='<div class="form-group col-md-12">'
                        +'<input type="number" class="form-control" name="intialnum" title="<?php echo get_phrase('consomation initial'); ?>" value="'+ values.initial +'" required>'
                    +'</div>';
                }
                if (values.type_recharge == 1) {
                    f='<div class="form-group col-md-6">'
                        +'<input type="number" class="form-control" name="intialnum1" title="<?php echo get_phrase('consomation initial'); ?>" value="'+ values.initial +'" required>'
                    +'</div>'
                    +'<div class="form-group col-md-1" style="margin-top: 1em;">,</div>'
                    +'<div class="form-group col-md-5">'
                        +'<input type="number" class="form-control" name="intialnum2" title="<?php echo get_phrase('consomation initial'); ?>" value="'+ values.vigule_initial +'" required>'
                    +'</div>';
                }
                document.getElementById('choix_energiupdate').innerHTML = f;
            }); 
        }
    });
  }

function choixenergi(){
    var select = document.getElementById("point");
    var valeur = select.options[select.selectedIndex].value;
    var f='';
    if (valeur == '') {
        f='';
    }
    if (valeur == 0) {
        f='<div class="form-group col-md-12">'
            +'<input type="number" class="form-control" name="intialnum" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>';
    }
    if (valeur == 1) {
        f='<div class="form-group col-md-6">'
            +'<input type="number" class="form-control" name="intialnum1" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>'
        +'<div class="form-group col-md-1" style="margin-top: 1em;">,</div>'
        +'<div class="form-group col-md-5">'
            +'<input type="number" class="form-control" name="intialnum2" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>';
    }
    document.getElementById('choix_energi').innerHTML = f;
}
function choixenergi2(){
    var select = document.getElementById("point2");
    var valeur = select.options[select.selectedIndex].value;
    var f='';
    if (valeur == '') {
        f='';
    }
    if (valeur == 0) {
        f='<div class="form-group col-md-12">'
            +'<input type="number" class="form-control" name="intialnum" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>';
    }
    if (valeur == 1) {
        f='<div class="form-group col-md-6">'
            +'<input type="number" class="form-control" name="intialnum1" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>'
        +'<div class="form-group col-md-1" style="margin-top: 1em;">,</div>'
        +'<div class="form-group col-md-5">'
            +'<input type="number" class="form-control" name="intialnum2" title="<?php echo get_phrase('consomation initial'); ?>" required>'
        +'</div>';
    }
    document.getElementById('choix_energiupdate').innerHTML = f;
}
</script>

