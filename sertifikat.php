<?php

include 'conn.php';

// Query untuk mengambil data dosen
$sql = "SELECT * FROM file_sertifikat";
$result = $conn->query($sql);

include 'header.php';
?>
    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section" style="padding-top: 50px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Sertifikat</h3>
                        <p>silahkan klik judul file</p>
                    </div>
                </div>
            </div>
            <?php
               $no =1;
                while($data = $result->fetch_assoc()) { ?>
            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                        <span>   <?= $no++?></span>
                    
                        </div>
                        <div class="event_info">
                            <a target="_blank" href="<?=$base_url .'/sertifikat/'.$data['sertifikat']?>">
                                <h4><?=$data['fullname_sertifikat']?></h4>
                             </a>
                           
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- recent_event_area_end  -->

<?php include 'footer.php'; ?>
