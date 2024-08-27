<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
        <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?= get_phrase('caisse global'); ?></small>
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
                <?php if(in_array('viewCaisse', $this->permission)) {?>
                    <a class="btn btn-success" href="<?php echo site_url('caisses/Kiosque');?>"><?php echo get_phrase('action caisse Kiosque'); ?></a>
                    <a class="btn btn-success" href="<?php echo site_url('caisses/lavage');?>"><?php echo get_phrase('action caisse lavage'); ?></a>
                    <a class="btn btn-success" href="<?php echo site_url('caisses/gexterne');?>"><?php echo get_phrase('action caisse externe'); ?></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-date">
                        &nbsp;<?php echo get_phrase('interval de date'); ?>
                    </button>&nbsp;
                    <a class="btn btn-success" href="<?php echo site_url();?>caisses/refresh"><i class="fa fa-refresh" title="&nbsp;<?php echo get_phrase('restor'); ?>"></i></a>
                    
                <?php }?>
                <!-- <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-solde">
                    &nbsp;<?php echo get_phrase('solde Gobal caisse'); ?>
                </button> -->
            </div>
            <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th width="5%">
                                    <center><?php echo get_phrase('N'); ?></center>
                                </th>
                                <th width="20%">
                                    <center><?php echo get_phrase('Mouvement'); ?></center>
                                </th>
                                <th width="15%">
                                    <center><?php echo get_phrase('designation'); ?></center>
                                </th>
                                <th width="25%">
                                    <center><?php echo get_phrase('Montant'); ?></center>
                                </th>
                                <th width="20%">
                                    <center><?php echo get_phrase('Realiser le'); ?></center>
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
                                <td width="20%"><?php echo get_phrase('Mouvement'); ?></td>
                                <td width="15%"><?php echo get_phrase('designation'); ?></td>
                                <th width="25%"><center><?php echo get_phrase('Montant'); ?></center>
                                </th>
                                <th width="20%"><?php echo get_phrase('Realiser le'); ?></th>
                                
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
    <!--<style type="text/css">
        .pass{
            border: none;
            background: transparent;
        }
    </style>
    <section class="content">
        <div class="row">
            
            <div class="col-md-12 col-xs-12">
                
                <div class="col-md-6">
                    <div class="box box-warning collapsed-box" data-vivaldi-spatnav-clickable="1">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo get_phrase('Entrer en caisse'); ?>
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                           /.box-tools -->
                        </div>
                        <!-- /.box-header 
                        <div class="box-body" style="display: none;">
                            <h3 class="box-title"><?php echo$e_caisse;?></h3>
                        </div>
                          
                    </div>-->
                    <!-- /.box 
                </div>-->
                <!-- /.col -->
               <!-- <div class="col-md-6">
                    <div class="box box-warning collapsed-box" data-vivaldi-spatnav-clickable="1">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo get_phrase('Sortie de caisse'); ?></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                           /.box-tools 
                        </div>-->
                        <!-- /.box-header 
                        <div class="box-body" style="display: none;">
                            <h3 class="box-title"><?php echo$s_caisse;?></h3>
                        </div>
                          
                    </div>-->
                    <!-- /.box 
                </div>
                
            </div>-->
            
            <!-- /.row 
        </div>
    </section>-->
</div>

<!-- <div class="modal modal-default fade" id="modal-solde">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('SOLDE EN CAISSE AUJOURDHUI'); ?></h2>
                        
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-defaulte">
                
                    <div class="box-body">                        
                        <div class="form-group col-md-12">
                            <center><h2 class="box-title"><?php echo$total_caisse;?></h2></center>
                        </div>
                        


                    </div>
                    
            </div>
             /.modal-content -->
        </div>
        <!-- /.modal-dialog 
    </div>  
</div>-->
<div class="modal modal-default fade" id="modal-date">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('Formulaire'); ?></h2>
                        <h4><?php echo get_phrase('interval de date'); ?></h4>
                    </center>
                </h4>
            </div>
            <div class="modal-body box box-success">
                <?php echo form_open('') ; ?>
                    <div class="box-body">
                        
                        <div class="form-group col-md-6">
                             <input type="date" onchange="valeurinferieur1()" class="form-control" name="d_act1" id="d_act1" required max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="2019-01-01" value="2020-01-01">
                        </div>
                        <div class="form-group col-md-6">
                             <input type="date" onchange="valeurinferieur2()" class="form-control" name="d_act2" id="d_act2" required min="2019-01-01" max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                        </div>

                        <div class="form-group col-md-12">
                             <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        <input type="hidden" name="codeverifinconf" value="Caisse">
                    </div>
                    <div class="modal-footer box box-success">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider4" value="<?php echo get_phrase('begin'); ?>" class="btn btn-success" name="envoi" />
              
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
        $("#CaisseNav").addClass('active');
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
            dom: 'Bfrtip',
                    buttons:[
                      'copy', 'csv', 'excel', 'pdf'
                    ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'ajax': base_url + 'Caisses/fetchCaisseData',
            'order': []
            
        });
        $('#manageTable tfoot td').each( function () {
            var title = $(this).text();
            if (title=='<?php echo get_phrase('Realiser le'); ?>') {
              $(this).html( '<input type="date" placeholder=" Recherche" style="width:100%"/>' );

            }else{
                if (title=='<?php echo get_phrase('Mouvement'); ?>') {
                    $(this).html( '<input type="text" id="'+title+'" placeholder="<?php echo get_phrase('search'); ?>" list="mouv" /><datalist id="mouv"><option ><?php echo get_phrase('entrer en caisse'); ?></option><option ><?php echo get_phrase('sortie de caisse'); ?></option><option ><?php echo get_phrase('lavage'); ?></option><option><?php echo get_phrase('kiosque'); ?></option><option ><?php echo get_phrase('caisse externe'); ?></option></datalist>' );

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
    function valeurinferieur1(){
        var datedebut=document.getElementById('d_act1').value;
        var datefin=document.getElementById('d_act2').value;
        $.ajax({
            url: base_url+'Caisses/verifidateIntervalCaisseValue/',
            type: 'GET',
            dataType: 'json',
            data : {datedebut : datedebut,datefin : datefin},    
            success:function(response) {
                if (response == false) {
                   document.getElementById('d_act1').value=document.getElementById('d_act2').value; 
                }
                
            }
        });
    }
    function valeurinferieur2(){
        var datedebut=document.getElementById('d_act1').value;
        var datefin=document.getElementById('d_act2').value;
        $.ajax({
            url: base_url+'Caisses/verifidateIntervalCaisseValue/',
            type: 'GET',
            dataType: 'json',
            data : {datedebut : datedebut,datefin : datefin},    
            success:function(response) {
                if (response == false) {
                   document.getElementById('d_act2').value=document.getElementById('d_act1').value; 
                }
                
            }
        });
    }

    
</script>