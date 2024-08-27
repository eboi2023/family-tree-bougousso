<?php
    if( ! $this->session->userdata('authenticated')){
        redirect('Home');                
    }
    else{ 
    ?>
    <div class="bgfotodetails">
        <?php
            foreach($data as $booking){
                $id = $booking->ID_Fasilitas;
                $nama = $booking->NAMA_Fasilitas;
                $poster = $booking->URL_Gambar;
                $description = $booking->Description; ?>
                <section class="rooms sec-width" id="rooms">
                    <div class="rooms-container">
                        <article class="room">
                            <div class="room-image">
                                <?php echo "<img src = '",base_url(). '/assets/poster/'. $poster, "'width = '300' alt='room image'>" ?>
                            </div>
                            <div class="room-text">
                                <?php echo "<h3>".$nama."</h3>"; 
                                echo "<p>".$description."</p>"?>
                                <?php echo"<a class='btn' href='",site_url('showBookTemplate'),"?id=".$id."' style='color:black;'>Book Now</a>"?>
                            </div>
                        </article>
                    </div>
                </section>
            <?php
            }
            ?>
    </div>
    <?php
    }
?>

