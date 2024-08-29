

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
                          33
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
                            33
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
                            33
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
                    <strong>3</strong>
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
  