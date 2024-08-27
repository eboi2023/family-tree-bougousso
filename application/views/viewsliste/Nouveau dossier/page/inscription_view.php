 

  <main id="main">
    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <br>
            <div class="section-header">

              <h2><?php echo get_phrase('Inscription'); ?></h2>
              <p><?php echo get_phrase('Enregistrer vous pour devenir un jour membre'); ?></p>
            </div>
            
            <div class="form">
              <div id="sendmessage"><?php echo get_phrase('Tout les informations sont obligatoire sauf les (facutatifs)'); ?></div>
              <div id="errormessage"></div>
              
              <?php 
                $attributes = array("class" => "contactForm",
                                    "id" => "",
                                    "role" => "form",
                                    "name" => "");
                echo form_open_multipart("", $attributes);
              ?>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <select name="civilite" class="form-control" id="civilite" placeholder="<?php echo get_phrase('civilite'); ?>" required >
                      <option value="1">Monsieur</option>
                      <option value="2">Madame</option>
                      <option value="3">Mondemoiell</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo get_phrase('Nom'); ?>" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="late_name" id="prenom" placeholder="<?php echo get_phrase('prenom'); ?>" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="date_naiss" class="form-label" style="margin-top: 0.5em;"> <?php echo get_phrase('Nee le'); ?>:</label>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="date" class="form-control" name="date_naiss" id="date_naiss" placeholder="<?php echo get_phrase('date de naissance'); ?>" max="<?=date("Y-m-d");?>" required />
                    <div class="validation"></div>
                  </div>
                  
                  <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="lieu_naiss" id="lieu_naiss" placeholder="<?php echo get_phrase('Lieu de naissance'); ?>" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <datalist id="nationalite">
                      <?php 
                          if($aff_nationalite){
                              foreach($aff_nationalite as $selectvalue){
                                ?>
                                <option ><?=  $nom_nt = $selectvalue->type_nationalite;?></option>
                        

                        <?php }} ?>
                    </datalist>
                    <input type="text"  list="nationalite" name="national" class="form-control" id="national" placeholder="<?php echo get_phrase('Nationalite'); ?>" required />
                    <div class="validation"></div>
                  </div>


                  <div class="form-group col-md-9">
                    <label>votre photo(facultatif)</label><input type="file" name="userfile" class="" id="photo" placeholder="votre photo si possible" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="session" id="session" value="session <?=date("Y");?>" disabled />
                    <div class="validation"></div>
                  </div>
                  
                  

                  <div class="form-group col-md-2">
                    <select name="santepere" class="form-control" id="santepere" required >
                      <option value="1">Vie</option>
                      <option value="2">Décédé</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" name="nom_pere" class="form-control" id="nom_pere" placeholder="Nom du père" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" name="prenom_pere" class="form-control" id="prenom_pere" placeholder="Prenom du père" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" name="num_mmbre_pere" class="form-control" id="num_mmbre_pere" placeholder="Nunéro memdre père(facultatif)"/>
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-2">
                    <select name="santemere" class="form-control" id="santemere" required >
                      <option value="1">Vie</option>
                      <option value="2">Décédé</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" name="nom_mere" class="form-control" id="nom_mere" placeholder="Nom du mère" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" name="prenom_mere" class="form-control" id="prenom_mere" placeholder="Prenom du mère" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" name="num_mmbre_mere" class="form-control" id="num_mmbre_mere" placeholder="Nunéro memdre mère(facultatif)"/>
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="phone" name="tel" class="form-control" id="tel" placeholder="Téléphone fixe(facultatif)"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="phone" class="form-control" name="cel" id="cel" placeholder="Cel (+22512345678)" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="phone" class="form-control" name="cel" id="cel" placeholder="Cel (facultatif)" required />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="Votre email (facultatif)" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="adrpo" id="adrpo" placeholder="Adresse postal (facultatif)"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4">
                    <select type="text" class="form-control" onchange="Listville()" onkeyup="Listville()" name="pays" id="pays" required >
                      <option>Pays de Résidence</option>
                       <?php 
                          if($aff_p){
                              foreach($aff_p as $selectvalue){
                                ?>
                                <option value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_pays = $selectvalue->nom_fr;?></option>
                        

                        <?php }} ?>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4" id="list_ville">
                    <select type="text" class="form-control" name="ville1" id="ville1" required disabled="" >
                      <option>ville de Résidence</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" id="autreville">
                    <input type="hidden" class="form-control" name="ville2" id="ville2" placeholder="Le nom de la ville"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-4" id='list_commune'>
                    <input type="text" class="form-control" name="commune1" id="commune1" placeholder="<?php echo get_phrase('Commune'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Prefecture'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Sous-prefecture'); ?>" required disabled="" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" id="autrecommune">
                    <input type="hidden" class="form-control" name="commune2" id="commune2" placeholder="La Commune" required disabled="" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" onkeyup="list_rue()" list="liste_quartier" name="quartier" id="quartier" placeholder="Quartier (facultatif)" />
                    <div class="validation"></div>
                    <datalist id="liste_quartier">
                      
                    </datalist>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" onkeyup="liste_type_residence()" list="liste_rue" name="rue" id="rue" placeholder="Rue (facultatif)" />
                    <div class="validation"></div>
                    <datalist id="liste_rue">
                      
                    </datalist>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" onkeyup="liste_niveau_residence()" list="liste_type_residence" name="type_residence" id="type_residence" placeholder="Le type de la Résidence (facultatif)" />
                    <div class="validation"></div>
                    <datalist id="liste_type_residence">
                      
                    </datalist>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" list="liste_niveau_residence" name="niveau_residence" id="niveau_residence" placeholder="Le niveau ou nom de la Résidence (facultatif)" />
                    <div class="validation"></div>
                    <datalist id="liste_niveau_residence">
                      
                    </datalist>
                  </div>
                  
                    
                  <div class="form-group col-md-3">
                    <select onclick ="newetude()" type="text" class="form-control" name="netude" id="netude" required >
                      <option>Niveau d'étude</option>
                       <?php 
                          if($aff_p){
                              foreach($aff_etude as $selectvalue){
                                ?>
                                <option value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_etude = $selectvalue->niveau;?></option>
                        

                        <?php }} ?>
                        <option value="0">Autre niveau d'étude</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="autrenetude" id="autrenetude" placeholder="autre niveau d'étude" style="font-variant: all-petite-caps;" disabled />
                    <div class="validation"></div>
                  </div>
                  <style type="text/css">
                    input[type=radio]{
                      width: 1.5em;
                      height: 1.2em;
                      
                    }
                  </style>
                  <div class="form-group col-md-6" onclick="newchangss()">
                    <input type="radio" name="forme" id="forme0" value="0" checked  ><label>Rien</label>
                    <input type="radio" name="forme" id="forme1" value="1" ><label>Ménagère</label>
                    <input type="radio" name="forme" id="forme2" value="2" ><label >Elève</label>
                    <input type="radio" name="forme" id="forme3" value="3" ><label >Etudiant</label>
                    <input type="radio" name="forme" id="forme4" value="4" ><label >Fonctionnaire</label>
                    <input type="radio" name="forme" id="forme5" value="5" ><label >Métier</label>
                  </div>
                  <div id="table_fonction" class="col-md-11 row">
                    
                  </div>
                  
                  <div class="form-group col-md-11">
                    <select onclick ="newdiplome()" type="text" class="form-control" name="ndiplome" id="ndiplome" required >
                      <option>Dernier diplôme</option>
                      <?php 
                          if($aff_dipl){
                              foreach($aff_dipl as $selectvalue){
                                ?>
                                <option value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_dipl = $selectvalue->diplome;?> (<?=  $en = $selectvalue->titre;?>)</option>
                        

                      <?php }} ?>
                      <option value="0">autre</option>
                    </select>
                    <div class="validation" ></div>
                  </div>
                  <div id="tabl_autre_diplome" class="form-group col-md-11 row"></div>
                  
                  
                  
                </div>
                
                <div class="text-center col-md-4" style="float: right;"><input type="submit" class="form-control" value="Enregistrer" >
                </div>
              <?php echo form_close(); ?>
        </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--==========================
      inscription Section
    ============================-->
    <section id="nscription" class="section-bg wow fadeInUp">

      <div class="container">

       
        

      </div>
    </section><!-- #contact -->


    <?php
      $pain1='<div class="form-group col-md-6"><select type="text" onclick="newfonction()" class="form-control" name="nfonction" id="nfonction" class="nfonction"><option>Fonction</option>'; if($aff_fonctionnaire){
          foreach($aff_fonctionnaire as $selectvalue){
            $pain1.='<option value="'.$selectvalue->id.'">'.$selectvalue->profession.'</option>';
          }
        }
        $pain1.='<option value="0">Autre Fonction</option></select><div class="validation"></div></div><div id="autre_f" class="col-md-6"></div>';
    ?>

    <?php
      $pain2='<div class="form-group col-md-6"><select type="text" onclick="newfonction()" class="form-control" name="nfonction" id="nfonction" class="nfonction" required><option>Métier</option>'; if($aff_metier){
          foreach($aff_metier as $selectvalue){
            $pain2.='<option value="'.$selectvalue->id.'">'.$selectvalue->profession.'</option>';
          }
        }
        $pain2.='<option value="0">autre Métier</option></select><div class="validation"></div></div><div id="autre_f" class="col-md-6"></div>';
    ?>

    <?php
      $pain3='<div class="form-group col-md-12"><input type="text" class="form-control" name="autrefonction" id="autrefonction" placeholder="autre" required/><div class="validation"></div></div>';
    ?>
    <?php
      $pain4='<div class="form-group col-md-5"><input type="text" class="form-control" name="autrediplome" id="diplome" placeholder="Diplôme obtenu" required/><div class="validation"></div></div><label>en</label><div class="form-group col-md-6"><input type="text" class="form-control" name="titre_diplome" id="titre_diplome" placeholder="Série ou titre de ce diplôme" required/><div class="validation"></div></div>';
    ?>

  <script type="text/javascript">
    var base_url = "<?php echo base_url(''); ?>";
    function newetude(){
      if (document.getElementById('netude').value==0) {
        document.getElementById('autrenetude').disabled=false;
        document.getElementById('autrenetude').required=true;
      }
      if (document.getElementById('netude').value!=0) {
        document.getElementById('autrenetude').required=false;
        document.getElementById('autrenetude').disabled=true;
      }
    }
    function newchangss(){
      var fvalue = document.querySelector('input[name=forme]:checked').value;
      
      if(fvalue==4 || fvalue==5) {
        if (fvalue==4) {
          document.getElementById('table_fonction').innerHTML='<?= $pain1;?>';
        }
        if (fvalue==5) {
          document.getElementById('table_fonction').innerHTML='<?= $pain2;?>';
        }
       
      }else{
        document.getElementById('table_fonction').innerHTML='';
      }
      
    }
    function newfonction(){
      if (document.getElementById('nfonction').value==0) {
        document.getElementById('autre_f').innerHTML='<?= $pain3;?>';
      }
      if (document.getElementById('nfonction').value!=0) {
        document.getElementById('autre_f').innerHTML='';
      }
    }
    function newdiplome(){
      if (document.getElementById('ndiplome').value==0) {
        document.getElementById('tabl_autre_diplome').innerHTML='<?= $pain4;?>';
      }
      if (document.getElementById('ndiplome').value!=0) {
        document.getElementById('tabl_autre_diplome').innerHTML='';
      }
    }
    function epouse(){
      if (document.getElementById('civilite').value==2) {
        document.getElementById('epouse_nom').innerHTML='<input type="text" name="name_epouse" class="form-control" id="name_epouse" placeholder="Nom de votre marie" required />';
        document.getElementById('epouse_prenom').innerHTML='<input type="text" class="form-control" name="late_name_epouse" id="prenom_epouse" placeholder="Prénom de votre marie" required />';
        document.getElementById('epouse_num').innerHTML='<input type="text" class="form-control" name="num_epouse" id="num_epouse" placeholder="Son numéro membre" required />';
      }else{
        document.getElementById('epouse_nom').innerHTML='';
        document.getElementById('epouse_prenom').innerHTML='';
        document.getElementById('epouse_num').innerHTML='';
      }
    }
    function Listville(){
      var select = document.getElementById("pays");
      var valeur = select.options[select.selectedIndex].value;
      
      if (valeur == "Pays de Résidence") {
        document.getElementById('list_ville').innerHTML='<select type="text" class="form-control" name="ville1" id="ville1" required disabled=""/><option>Ville de Résidence</option><option value="0">Autres</option></select><div class="validation"></div>';
        document.getElementById('list_commune').innerHTML='<select type="text" class="form-control" name="commune1" id="commune1" required disabled=""/><option>Commune de Résidence</option><option value="0">Autres</option></select><div class="validation"></div>';
        document.getElementById('liste_quartier').innerHTML='';
        document.getElementById('quartier').value='';
        document.getElementById('liste_rue').innerHTML='';
        document.getElementById('rue').value='';
        document.getElementById('liste_type_residence').innerHTML='';
        document.getElementById('type_residence').value='';
        document.getElementById('liste_niveau_residence').innerHTML='';
        document.getElementById('niveau_residence').value='';
      }else{
        document.getElementById('ville1').disabled=false
        $.ajax({
          url: base_url+'localisation/fetchVillesValueByIdpays/'+valeur,
          type: 'GET',
          dataType: 'json',
          success:function(response) {
              document.getElementById('list_ville').innerHTML=response;
          }
        });
      }
      
    }
    function actionville(){
      var select = document.getElementById("ville1");
      var valeur = select.options[select.selectedIndex].value;
      if (valeur=='ville de Résidence') {
        $('#autreville').attr("class", "form-group");
        document.getElementById('autreville').innerHTML=" ";
        $('#list_commune').attr("class", "form-group col-md-4");
        document.getElementById('list_commune').innerHTML=' <input type="text" class="form-control" name="commune1" id="commune1" placeholder="La Commune" required disabled="" />';
        document.getElementById('commune1').disabled=true;
        $('#autrecommune').attr("class", "form-group");
        document.getElementById('autrecommune').innerHTML=" ";
        document.getElementById('liste_quartier').innerHTML='';
        document.getElementById('quartier').value='';
        document.getElementById('liste_rue').innerHTML='';
        document.getElementById('rue').value='';
        document.getElementById('liste_type_residence').innerHTML='';
        document.getElementById('type_residence').value='';
        document.getElementById('liste_niveau_residence').innerHTML='';
        document.getElementById('niveau_residence').value='';
      }else{
        if (valeur==0) {
          $('#autreville').attr("class", "form-group col-md-4");
          document.getElementById('autreville').innerHTML='<input type="text" class="form-control" name="ville2" id="ville2" placeholder="Le nom de la ville"/>';
          $('#list_commune').attr("class", "form-group");
          document.getElementById('list_commune').innerHTML='';
          $('#autrecommune').attr("class", "form-group col-md-6");
          document.getElementById('autrecommune').innerHTML='<input type="text" onkeyup="autrecommune()" class="form-control" name="commune2" id="commune2" placeholder="Le nom de la commune"/>';
        }else{
          $.ajax({
            url: base_url+'localisation/fetchCommunesValueByIdville/'+valeur,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                $('#list_commune').attr("class", "form-group col-md-4");
                document.getElementById('list_commune').innerHTML=response;
                $('#autreville').attr("class", "form-group");
                document.getElementById('autreville').innerHTML=" ";
                $('#autrecommune').attr("class", "form-group");
                document.getElementById('autrecommune').innerHTML=" ";
            }
          });
        }
      }
    }

    function actioncommune(){
      var select = document.getElementById("commune1");
      var valeur = select.options[select.selectedIndex].value;
      if (valeur=='Commune de Résidence') {
        $('#autrecommune').attr("class", "form-group");
        document.getElementById('autrecommune').innerHTML=" ";
        document.getElementById('liste_quartier').innerHTML='';
        document.getElementById('quartier').value='';
        document.getElementById('liste_rue').innerHTML='';
        document.getElementById('rue').value='';
        document.getElementById('liste_type_residence').innerHTML='';
        document.getElementById('type_residence').value='';
        document.getElementById('liste_niveau_residence').innerHTML='';
        document.getElementById('niveau_residence').value='';
      }else{
        if (valeur==0) {
          $('#autrecommune').attr("class", "form-group col-md-6");
          document.getElementById('autrecommune').innerHTML='<input type="text" onkeyup="actionquartier()" class="form-control" name="commune2" id="commune2" placeholder="Le nom de la commune"/>';
        }else{
          $.ajax({
            url: base_url+'localisation/fetchquartierValueByIdCommune/'+valeur,
            type: 'GET',
            dataType: 'json',
            success:function(response) {
                document.getElementById('liste_quartier').innerHTML='';
                document.getElementById('quartier').value='';
                document.getElementById('liste_quartier').innerHTML=response;
                $('#autrecommune').attr("class", "form-group");
                document.getElementById('autrecommune').innerHTML=" ";
                document.getElementById('liste_rue').innerHTML='';
                document.getElementById('rue').value='';
                document.getElementById('liste_type_residence').innerHTML='';
                document.getElementById('type_residence').value='';
                document.getElementById('liste_niveau_residence').innerHTML='';
                document.getElementById('niveau_residence').value='';
            }
          });
          
        }
      }
    }
    function list_rue(){
      var select = document.getElementById("commune1");
      var valeur1 = select.options[select.selectedIndex].value;
      var valeur2 = document.getElementById("quartier").value;
      $.ajax({
        url: base_url+'localisation/fetchquartierValueByIdCommune2/'+valeur1+'nbsp'+valeur2,
        type: 'GET',
        dataType: 'json',
        success:function(response) {
            document.getElementById('liste_rue').innerHTML='';
            document.getElementById('rue').value='';
            document.getElementById('liste_rue').innerHTML=response;
            $('#autrecommune').attr("class", "form-group");
            document.getElementById('autrecommune').innerHTML=" ";
            /*document.getElementById('liste_rue').innerHTML='';
            document.getElementById('rue').value='';*/
            document.getElementById('liste_type_residence').innerHTML='';
            document.getElementById('type_residence').value='';
            document.getElementById('liste_niveau_residence').innerHTML='';
            document.getElementById('niveau_residence').value='';
        }
      });
    }

    function liste_type_residence(){
      var select = document.getElementById("commune1");
      var valeur1 = select.options[select.selectedIndex].value;
      var valeur2 = document.getElementById("quartier").value;
      var valeur3 = document.getElementById("rue").value;
      $.ajax({
        url: base_url+'localisation/fetchquartierValueByIdCommune3/'+valeur1+'nbsp'+valeur2+'nbsp'+valeur3,
        type: 'GET',
        dataType: 'json',
        success:function(response) {
            document.getElementById('liste_type_residence').innerHTML='';
            document.getElementById('type_residence').value='';
            document.getElementById('liste_type_residence').innerHTML=response;
            $('#autrecommune').attr("class", "form-group");
            document.getElementById('autrecommune').innerHTML=" ";
            /*document.getElementById('liste_rue').innerHTML='';
            document.getElementById('rue').value='';
            document.getElementById('liste_type_residence').innerHTML='';
            document.getElementById('type_residence').value='';*/
            document.getElementById('liste_niveau_residence').innerHTML='';
            document.getElementById('niveau_residence').value='';
        }
      });
    }

    function liste_niveau_residence(){
      var select = document.getElementById("commune1");
      var valeur1 = select.options[select.selectedIndex].value;
      var valeur2 = document.getElementById("quartier").value;
      var valeur3 = document.getElementById("rue").value;
      var valeur4 = document.getElementById("type_residence").value;
      $.ajax({
        url: base_url+'localisation/fetchquartierValueByIdCommune4/'+valeur1+'nbsp'+valeur2+'nbsp'+valeur3+'nbsp'+valeur4,
        type: 'GET',
        dataType: 'json',
        success:function(response) {
            document.getElementById('liste_niveau_residence').innerHTML='';
            document.getElementById('niveau_residence').value='';
            document.getElementById('liste_niveau_residence').innerHTML=response;
            $('#autrecommune').attr("class", "form-group");
            document.getElementById('autrecommune').innerHTML=" ";
            /*document.getElementById('liste_rue').innerHTML='';
            document.getElementById('rue').value='';
            document.getElementById('liste_type_residence').innerHTML='';
            document.getElementById('type_residence').value='';
            document.getElementById('liste_niveau_residence').innerHTML='';
            document.getElementById('niveau_residence').value='';*/
        }
      });
    }
  </script>
</main>



  
