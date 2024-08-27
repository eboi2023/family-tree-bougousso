<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>

    <div class="container">
		<ul class="responsive-table">
        <input type = "button" class="effect2 add" onClick="location.href='<?php echo site_url('addUsers_Template');?>'" value = "Add"/>
			<li class="table-header">
				<div class="col col-1">No</div>
				<div class="col col-2">Name</div>
				<div class="col col-3">Email</div>
				<div class="col col-4">Role</div>
				<div class="col col-5">Operation</div>
			</li>
        <?php
            $i = 1;
            foreach ($data as $row){
                $id = $row['id_User'];
                $email = $row['email_User'];
                $password = $row['password_User'];
                $nama = $row['nama_User'];
                $role = $row['role_User'];?>

            <li class="table-row">
				<div class="col col-1" data-label="Nomor"><?php echo $i++ ?></div>
				<div class="col col-2" data-label="ID Facility"><?php echo $nama ?></div>
				<div class="col col-3" data-label="Requester"><?php echo $email ?></div>
				<div class="col col-4" data-label="Requested Facilities"><?php echo $role ?></div>
				<div class="col col-5" data-label="startdate"><?php echo "<a href='",site_url('updateData'),"?id=".$id."' class = 'effect edit''>Update</a><a href='",site_url('deleteData'),"?id=".$id."' class ='effect1 delete'>Delete</a>" ?></div>
			</li>
         <?php   }
        ?>
        </ul>
            </div>
<?php }?>