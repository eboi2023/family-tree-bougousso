

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Dashboard'); ?>
        <small><?php echo get_phrase('Control panel'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li class="active"><?= $icon; ?> &nbsp;<?php echo get_phrase($lien); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

        <div class="row">
          <!-- col caisse kiosque-->
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-orange-active color-palette">
                    <div class="inner">
                        <h3>
                          <?= $caissek;?>
                        </h3>

                        <p><?php echo get_phrase('total En caisse du KIOSQUE'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-knight" style="font-size: .8em;"></i>
                    </div>
                    <a href="<?php echo site_url('caisses/kiosque');?>" class="small-box-footer"><?php echo get_phrase('Plus d info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
          <!-- ./col-->
          <!-- col caisse lavage-->
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-aqua-active color-palette">
                    <div class="inner">
                        <h3>
                            <?= $caissel?>
                        </h3>

                        <p><?php echo get_phrase('total En caisse du LAVAGE'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-bishop" style="font-size: .8em;"></i>
                    </div>
                    <a href="<?php echo site_url('caisses/lavage');?>" class="small-box-footer"><?php echo get_phrase('Plus d info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
          <!-- col externe gestionnaire-->
            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-light-blue-active color-palette">
                    <div class="inner">
                        <h3>
                            <?= $momey?>
                        </h3>

                        <p><?php echo get_phrase('En caisse gestionnaire'); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="<?php echo site_url('caisses/gexterne');?>" class="small-box-footer"><?php echo get_phrase('Plus d info'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
          <!-- ./col -->

          <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo get_phrase('Rapport nombre de jour de travail'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <a href="<?php echo site_url();?>dashboard/refresh"><i class="fa fa-refresh"></i>
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong><?php echo $dateactionreport?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <?php echo form_open('dashboard/repportintervaldate') ; ?>
                <div class="col-md-4">
                  <p class="text-center">
                    <strong><?php echo get_phrase('seach'); ?></strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text"><?php echo get_phrase('the year'); ?></span>
                    <div class="form-group">
                      <select class="form-control" name="depart" id="depart" required="">
                        <option value=""><?php echo get_phrase('selected'); ?></option>
                        <?php
                          for ($i=2019; $i <=date('Y'); $i++) { 
                            
                          ?>
                            <option value="<?=$i;?>" <?php if ($i==$years) {
                              echo"selected='' ";
                            }?>><?=$i;?></option>
                          <?php
                          }
                        ?>
                      </select>
                      
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <button type="reset" class="btn btn-success" data-dismiss="modal"><?php echo get_phrase('Fermer'); ?></button>
                        <input type="submit" id="valider2" value="<?php echo get_phrase('enregistrer'); ?>" class="btn btn-success pull-right" name="envoi" />
                  </div>
                  <!-- /.progress-group -->
                </div>
                <?php echo form_close() ; ?>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header  text-green"><?php echo $e_caissekiosque; ?></h5>
                    <span class="description-text"><?php echo get_phrase('entrer en caisse'); ?> KIOSQUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header  text-green"><?php echo $s_caissekiosque; ?></h5>
                    <span class="description-text"><?php echo get_phrase('sortie de caisse'); ?> KIOSQUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header  text-green"><?php echo $e_caisselavage; ?></h5>
                    <span class="description-text"><?php echo get_phrase('entrer en caisse'); ?> LAVAGE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header  text-green"><?php echo $s_caisselavage; ?></h5>
                    <span class="description-text"><?php echo get_phrase('sortie de caisse'); ?> LAVAGE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header  text-green"><?php echo $e_caisseexterne; ?></h5>
                    <span class="description-text"><?php echo get_phrase('entrer en caisse'); ?> EXTERNE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header  text-green"><?php echo $s_caisseexterne; ?></h5>
                    <span class="description-text"><?php echo get_phrase('sortie de caisse'); ?> EXTERNE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
            
          
        </div>
        <!-- /.row -->
      
         <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo get_phrase('evolution des compteur'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" title="<?php echo get_phrase('reduit ou voire'); ?>" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th><?php echo get_phrase('identifient'); ?></th>
                    <th><?php echo get_phrase('name'); ?></th>
                    <th><?php echo get_phrase('evolution des consommation'); ?></th>
                    <th><?php echo get_phrase('niveau actuelle'); ?></th>
                    <th><?php echo get_phrase('view'); ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                      foreach ($aff_service as $key => $value) {
                        $lienpage = $value['lien'];
                        
                      ?>
                        <tr>
                          <td><?php echo $value['num'];?></td>
                          <td><?php echo $value['type_de_compteur'];?></td>
                          <?php
                            $verifaction = array('id' => $value['id'] );
                            $info = $this->Reuion_model->recep_liste_reuion2($verifaction);
                            $type_recharge = $info['type_recharge'];
                            $vue1=$info['initial'];
                            $vue2=$info['vigule_initial'];
                            $listeprise = array('id_compteur' => $value['id'] );
                            $numreuion = $this->Reuion_model->lire_listes_presence2($listeprise);
                            $o=0;
                            if ($type_recharge == 0) {
                              $conso=$vue1;//la valeur innitial du compteur
                              $somme=0;//pour fait la somme global des consomation effectuer pendant ces journée
                              $nbrepoint=0;//^pour compter le nombre de fois le compteur est enregistré
                              foreach ($numreuion as $kei => $value) {
                                $nbrepoint++;
                                $somme+=$value['munero_du_jour']-$conso;
                                $conso=$value['munero_du_jour'];
                              }
                              if ($numreuion==false) {
                                $dermier=$conso;
                              }
                              /*echo var_dump($numreuion);
                              exit();*/
                              if ($numreuion==false || $nbrepoint == 0 || $somme == 0) {
                                $valeurmoyen = 1;
                              }else{
                                $valeurmoyen = $somme/$nbrepoint;
                                
                              }

                              /*echo var_dump($numreuion);
                                exit();*/
                              $conso=$vue1;
                              $consop = 0;
                              $o=0;
                              $evol='<td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">';
                                
                                
                                foreach ($numreuion as $key => $value) {
                                  
                                  $dermier=$value['munero_du_jour'];
                                  $notation=$value['munero_du_jour'];


                                  $priseconso=$value['munero_du_jour']-$conso;

                                  $consomation=$value['munero_du_jour']-$conso;
                                  if ($consop == $consomation) {
                                    $f=0;
                                    $table[$o]=$f;
                                  } else {
                                    
                                    if ($consomation > $consop) {
                                      $f = $consomation-$consop;
                                      $table[$o]=$f;
                                      
                                    }
                                    if ($consomation-$consop < 0) {
                                      $f = $consomation-$consop;
                                      $table[$o]=$f;
                                      
                                    }
                                  }
                                  
                                  $conso = $value['munero_du_jour'];
                                  $o++;
                                  $consop = $consomation;

                                }
                                $g="";
                                if ($o<10) {
                                  for ($d=0; $d <$o ; $d++) { 
                                   $g.=$table[$d].',';
                                  }
                                } else {
                                  $m=$o-9;
                                  for ($i=$m; $i <=$o ; $i++) { 
                                   $g.=$table[$i].',';
                                  }
                                }
                                $evol.=substr($g,0,-1);
                                $evol.='</div>
                              </td>';
                              echo $evol."<td>".$dermier."</td>";
                            }
                            if ($type_recharge == 1) {
                              $conso=$vue1.'.'.$vue2;//la valeur innitial du compteur
                              $somme=0;//pour fait la somme global des consomation effectuer pendant ces journée
                              $nbrepoint=0;//^pour compter le nombre de fois le compteur est enregistré
                              foreach ($numreuion as $kei => $value) {
                                $nbrepoint++;
                                $somme+=$value['munero_du_jour']-$conso;
                                $conso=$value['munero_du_jour'];
                              }
                              /*echo var_dump($numreuion);
                              exit();*/
                              if ($numreuion==false) {
                                $dermier=$conso;
                              }
                              if ($numreuion==false || $nbrepoint == 0 || $somme == 0) {
                                $valeurmoyen = 1;
                              }else{
                                $valeurmoyen = $somme/$nbrepoint;
                                
                              }
                              $evol='<td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">';
                                $evol.=0;
                                $consop = 0;
                                $o=0;


                                foreach ($numreuion as $key => $value) {
                                  $vcontrole=$value['munero_du_jour'].'.'.$value['vigule_munero_du_jour'];
                                  $dermier=$vcontrole=$value['munero_du_jour'].'.'.$value['vigule_munero_du_jour'];
                                  $notation=$vcontrole;
                                  if ($value['recharge'] == 1) {
                                    $rech=$vcontrole-$conso;
                                    $reste=$conso;
                                  }
                                  $f=0;
                                  if ($value['recharge'] == 1) {}
                                  else{
                                    $consomation=$conso-$vcontrole;
                                    if ($consop == $consomation) {
                                      $f=0;
                                      $table[$o]=$f;
                                    } else {
                                      
                                      if ($consomation > $consop) {
                                        $f = $consomation-$consop;
                                        $table[$o]=$f;
                                      }
                                      if ($consomation-$consop < 0) {
                                        $f = $consomation - $consop;
                                        $table[$o]=$f;
                                      }
                                    }
                                  }
                                  $conso = $vcontrole;
                                  $o++;
                                  if($value['recharge'] == 0){
                                    $consop = $consomation;
                                  }
                                
                                }//foreach
                                if ($o<10) {
                                  for ($d=0; $d <$o ; $d++) { 
                                   $g.=$table[$d].',';
                                  }
                                } else {
                                  $m=$o-9;
                                  for ($i=$m; $i <=$o ; $i++) { 
                                   $g.=$table[$i].',';
                                  }
                                }
                                $evol.=substr($g,0,-1);
                                $evol.='</div>
                              </td>';
                              
                              echo $evol."<td>".$dermier."</td>";
                            }
                          ?>
                          
                          <td>
                            <button type="button" class="btn color-palette btn-default " data-toggle="modal" data-target="#modal-view" title="'.get_phrase('Voire et et modifier la liste de presence').'" onclick="action_view('<?php echo $lienpage; ?>')" ><i class="fa fa-eye"></i></button>
                          </td>
                        </tr>
                      <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo site_url('domino');?>" class="btn btn-sm btn-default btn-flat pull-right"><?php echo get_phrase('View All compteur'); ?></a>
            </div>
            <!-- /.box-footer -->
          </div>
        <!-- /.box -->
        
    </section>
    <!-- /.content -->
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
  <script type="text/javascript">
    $("#dashboardMainMenu").addClass('active');
    $('.sparkbar').each(function () {
      var $this = $(this);
      $this.sparkline('html', {
        type    : 'bar',
        height  : $this.data('height') ? $this.data('height') : '30',
        barColor: $this.data('color')
      });
    });
    $(function () {

      var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
      // This will get the first returned node in the jQuery collection.
      var salesChart       = new Chart(salesChartCanvas);

      var salesChartData = {
        labels  : [<?=$moiss;?>],
        datasets: [
          {
            label               : 'LAVAGE',
            fillColor           : 'rgba(156, 156, 153, 0.24)',
            strokeColor         : 'rgb(210, 214, 222)',
            pointColor          : 'rgb(210, 214, 222)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgb(220,220,220)',
            data                : [<?php echo $actionlavage;?>]
          },
          {
            label               : 'KIOSQUE',
            fillColor           : 'rgba(156, 156, 153, 0.24)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(255,255,255,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [<?php echo $actionkiosque?>]
          }
        ]
      };

      var salesChartOptions = {
        // Boolean - If we should show the scale at all
        showScale               : true,
        // Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : false,
        // String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        // Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        // Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        // Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        // Boolean - Whether the line is curved between points
        bezierCurve             : false,
        // Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.5,
        // Boolean - Whether to show a dot for each point
        pointDot                : true,
        // Number - Radius of each point dot in pixels
        pointDotRadius          : 4,
        // Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 1,
        // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 10,
        // Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        // Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        // Boolean - Whether to fill the dataset with a color
        datasetFill             : true,
        // String - A legend template
        legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : false,
        // Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      };

      // Create the line chart
      salesChart.Line(salesChartData, salesChartOptions);
    });
    function action_view(p){
      document.getElementById('verifcode3').value = p;
    }

  </script>
  