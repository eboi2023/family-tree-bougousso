

  
    <!-- Main content -->
    <div class="content">
      <div id="tree" class="container col-lg-12">
        
            <div />

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
                          {
                                id: 1,
                                pids: [2,3],
                                mid: null,
                                fid: null,
                                name: "bamba novanly",
                                datenee: "12/03/1960",
                                village: "Bougousso",
                                gender: 'male',
                                photo: "<?php echo base_url('uploads/membres/avatar1.png');?>"
                            }, {
                                id: 2,
                                pids: [1],
                                mid: null,
                                fid: null,
                                name: "eboi mokoua",
                                datenee: "12/03/1960",
                                village: "Ghana",
                                gender: 'female',
                                photo: "<?php echo base_url('uploads/membres/avatar1.png');?>"
                            },  {
                                id: 3,
                                pids: [1],
                                mid: null,
                                fid: null,
                                name: "KONE AWA",
                                datenee: "12/03/1960",
                                village: "Bougousso",
                                gender: 'female',
                                photo: "<?php echo base_url('uploads/membres/avatar1.png');?>"
                            }


                    ]
                });

              </script>
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  