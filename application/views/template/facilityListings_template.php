<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ ?>
    <div class="container">
		<ul class="responsive-table">
        <input type = "button" class="effect2 add" onClick="location.href='<?php echo site_url('addFacility_Template');?>'" value = "Add"/>
			<li class="table-header">
				<div class="col col-1">No</div>
				<div class="col col-3">Name</div>
				<div class="col col-7">Poster</div>
				<div class="col col-6">Operation</div>
			</li>
            <?php
                $i = 1;
                foreach ($data as $row){
                    $id = $row['ID_Fasilitas'];
                    $nama = $row['NAMA_Fasilitas'];
                    $poster = $row['URL_Gambar'];?>

                    <li class="table-row">
                    <div class="col col-1" data-label="Nomor"><?php echo $i++ ?></div>
                    <div class="col col-7" data-label="ID Facility"><?php echo $nama ?></div>
                    <div class="col col-8" data-label="Requester"><?php echo "<img src = '",base_url(). '/assets/poster/'. $poster, "'width = '250' height='150'>"?></div>
                    <div class="col col-7" data-label="startdate"><?php echo "<a href='",site_url('updateFacility'),"?id=".$id."' class = 'effect edit''>Update</a><a href='",site_url('deleteFacility'),"?id=".$id."' class ='effect1 delete'>Delete</a>" ?></div>
            </li>
               <?php }
            ?>
        </tbody>
    </table>
<?php }?>

