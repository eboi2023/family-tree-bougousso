<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
	<div class="container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1">No</div>
				<div class="col col-2">Facility ID</div>
				<div class="col col-3">Requester</div>
				<div class="col col-4">Requested Facilities</div>
				<div class="col col-5">Start Date</div>
				<div class="col col-6">End Date</div>
				<div class="col col-7">Approved?</div>
			</li>
			<?php
            $i = 1;
            foreach ($data as $row){
                $id = $row->ID_Facility;
                $startDate = $row->start_date;
                $endDate = $row->end_date;
                $requester = $row->requester;
                $requestedFacility = $row->requestedFacility;
                $status = $row->status;
            ?>       
			<li class="table-row">
				<div class="col col-1" data-label="Nomor"><?php echo $i++ ?></div>
				<div class="col col-2" data-label="ID Facility"><?php echo $id ?></div>
				<div class="col col-3" data-label="Requester"><?php echo $requester ?></div>
				<div class="col col-4" data-label="Requested Facilities"><?php echo $requestedFacility ?></div>
				<div class="col col-5" data-label="startdate"><?php echo $startDate ?></div>
				<div class="col col-6" data-label="enddate"><?php echo $endDate ?></div>
				<div class="col col-7" data-label="Status"><?php echo $status?></div>
			</li>
			<?php } ?>
		</ul>
	</div>      
<?php }?>


       