<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?php echo get_phrase($titre); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li><a href="./Dashboard"><?= $icon; ?> &nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
        <li class="active"><?= $icon; ?> &nbsp;<?= get_phrase($lien); ?></li>
      </ol>
    </section>
    <?php echo form_open_multipart('') ; ?>
        <section class="content">
            <div class="row">
                <div class="col-md-12" id="modifreport">
                    <div class="box box-info">
                      <div class="box-header">
                        <input type="submit" id="valider1" value="<?php echo get_phrase('updated'); ?>" class="btn btn-success" name="envoi" onclick="recharge()" />
                        <h3 class="box-title">
                          <small></small>
                        </h3>
                        
                    </div>
                    <div id='refrech'>
                      
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group col-xs-9">
                            <label for=""><?php echo get_phrase('titre'); ?></label>
                            <input type="text" class="form-control" name="titre" id="titre_transmiserapport" placeholder="<?php echo get_phrase('Le titre du rapport'); ?>" required>
                        </div>
                        <div class="form-group col-xs-3">
                            <label for=""><?php echo get_phrase('Date du rapport'); ?></label>
                            <input type="date" class="form-control" name="date_titre" value="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" id="date_transmiserapport" placeholder="<?php echo get_phrase('Le titre du rapport'); ?>" max="<?php echo date('Y').'-'.date('m').'-'.date('d'); ?>" required>
                        </div>
                        <div class="form-group col-xs-12">
                            <textarea id="editor1" class="form-control summernote" name="editor1" rows="10" cols="80" ><p>voire</p></textarea>
                        </div>
                        <div class="form-group col-xs-12 text-center">
                            <label for="" class=""><?php echo get_phrase('all tihe files in PDF'); ?></label>
                        </div>
                        <div class="form-group col-xs-12">
                            
                            <div id="form" class="formpos" for="fileToUpload">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> <?php echo get_phrase('Attachment'); ?>
                                <!--    Select the pdf to upload:-->
                                    <input type="file" name="fileToUpload[]" id="fileToUpload" accept="application/pdf" multiple>
                                </div>
                                <div>
                                    <p for="fileToUpload" id="drag"><?php echo get_phrase('Drop your files here or click to select them'); ?></p>
                                </div>
  
                            </div>
                            <h1 style="width: 500px!important;margin:20px auto 0px!important;font-size:24px!important;"><?php echo get_phrase('File list'); ?>:</h1>
                            <div id="filelist" style="width: 500px!important;margin:10px auto 0px!important;"><?php echo get_phrase('Nothing selected yet'); ?></div>
                            
                        </div>
                        <div class="form-group">
                          <label for="code_confirm"><?php echo get_phrase('Code saved'); ?></label>
                          <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="verifcationcode" title="pour la verification de votre identité" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                          </div>
                          <input type="hidden" name="codeverifinconf" value="Rapport">
                        </div>
                        <input type="submit" id="valider2" value="<?php echo get_phrase('updated'); ?>" class="btn btn-success" name="envoi" onclick="recharge()" />
                      </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>  
        <script type="text/javascript">
          // some global variables
          var clon = {};  // will be my FileList clone
          var removedkeys = 0; // removed keys counter for later processing the request
          var NextId = 0; // counter to add entries to the clone and not replace existing ones

          jQuery(document).ready(function(){
            jQuery("#form input").change(function () {

              // making the clone
              var curFiles = this.files;
              // temporary object clone before copying info to the clone
              var temparr = jQuery.extend(true, {}, curFiles);
              // delete unnecessary FileList keys that were cloned
              delete temparr["length"];
              delete temparr["item"];

              if (Object.keys(clon).length === 0){
                 jQuery.extend(true, clon, temparr);
              }else{
                var keysArr = Object.keys(clon);
                NextId = Math.max.apply(null, keysArr)+1; // FileList keys are numbers
                if (NextId < curFiles.length){ // a bug I found and had to solve for not replacing my temparr keys...
                  NextId = curFiles.length;
                }
                for (var key in temparr) { // I have to rename new entries for not overwriting existing keys in clon
                  if (temparr.hasOwnProperty(key)) {
                    temparr[NextId] = temparr[key];
                    delete temparr[key];
                    // meter aca los cambios de id en los html tags con el nuevo NextId
                    NextId++;
                  }
                } 
                jQuery.extend(true, clon, temparr); // copy new entries to clon
              }

              // modifying the html file list display

              if (NextId === 0){
                jQuery("#filelist").html("");
                for(var i=0; i<curFiles.length; i++) {
                  var f = curFiles[i];
                  jQuery("#filelist").append("<p id=\"file"+i+"\" style=\'margin-bottom: 3px!important;\'>" + f.name + "<a style=\"float:right;cursor:pointer;\" onclick=\"BorrarFile("+i+")\"><i class=\"fa fa-trash\"></i></a></p>"); // the function BorrarFile will handle file deletion from the clone by file id
                }
              }else{
                for(var i=0; i<curFiles.length; i++) {
                  var f = curFiles[i];
                  jQuery("#filelist").append("<p id=\"file"+(i+NextId-curFiles.length)+"\" style=\'margin-bottom: 3px!important;\'>" + f.name + "<a style=\"float:right;cursor:pointer;\" onclick=\"BorrarFile("+(i+NextId-curFiles.length)+")\"><i class=\"fa fa-trash\"></i></a></p>"); // yeap, i+NextId-curFiles.length actually gets it right
                }        
              }
              // update the total files count wherever you want
              jQuery("#form p").text(Object.keys(clon).length + " <?php echo get_phrase('file(s) selected'); ?>");
            });
          });

          function BorrarFile(id){ // handling file deletion from clone
            jQuery("#file"+id).remove(); // remove the html filelist element
            delete clon[id]; // delete the entry
            removedkeys++; // add to removed keys counter
            if (Object.keys(clon).length === 0){
              jQuery("#form p").text(Object.keys(clon).length + " <?php echo get_phrase('file(s) selected'); ?>");
              jQuery("#fileToUpload").val(""); // I had to reset the form file input for my form check function before submission. Else it would send even though my clone was empty
            }else{
              jQuery("#form p").text(Object.keys(clon).length + " <?php echo get_phrase('file(s) selected'); ?>");
            }
          }
          // now my form check function

          function check(){
            if( document.getElementById("fileToUpload").files.length == 0 ){
              alert("<?php echo get_phrase('No file selected'); ?>");
              return false;
            }else{
              var _validFileExtensions = [".pdf", ".PDF"]; // I wanted pdf files
              // retrieve input files
              var arrInputs = clon;

              // validating files
              for (var i = 0; i < Object.keys(arrInputs).length+removedkeys; i++) {
                if (typeof arrInputs[i]!="undefined"){
                  var oInput = arrInputs[i];
                  if (oInput.type == "application/pdf") {
                    var sFileName = oInput.name;
                    if (sFileName.length > 0) {
                      var blnValid = false;
                      for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                        }
                      }
                      if (!blnValid) {
                        alert("Sorry, " + sFileName + " <?php echo get_phrase('is invalid, allowed extensions are'); ?>: " + _validFileExtensions.join(", "));
                        return false;
                      }
                    }
                  }else{
                    alert("Sorry, " + arrInputs[0].name + " <?php echo get_phrase('is invalid, allowed extensions are'); ?>: " + _validFileExtensions.join(" or "));
                    return false;
                  }
                }
              }

              // proceed with the data appending and submission
              // here some hidden input values i had previously set. Now retrieving them for submission. My form wasn't actually even a form...
              var fecha = jQuery("#fecha").val();
              var vendor = jQuery("#vendor").val();
              var sku = jQuery("#sku").val();
              // create the formdata object
              var formData = new FormData();
              formData.append("fecha", fecha);
              formData.append("vendor", encodeURI(vendor));
              formData.append("sku", sku);
              // now appending the clone file data (finally!)
              var fila = clon; // i just did this because I had already written the following using the "fila" object, so I copy my clone again
              // the interesting part. As entries in my clone object aren't consecutive numbers I cannot iterate normally, so I came up with the following idea
              for (i = 0; i < Object.keys(fila).length+removedkeys; i++) { 
                if(typeof fila[i]!="undefined"){
                    formData.append("fileToUpload[]", fila[i]); // VERY IMPORTANT the formdata key for the files HAS to be an array. It will be later retrieved as $_FILES['fileToUpload']['temp_name'][i]
                }
              }
              jQuery("#submitbtn").fadeOut("slow"); // remove the upload btn so it can't be used again
              jQuery("#drag").html(""); // clearing the output message element
              // start the request
              var xhttp = new XMLHttpRequest();
              xhttp.addEventListener("progress", function(e) {
                var done = e.position || e.loaded, total = e.totalSize || e.total;
              }, false);
              if ( xhttp.upload ) {
                xhttp.upload.onprogress = function(e) {
                  var done = e.position || e.loaded, total = e.totalSize || e.total;
                  var percent = done / total;
                  jQuery("#drag").html(Math.round(percent * 100) + "%");
                };
              }
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var respuesta = this.responseText;
                  jQuery("#drag").html(respuesta);
                }
              };
              xhttp.open("POST", "your_upload_handler.php", true);  
              xhttp.send(formData);
              return true;
            }
          };

        </script>
    <?php echo form_close() ; ?>
     
