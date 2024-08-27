
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
    <br>
    <style type="text/css">
        .pass{
            border: none;
            background: transparent;
        }
    </style>
    <section class="content">
        <div class="row">
            <div class="col-md-5">
              <?php 
                $attributes = array("class" => "",
                                    "role" => "form",
                                    "id" => "",
                                    "name" => "");
                echo form_open_multipart("", $attributes);
              ?>
                <!-- Profile Image -->
                <div class="box box-primary" id="element_overlap">
                  <div class="box-body box-profile" >
                    <label class="col-sm-12 control-label"><?php echo get_phrase('color'); ?></label>
                    <div class="form-group col-md-12 col-xs-12">
                      <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control" id="colorpiker"  name="color" required>
                        <div class="input-group-addon" id="forcolorpiker">
                          <i></i>
                        </div>
                      </div>
                    </div>
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
                        
                    </div>
                    <label class="col-sm-12 control-label"><?php echo get_phrase('title'); ?></label>
                    <div class="form-group col-md-12 col-xs-12">
                      <input type="text" id="add-new-event" name="title" class="form-control"title="<?php echo get_phrase('title to evenement'); ?>" required/>
                    </div>
                    <label class="col-sm-12 control-label"><?php echo get_phrase('url info'); ?></label>
                    <div class="form-group col-md-12 col-xs-12">
                      <input type="url" id="lien" name="lien" class="form-control" title="<?php echo get_phrase('lien information'); ?>" />
                    </div>

                    <label class="col-sm-12 control-label"><?php echo get_phrase('Date'); ?></label>
                    <div class="form-group col-md-12 col-xs-12">
                      <select onchange="datepack()" class="form-control" title="<?php echo get_phrase('votre choix'); ?>" name="typedate" id="typedate" required>
                        <option value="0" selected ><?php echo get_phrase('all day'); ?></option>
                        <option value="1" ><?php echo get_phrase('date preci'); ?></option>
                        <option value="2"><?php echo get_phrase('entre deux date'); ?></option>
                      </select>
                    </div>
                    <div class="form-group col-md-12 col-xs-12" id="date1">
                      <label class="col-sm-12 control-label"><?php echo get_phrase('all day to'); ?></label>
                      <div class="form-group col-md-7">
                        <input type="date" class="form-control" name="d_act" id="d_act" required value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">
                      </div>
                        
                      <div class="form-group col-md-5">
                        <input type="time" class="form-control" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-xs-12" id="date2">
                      
                    </div>
                    <div class="form-group col-md-12">
                      <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                    </div>
                    <input type="hidden" name="codeverifinconf" value="Evenement">
                    <input type="hidden" name="verifcode" id="verifcode2">
                    <div class="form-group col-md-12 col-xs-12">
                        <input type="submit" id="valider2" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success pull-right" name="envoi" />
              
                    </div>
                  </div>
                      <!-- /.box-body -->
                </div>
                <!-- /.box -->
              <?php echo form_close() ; ?>
            </div>
            <!-- /.col -->
            <div class="col-lg-7 col-xs-12">
                <!-- small box -->
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                <!-- /.box-body -->
                </div>
            </div>
    </section>
     <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">
                                    <?php echo get_phrase('n'); ?>
                                </th>
                                
                                <th width="20%">
                                    <?php echo get_phrase('date begin'); ?>
                                </th>
                                <th width="20%">
                                    <?php echo get_phrase('date end'); ?>
                                </th>
                                <th width="30%">
                                    <?php echo get_phrase('evenement'); ?>
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
                                <th ><?php echo get_phrase('n'); ?></th>
                                <td><?php echo get_phrase('date begin'); ?></td>
                                <td><?php echo get_phrase('date end'); ?></td>
                                <td><?php echo get_phrase('evenement'); ?></td>
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
                            <!-- /.content -->
