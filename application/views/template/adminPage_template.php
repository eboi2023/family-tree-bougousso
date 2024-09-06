

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php 
        if ($page_title== "") {
         
      ?>
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php } ?>
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="tree"/>

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
                              pids: [2],
                              name: "eboi mokoua",
                              datenee: "12/03/1960",
                              village: "Ghana",
                              gender: 'female',
                              photo: "img/test.png"
                          }, {
                              id: 2,
                              pids: [1,9],
                              name: "bamba novanly",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'male',
                              photo: "img/test.png"
                          },  {
                              id: 9,
                              pids: [2],
                              name: "KONE AWA",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'female',
                              photo: "img/test.png"
                          },  {
                              id: 10,
                              pids: [11],
                              name: "KONE aya",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'female',
                              photo: "img/test.png"
                          },  {
                              id: 11,
                              pids: [10],
                              name: "KONE SALIF",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'male',
                              photo: "img/test.png"
                          },  {
                              id: 12,
                              mid: 10,
                              fid: 11,
                              name: "bamba kassoum",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'male',
                              photo: "img/test.png"
                          },  {
                              id: 3,
                              pids: [4],
                              mid: 2,
                              fid: 1,
                              name: "bamba kassoum",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'male',
                              photo: "img/test.png"
                          },  {
                              id: 5,
                              mid: 2,
                              fid: 1,
                              name: "bamba adama",
                              datenee: "12/03/1960",
                              village: "Bougousso",
                              gender: 'male',
                              photo: "img/test.png"
                          }, {
                              id: 6,
                              mid: 2,
                              fid: 1,
                              name: "bamba AWA",
                              gender: 'female',
                              photo: "img/test.png"
                          }, {
                              id: 4,
                              pids: [3],
                              name: "kone aminata",
                              gender: 'female',
                              photo: "img/test.png"
                          }


                  ]
              });
              </script>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  