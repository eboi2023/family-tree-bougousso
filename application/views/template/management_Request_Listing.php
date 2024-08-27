<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
    <table id = "myTable" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
    <div class="container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1">No</div>
				<div class="col col-2">Facility ID</div>
				<div class="col col-3">Requester</div>
				<div class="col col-3">Requested Facilities</div>
				<div class="col col-5">Start Date</div>
				<div class="col col-5">End Date</div>
				<div class="col col-7">Operation</div>
			</li>
        <?php
            $i = 1;
            foreach ($data as $row){
                $idApproval = $row['ID_waitingApproval'];
                $id = $row['ID_Facility'];
                $startDate = $row['start_date'];
                $endDate = $row['end_date'];
                $requester = $row['requester'];
                $requestedFacility = $row['requestedFacility'];
                $status = $row['status'];?>
            <li class="table-row">
				<div class="col col-1" data-label="Nomor"><?php echo $i++ ?></div>
				<div class="col col-2" data-label="ID Facility"><?php echo $id ?></div>
				<div class="col col-3" data-label="Requester"><?php echo $requester ?></div>
				<div class="col col-3" data-label="Requested Facilities"><?php echo $requestedFacility ?></div>
				<div class="col col-5" data-label="startdate"><?php echo $startDate ?></div>
				<div class="col col-6" data-label="enddate"><?php echo $endDate ?></div>
				<div class="col col-7" data-label="Status"><?php echo "<a href='",site_url('approveRequest'),"?id=".$idApproval."' class = 'effect edit'>Approve</a>
                <a href='",site_url('rejectRequest'),"?id=".$idApproval."' class = 'effect1 delete'>Reject</a>"?></div>
			</li>
                <?php }
        ?>
    </tbody>
</table>
<?php }?>