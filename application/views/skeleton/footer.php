<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <?php
      if (date("Y")>2024) {
        $datecreateweb="2024 - ".date("Y");
      }else{
        $datecreateweb=date("Y");
      }
    ?>
    <strong>Copyright &copy; <?=$datecreateweb;?><a href="https://jprobeweb.com/backup/fr" target="_blank"> JPROBEWEB</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

 <?php if ($page_title== "Listes languague") {?>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  var manageTable;
    var base_url = "<?php echo base_url(''); ?>";

    $(document).ready(function() {
      $("#languageNav").addClass('active');
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
            'order': []
        });
        
        $('#manageTable tfoot th').each( function () {
            var title = $(this).text();
            if (title=='<?php echo get_phrase('qualification'); ?>') {
              $(this).html( '<input type="text" placeholder="<?php echo get_phrase('search'); ?>" />' );
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
</script>
<?php } ?>

<!-- notifications CSS
============================================ -->
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/notifications/Lobibox.min.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/notifications/notifications.css');?>">
<script type="text/javascript">
  $(document).ready(function() {
    <?php if($this->session->flashdata('basicWarning') !== null){ ?> 
      Lobibox.notify('warning', {
        sound: true,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        msg: '<?php echo $this->session->flashdata('basicWarning'); ?>'
      });
    <?php }?> 
    <?php if($this->session->flashdata('basicErreur') !== null){ ?> 
      Lobibox.notify('error', {
        sound: true,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        msg: '<?php echo $this->session->flashdata('basicErreur'); ?>'
      });
    <?php }?>  
    <?php if($this->session->flashdata('basicSucces') !== null){ ?>
      Lobibox.notify('success', {
        sound: true,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        msg: '<?php echo $this->session->flashdata('basicSucces'); ?>'
      });
    <?php }?>
    <?php if($this->session->flashdata('basicInfo') !== null){ ?>
      Lobibox.notify('info', {
        sound: true,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        msg: '<?php echo $this->session->flashdata('basicInfo'); ?>'
      });
    <?php }?>
    <?php if($this->session->flashdata('basicDefault') !== null){ ?>
      Lobibox.notify('default', {
        sound: true,
        showClass: 'bounceIn',
        hideClass: 'bounceOut',
        msg: '<?php echo $this->session->flashdata('basicDefault'); ?>'
      });
    <?php }?>
  });
</script>
<!-- notification JS
    ============================================ -->
<script src="<?php echo site_url('assets/plugins/notifications/Lobibox.js');?>"></script>
<script src="<?php echo site_url('assets/plugins/notifications/notification-active.js');?>"></script>

</body>
</html>
