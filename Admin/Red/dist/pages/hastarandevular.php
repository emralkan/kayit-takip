<?php 
include'../layout/header.php';

 ?>
 <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <?php 
           include'../layout/hastasidebar.php';
            ?>
        </div>
    </div>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Randevularım</h4>
                                <p class="card-title-desc"> 
                                </p>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                         <thead> 
                                            <tr>
                                                <th>İsim</th>
                                                <th>Yaş</th>
                                                <th>Bölüm</th>
                                                <th>Randevu Tarihi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                             $hastasor=$db->prepare("SELECT * FROM randevular where durum=:durum");
                                             $hastasor->execute(array(
                                                'durum'=> 1
                                            ));
                                             while($hastacek=$hastasor->fetch(PDO::FETCH_ASSOC)) {
                                              ?>
                                                
                                            <tr>
                                                <td><?php echo $hastacek['username'] ?></td>
                                                <td><?php echo $hastacek['hastayas'] ?></td>
                                                <td><?php echo $hastacek['icerik'] ?></td>
                                                <td><?php echo $hastacek['zaman'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end col -->

        </div>
        <!-- End Page-content -->

        <?php 
        include'../layout/footer.php';
         ?>