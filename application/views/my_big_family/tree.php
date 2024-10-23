

  
    <!-- Main content -->
    <div class="content">
      <div id="tree" class="container col-lg-12">
        
            <div />
            
              
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
                

                let family = new ProduiTkss("#tree", {
                    // options
                    
                    nodeBinding: {
                        field_0: "name",
                        field_1: "datenee",
                        field_2: "village",
                        img_0: 'photo'
                    },
                   
                    nodes: [
                        <?php $pers_info = $this->Personne_model->Aff_personne1(); ?>
                        <?php foreach($pers_info as $key){
                           echo "
                           {
                                id: ".$key->id.",
                                pids: ".$key->pids.",
                                mid: ".$key->mid.",
                                fid: ".$key->fid.",
                                name: '".$key->name." ".$key->first_name."',
                                datenee: '".$key->datenee."',
                                village: '".$key->village."',
                                gender: '".$key->gender."',
                                photo: '".base_url('uploads/membres/')."".$key->photo."'
                            },
                           "; 
                        } ?>  

                    ]
                });

              </script>

  