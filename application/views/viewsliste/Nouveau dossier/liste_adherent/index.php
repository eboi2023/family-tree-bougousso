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
                <?php if (in_array('createMemberships', $this->permission)) {?>
                  <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-success" onclick="listenotadh()" >
                      &nbsp;<?php echo get_phrase('Nouveau Adherent'); ?>
                  </button>
                <?php }?>
            </div>
            <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="2%">
                                    <?php echo get_phrase('M'); ?>
                                </th>
                                <th width="2%">
                                    <?php echo get_phrase('membership'); ?>
                                </th>
                                <th width="46%">
                                    <?php echo get_phrase('Nom et Prenom'); ?>
                                </th>
                                <th width="25%">
                                    <?php echo get_phrase('Contact'); ?>
                                </th>
                                <th width="15%">
                                    <?php echo get_phrase('Email'); ?>
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
                                <td ><?php echo get_phrase('M'); ?></th>
                                <td><?php echo get_phrase('membership'); ?></th>
                                <td><?php echo get_phrase('Nom et Prenom'); ?></th>
                                <td><?php echo get_phrase('Contact'); ?></th>
                                <td><?php echo get_phrase('Email'); ?></th>
                                <th><?php echo get_phrase('Action'); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
    </section>
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
                        <input type="hidden" name="codeverifinconf" value="Membre">
                        <input type="hidden" name="verifcode" id="verifcode">

                    </div>
                    <div class="modal-footer box box-danger">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
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
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
      
            <div class="modal-body box box-success">
        
                <div class="box-body" id="cotenu"> 
                </div>
            
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
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
                        <h2 class="box-title">Formulaire</h2>
                        <h4>Nouveau Adhérent</h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                <?php 
                  $attributes = array("class" => "contactForm",
                                      "role" => "form",
                                      "name" => "");
                  echo form_open_multipart("", $attributes);
                ?>
                    <div class="box-body"> 
                        <div class="form-group col-md-12">
                            <input type='text' class='form-control' name='nom_indivi' placeholder='le numero membre' list="Num" required>
                            <datalist id="Num">
                            </datalist>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="vlauemail" id="vlauemail" class="form-control" onchange="verifmail()">
                                <option value="2">NON</option>
                                <option value="1">OUI</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="email" class="form-control" name="login_ad" id="login_ad" placeholder="Le mail de adhérent" disabled required="false">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password_ad" id="password_ad" required placeholder="Le mot de passe de l'adhérent" >
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="conf_password_ad" id="conf_password_ad" required placeholder="Confirmer le" >
                        </div>
                        <input type="hidden" min="0" class="form-control" name="montant" value="5000" required>
                        <div class="form-group">
                            <label for="">Effectué le</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control" name="d_act" id="d_act" required max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                        </div>
                        <div class="form-group col-md-1">
                           à
                        </div>
                        <div class="form-group col-md-5">
                           <input type="time" class="form-control" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">
                        </div>

                        <div class="form-group col-md-12">
                             <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Membre">
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Fermer</button>
                        <input type="submit" id="valider4" value="Enregistrer" class="btn btn-success" name="envoi" />
      
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
      $("#List_adherent").addClass('active');
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
            'ajax': base_url + 'Listes_Adhesion/fetchAdherentData',
            'order': [],
            dom: 'Bfrtip',
                    buttons:[
                      'copy', 'csv', 'excel', 'pdf'
                    ]
        });
        
        $('#manageTable tfoot td').each( function () {
        var title = $(this).text();
        if (title == "Fonction/métier") {
          $(this).html( '<input list="Niveau" type="text" placeholder="Recherche" /><datalist id="Niveau"><?php 
                          if($aff_prof){
                              foreach($aff_prof as $selectvalue){
                                ?>
                                <option ><?=  $profession = $selectvalue->profession;?></option><?php }} ?>
                    </datalist>' );
        }
        else{
          $(this).html( '<input type="text" placeholder=" Recherche" style="width:100%"/>' );
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
    
  function modif_supp(p){
    document.getElementById('verifcode').value = p;
  }
  function modif_view(code){
     $.ajax({
            url: base_url+'Listes_Adhesion/fetchadherentValueById/'+code,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('cotenu').innerHTML=response;
            }
        });
  }
  function listenotadh(){
     $.ajax({
            url: base_url+'Listes_Adhesion/fetchlistnotadhet',
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('Num').innerHTML=response;
            }
        });
  }

  function verifmail(){
    var select = document.getElementById("vlauemail");
    var valeur = select.options[select.selectedIndex].value;
    if (valeur==1) {
        document.getElementById('login_ad').disabled=false;
        document.getElementById('login_ad').required=true;
    }
    if (valeur==2) {
        document.getElementById('login_ad').disabled=true;
        document.getElementById('login_ad').required=false;
    }
  }
</script>