</div>
<div class="modal modal-default fade" id="modal-supp">
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
                <?php echo form_open('') ; ?>
                    <div class="box-body">                        
                        <div class="form-group col-md-12">
                      <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                    </div>
                    <input type="hidden" name="codeverifinconf" value="Evenement">
                        <input type="hidden" name="verifcode" id="verifcode1" >


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
<div class="modal modal-default fade" id="modal-sms">
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
                        <div class="form-group  col-md-12 col-xs-12" id="num_personne">
                            
                        </div> 
                        <div class="form-group col-md-12">
                            <textarea class="form-control" id="edite" name="editesms" maxlength="160">
                                
                            </textarea>
                        </div>                     
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="verifcationcode" title="<?php echo get_phrase('pour la verification de votre identite'); ?>" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                        </div>
                        
                        <input type="hidden" name="codeverifinconf" value="Evenement">
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



<!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>  
<script type="text/javascript">
  var manageTable;
    var base_url = "<?php echo base_url(''); ?>";
    $("#Menulistevement").addClass('active');
    $(document).ready(function() {
        $('.select2').select2({
          theme: 'classic'
        });
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
            'ajax': base_url + 'Evenement/fetchcalendrierData',
            'order': []
        });
        
        $('#manageTable tfoot td').each( function () {
          var title = $(this).text();
          if (title=='<?php echo get_phrase('date begin'); ?>' || title=='<?php echo get_phrase('date end'); ?>') {
              $(this).html( '<input type="date" placeholder=" Recherche" style="width:100%"/>' );
            }else{
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
    document.getElementById('verifcode1').value = p;
  }
  function datepack2(valeur,date01=null,date02=null){

        if (valeur=="0") {
          $.ajax({
            url: base_url+'Evenement/convertdate/'+date01,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
              var recupdate1=response;
              $.ajax({
                url: base_url+'Evenement/convertheure/'+date01,
                type: 'GET',
                dataType: 'json',
                success:function(response) {
                  document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('All day to'); ?></label>'+
                  '<div class="form-group col-md-7">'+
                    '<input type="date" class="form-control" name="d_act" id="d_act" required value="'+recupdate1+'" >'+
                  '</div>'+
                    
                  '<div class="form-group col-md-5">'+
                    '<input type="time" class="form-control" name="h_act" id="h_act"  required value="'+response+'"/>'+
                  '</div>';
                  document.getElementById('date2').innerHTML="";
                }
              });
            }
          });
        }
        if (valeur=="1") {
          $.ajax({
            url: base_url+'Evenement/convertdate/'+date01,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
              var recupdate1=response;
              $.ajax({
                url: base_url+'Evenement/convertheure/'+date01,
                type: 'GET',
                dataType: 'json',
                success:function(response) {
                  document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date preci'); ?></label>'+
                  '<div class="form-group col-md-7">'+
                    '<input type="date" class="form-control" name="d_act" id="d_act" required value="'+recupdate1+'" >'+
                  '</div>'+
                    
                  '<div class="form-group col-md-5">'+
                    '<input type="time" class="form-control" name="h_act" id="h_act"  required value="'+response+'"/>'+
                  '</div>';
                  document.getElementById('date2').innerHTML="";
                }
              });
            }
          });
        }
        if (valeur=="2") {
          $.ajax({
            url: base_url+'Evenement/convertdate/'+date01,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
              var recupdate1=response;
              $.ajax({
                url: base_url+'Evenement/convertheure/'+date01,
                type: 'GET',
                dataType: 'json',
                success:function(response) {
                  var recupheure1=response;
                  $.ajax({
                    url: base_url+'Evenement/convertdate/'+date02,
                    type: 'GET',
                    dataType: 'json',
                    success:function(response) {
                      var recupdate2=response;
                      $.ajax({
                        url: base_url+'Evenement/convertheure/'+date02,
                        type: 'GET',
                        dataType: 'json',
                        success:function(response) {
                          document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date debut'); ?></label>'+
                          '<div class="form-group col-md-7">'+
                            '<input type="date" onchange="change1()" class="form-control" name="d_act1" id="d_act1" required value="'+recupdate1+'" >'+
                          '</div>'+
                            
                          '<div class="form-group col-md-5">'+
                            '<input type="time" class="form-control" name="h_act1" id="h_act1"  required value="'+recupheure1+'">'+
                          '</div>';
                          document.getElementById('date2').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date end'); ?></label>'+
                          '<div class="form-group col-md-7 col-xs-12">'+
                            '<input type="date" class="form-control" name="d_act2" id="d_act2" required value="'+recupdate2+'" >'+
                          '</div>'+
                            
                          '<div class="form-group col-md-5 col-xs-12">'+
                            '<input type="time" class="form-control" name="h_act2" id="h_act2"  required value="'+response+'">'+
                          '</div>';
                        }
                      });
                    }
                  });
                }
              });
            }
          });
        }
    }
    function modif_mouv(code){
        $.ajax({
            url: base_url+'Evenement/updateEvementById2/'+code,
            type: 'get',
            data: {},
            dataType: 'json',
            success:function(response) {
                $.each(response, function(index, values) {
                    var id=code;
                    var titres=values.titre;
                    var type_evenement=values.type_evenement;
                    var url_info=values.url_info;
                    var type_date=values.type_date;
                    var dates1=values.date_debut;
                    var dates2=values.date_fin;
                    var select_eve=values.select_eve;
                    var couleur = values.couleur;
                    
                        $.ajax({
                            url: base_url+'Evenement/convertdate/'+dates1,
                            type: 'GET',
                            dataType: 'json',
                            success:function(response) {
                                var recupdate1=response;
                                $.ajax({
                                    url: base_url+'Evenement/convertheure/'+dates1,
                                    type: 'GET',
                                    dataType: 'json',
                                    success:function(response) {
                                        document.getElementById("colorpiker").value = couleur;
                                        document.getElementById("forcolorpiker").innerHTML = '<i style="background-color:'+couleur+'"></i>';
                                        document.getElementById("add-new-event").value = titres;
                                        document.getElementById("lien").value = url_info;
                                        var doct1='';
                                        var doct2='';
                                        var doct3='';
                                        if (values.type_date==0) {
                                            doct1='selected';
                                            var pos=values.type_date;
                                            datepack2(pos,values.date_debut);
                                        }else{
                                            if (values.type_date==1) {
                                                doct2='selected';
                                                var pos=values.type_date;
                                                datepack2(pos,values.date_debut);
                                            }else{
                                                if (values.type_date==2) {
                                                    doct3='selected';
                                                    var pos=values.type_date;
                                                    datepack2(pos,values.date_debut,values.date_fin);
                                                }
                                            }
                                        }
                                        document.getElementById("typedate").innerHTML = '<option value="0" '+doct1+' ><?php echo get_phrase('all day'); ?></option>'+
                                        '<option value="1" '+doct2+' ><?php echo get_phrase('date preci'); ?></option>'+
                                        '<option value="2" '+doct3+' ><?php echo get_phrase('entre deux date'); ?></option>';
                                        var doct11='';
                                        var doct12='';
                                        var doct13='';
                                        var doct14='';
                                        if (type_evenement==0) {
                                            doct11='selected';
                                        }else{
                                            if (type_evenement==1) {
                                                doct12='selected';
                                            }else{
                                                if (type_evenement==2) {
                                                    doct13='selected';
                                                }else{
                                                    if (type_evenement==3) {
                                                            doct14='selected';
                                                    }
                                                }
                                            }
                                        }
                                        document.getElementById("typeevenement").innerHTML = '<option value="0" '+doct11+' ><?php echo get_phrase('all the members'); ?></option>'+
                                        '<option value="1" '+doct12+' ><?php echo get_phrase('all the memberships'); ?></option>'+
                                        '<option value="2" '+doct13+' ><?php echo get_phrase('all the personnal'); ?></option>'+
                                        '<option value="3" '+doct14+' ><?php echo get_phrase('selected'); ?></option>';
                                        document.getElementById("valider2").value = "<?php echo get_phrase('updated'); ?>";
                                        document.getElementById("verifcode2").value = code;

                                        document.getElementById("valider2").value = "<?php echo get_phrase('updated'); ?>";



                                        
                                        if (type_evenement==0) {
                                            document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>';
                                        }else{
                                            if (type_evenement==1) {
                                                document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the memberships'); ?></label>';
                                            }else{
                                               if (type_evenement==2) {
                                                    document.getElementById('selected_person').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the personnal'); ?></label>';
                                                }else{
                                                    if (type_evenement==3) {
                                                        $.ajax({
                                                            url: base_url+'Evenement/UpdateListPersMember/'+values.id,
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
                                });
                            }
                        });
                    
                   
                    
                    
                });
            }
        });
    }
    function envoie(p){
        $.ajax({
            url: base_url+'Evenement/updateEvementById2/'+p,
            type: 'get',
            data: {},
            dataType: 'json',
            success:function(response) {
                $.each(response, function(index, values) {
                    var id=p;
                    var titres=values.titre;
                    var type_evenement=values.type_evenement;
                    var type_date=values.type_date;
                    var dates1=values.date_debut;
                    var dates2=values.date_fin;
                    var select_eve=values.select_eve;
                    if (type_date==0) {
                        $.ajax({
                            url: base_url+'Evenement/convertdate/'+dates1,
                            type: 'GET',
                            dataType: 'json',
                            success:function(response) {
                                var recupdate1=response;
                                $.ajax({
                                    url: base_url+'Evenement/convertheure/'+dates1,
                                    type: 'GET',
                                    dataType: 'json',
                                    success:function(response) {
                                        document.getElementById('verifcode3').value = id;
                                        document.getElementById('edite').value = 
                                        values.titre+' \n Le '+recupdate1+' à '+response+' au '+recupdate1+' à 23:59';
                                        if (values.type_evenement==0) {
                                            document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>';
                                        }else{
                                            if (values.type_evenement==1) {
                                                document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the memberships'); ?></label>';
                                            }else{
                                               if (values.type_evenement==2) {
                                                    document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the personnal'); ?></label>';
                                                }else{
                                                    if (values.type_evenement==3) {
                                                        $.ajax({
                                                            url: base_url+'Evenement/listPersMember/'+values.id,
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            success:function(response) {
                                                                document.getElementById('num_personne').innerHTML = response;
                                                        
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
                                });
                            }
                        });
                    }else{
                        if (type_date==1) {
                             $.ajax({
                                url: base_url+'Evenement/convertdate/'+dates1,
                                type: 'GET',
                                dataType: 'json',
                                success:function(response) {
                                    var recupdate1=response;
                                    $.ajax({
                                        url: base_url+'Evenement/convertheure/'+dates1,
                                        type: 'GET',
                                        dataType: 'json',
                                        success:function(response) {
                                            document.getElementById('verifcode3').value = id;
                                            document.getElementById('edite').value = values.titre+' \n Le '+recupdate1+' à '+response;
                                            if (values.type_evenement==0) {
                                                document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>';
                                            }else{
                                                if (values.type_evenement==1) {
                                                    document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the memberships'); ?></label>';
                                                }else{
                                                   if (values.type_evenement==2) {
                                                        document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the personnal'); ?></label>';
                                                    }else{
                                                        if (values.type_evenement==3) {
                                                                $.ajax({
                                                                    url: base_url+'Evenement/listPersMember/'+values.id,
                                                                    type: 'GET',
                                                                    dataType: 'json',
                                                                    success:function(response) {
                                                                        document.getElementById('num_personne').innerHTML = response;
                                                                
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
                                    });
                                }
                            });
                        }else{
                            if (type_date==2) {
                                $.ajax({
                                    url: base_url+'Evenement/convertdate/'+dates1,
                                    type: 'GET',
                                    dataType: 'json',
                                    success:function(response) {
                                        var recupdate1=response;
                                        $.ajax({
                                            url: base_url+'Evenement/convertheure/'+dates1,
                                            type: 'GET',
                                            dataType: 'json',
                                            success:function(response) {
                                                var recupheure1=response;
                                                $.ajax({
                                                    url: base_url+'Evenement/convertdate/'+dates2,
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success:function(response) {
                                                        var recupdate2=response;
                                                        $.ajax({
                                                            url: base_url+'Evenement/convertheure/'+dates2,
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            success:function(response) {
                                                                var recupheure1=response;
                                                                document.getElementById('verifcode3').value = id;
                                                                document.getElementById('edite').value = values.titre+' \n Le '+recupdate1+' à '+recupheure1+' au '+recupdate2+' à '+response;
                                                                if (values.type_evenement==0) {
                                                                    document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the members'); ?></label>';
                                                                }else{
                                                                    if (values.type_evenement==1) {
                                                                        document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the memberships'); ?></label>';
                                                                    }else{
                                                                       if (values.type_evenement==2) {
                                                                            document.getElementById('num_personne').innerHTML = '<label class="form-control text-center btn btn-warning"><?php echo get_phrase('all the personnal'); ?></label>';
                                                                        }else{
                                                                            if (values.type_evenement==3) {
                                                                                    $.ajax({
                                                                                        url: base_url+'Evenement/listPersMember/'+values.id,
                                                                                        type: 'GET',
                                                                                        dataType: 'json',
                                                                                        success:function(response) {
                                                                                            document.getElementById('num_personne').innerHTML = response;
                                                                                    
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
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    }
                   
                    
                    
                });
            }
        });
    }
</script>   
<script>
   var base_url = "<?php echo base_url(''); ?>";
  
    $(function () {

       //color picker with addon
      $('.my-colorpicker2').colorpicker()

      /* initialize the external events
       -----------------------------------------------------------------*/
      function init_events(ele) {
        ele.each(function () {

          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          })

        })
      }

      init_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d    = date.getDate(),
          m    = date.getMonth(),
          y    = date.getFullYear()
      $('#calendar').fullCalendar({
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month,agendaWeek,agendaDay'
        },
        monthNames:["<?php echo get_phrase('January'); ?>","<?php echo get_phrase('February'); ?>","<?php echo get_phrase('March'); ?>","<?php echo get_phrase('April'); ?>","<?php echo get_phrase('May'); ?>","<?php echo get_phrase('June'); ?>","<?php echo get_phrase('July'); ?>","<?php echo get_phrase('August'); ?>","<?php echo get_phrase('September'); ?>","<?php echo get_phrase('October'); ?>","<?php echo get_phrase('November'); ?>","<?php echo get_phrase('December'); ?>"],
        monthNamesShort:["<?php echo get_phrase('Jan'); ?>","<?php echo get_phrase('Feb'); ?>","<?php echo get_phrase('Mar'); ?>","<?php echo get_phrase('Apr'); ?>","<?php echo get_phrase('May'); ?>","<?php echo get_phrase('Jun'); ?>","<?php echo get_phrase('Jul'); ?>","<?php echo get_phrase('Aug'); ?>","<?php echo get_phrase('Sep'); ?>","<?php echo get_phrase('Oct'); ?>","<?php echo get_phrase('Nov'); ?>","<?php echo get_phrase('Dec'); ?>"],
        dayNames:["<?php echo get_phrase('Sunday'); ?>","<?php echo get_phrase('Monday'); ?>","<?php echo get_phrase('Tuesday'); ?>","<?php echo get_phrase('Wednesday'); ?>","<?php echo get_phrase('Thursday'); ?>","<?php echo get_phrase('Friday'); ?>","<?php echo get_phrase('Saturday'); ?>"],
        dayNamesShort:["<?php echo get_phrase('Sun'); ?>","<?php echo get_phrase('Mon'); ?>","<?php echo get_phrase('Tue'); ?>","<?php echo get_phrase('Wed'); ?>","<?php echo get_phrase('Thu'); ?>","<?php echo get_phrase('Fri'); ?>","<?php echo get_phrase('Sat'); ?>"],
        dayNamesMin:["<?php echo get_phrase('Su'); ?>","<?php echo get_phrase('Mo'); ?>","<?php echo get_phrase('Tu'); ?>","<?php echo get_phrase('We'); ?>","<?php echo get_phrase('Th'); ?>","<?php echo get_phrase('Fr'); ?>","<?php echo get_phrase('Sa'); ?>"],
        buttonText: {
          today: '<?php echo get_phrase('today'); ?>',
          month: '<?php echo get_phrase('month'); ?>',
          week : '<?php echo get_phrase('week'); ?>',
          day  : '<?php echo get_phrase('day'); ?>'
        },
        longDateFormat:[{
          LT:"H:mm",
          LTS:"H:mm:ss",
          L:"DD.MM.YYYY.",
          LL:"D. MMMM YYYY.",
          LLL:"D. MM YYYY. H:mm",
          LLLL:"D. MMMM YYYY., dddd H:mm"}],
        //Random default events
        events    : [<?php echo $vue_evenement;?>
        ],
        editable  : false,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function (date, allDay) { // this function is called when something is dropped

          // retrieve the dropped element's stored Event Object
          var originalEventObject = $(this).data('eventObject')

          // we need to copy it, so that multiple events don't have a reference to the same object
          var copiedEventObject = $.extend({}, originalEventObject)

          // assign it the date that was reported
          copiedEventObject.start           = date
          copiedEventObject.allDay          = allDay
          copiedEventObject.backgroundColor = $(this).css('background-color')
          copiedEventObject.borderColor     = $(this).css('border-color')

          // render the event on the calendar
          // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
          $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove()
          }

        }
      })

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        //Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)

        //Add draggable funtionality
        init_events(event)

        //Remove event from text input
        $('#new-event').val('')
      })
    })
    function datepack(){
        var select = document.getElementById("typedate");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur=="0") {
            
            document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('All day to'); ?></label>'+
            '<div class="form-group col-md-7">'+
              '<input type="date" class="form-control" name="d_act" id="d_act" required value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">'+
            '</div>'+
              
            '<div class="form-group col-md-5">'+
              '<input type="time" class="form-control" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">'+
            '</div>';
            document.getElementById('date2').innerHTML="";
          
          
        }
        if (valeur=="1") {
          document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date preci'); ?></label>'+
                      '<div class="form-group col-md-7">'+
                        '<input type="date" class="form-control" name="d_act" id="d_act" required value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">'+
                      '</div>'+
                        
                      '<div class="form-group col-md-5">'+
                        '<input type="time" class="form-control" name="h_act" id="h_act"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">'+
                      '</div>';
          document.getElementById('date2').innerHTML="";
        }
        if (valeur=="2") {
          document.getElementById('date1').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date debut'); ?></label>'+
                      '<div class="form-group col-md-7">'+
                        '<input type="date" onchange="change1()" class="form-control" name="d_act1" id="d_act1" required value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">'+
                      '</div>'+
                        
                      '<div class="form-group col-md-5">'+
                        '<input type="time" class="form-control" name="h_act1" id="h_act1" value"" required >'+
                      '</div>';
          document.getElementById('date2').innerHTML='<label class="col-sm-12 control-label"><?php echo get_phrase('Date end'); ?></label>'+
                      '<div class="form-group col-md-7 col-xs-12">'+
                        '<input type="date" class="form-control" name="d_act2" id="d_act2" required value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" min="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>">'+
                      '</div>'+
                        
                      '<div class="form-group col-md-5 col-xs-12">'+
                        '<input type="time" class="form-control" name="h_act2" id="h_act2"  required value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>">'+
                      '</div>';
        }
    }
    function change1(){
      var date01=document.getElementById('d_act1').value;
      document.getElementById('d_act2').value=date01;
      document.getElementById('d_act2').min=date01;
      if (date01=="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>") {
         document.getElementById('h_act1').value="<?php if(date('G')>=10){echo date('G').':'.date('i');}else{echo '0'.date('G').':'.date('i');}  ?>";
      }else{
        document.getElementById('h_act1').value='00:00';
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

    function teste2020(){
        $.ajax({
            url: base_url+'Evenement/listPersMember',
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                return response;
            }
        });
    }

    function selection_num(parte=null){
        var donn='';
        if (parte) {
            donn+='<select class="form-control select2" multiple="multiple" name="num_personne[]" >';
            donn+='</select>';
            return donn; 
        }else{
            teste2020();
            return donn; 
            
        }
                             
    }
</script>