</div>
  
<!-- include summernote -->
<link rel="stylesheet" href="<?php echo site_url('assets/');?>css/summernote/summernote.css">
      <!-- summernote JS
============================================ -->
<script src="<?php echo site_url('assets/');?>js/summernote/summernote.min.js"></script>
<script src="<?php echo site_url('assets/');?>js/summernote/summernote-active.js"></script>
<script type="text/javascript">
    var manageTable;
    var base_url = "<?php echo base_url(''); ?>";
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
            'autoWidth'   : false,
            'ajax': base_url + 'Rapport/fetchRapportData',
            'order': []
        });
        $("#Menulistrapport").addClass('active');
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });

    });
    function maxcaractere(){
        var compte=document.getElementById('resume').value;
        aff=250-compte.replace(/ /g,'').length;
        if (aff <= 0) {
            $('#resume').attr("maxlength", "250");
        }else{
            $('#resume').attr("maxlength", "");
        }
        document.getElementById('nonte').innerHTML=aff+'car';
    }
    /*function recharge(){
        $('#refrech').attr("class", "overlay");
        $('#refrech').html('<i class="fa fa-refresh fa-spin"></i>');
    }*/
    function modif_supp(m){
      document.getElementById('verifcode').value=m;
    }

    function modif_mouv(pp){
      $.ajax({
        url: base_url+'Rapport/fechinsertreport/'+pp,
        type: 'GET',
        dataType: 'json',
        success:function(response) {
          document.getElementById('modifreport').innerHTML=response;
        }
      });
    }
    
</script>
