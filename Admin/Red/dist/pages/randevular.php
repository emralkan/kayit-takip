<?php 
include'../layout/header.php';
$randbak=$db->prepare("SELECT * FROM randevular");
$randbak->execute();
$randcek=$randsor->fetch(PDO::FETCH_ASSOC);
 ?>
 <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Hoşgeldin <?php echo $usercek['username'] ?></li>            
                    <li>
                        <a href="index.php" class="waves-effect">
                            <i class="dripicons-device-desktop"></i>
                            <span>Anasayfa</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="dripicons-list"></i>
                            <span> Menüler </span>
                        </a>
                        
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="../pages/hastalar.php">Hastalar</a></li>
                            <li><a href="randevular.php">Randevular</a></li>
                            <li><a href="iletiler.php">Mesajlar</a></li>
                        </ul>
                    </li>

                    

                    

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Randevular</h4>
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
        <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bekleyen Randevular</h4>
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
                                                <th>Randevu Durumu</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                             $hastasor=$db->prepare("SELECT * FROM randevular where durum=:durum");
                                             $hastasor->execute(array(
                                                'durum'=> 0
                                            ));
                                             while($hastacek=$hastasor->fetch(PDO::FETCH_ASSOC)) {
                                              ?>
                                                
                                            <tr>
                                                <td><?php echo $hastacek['username'] ?></td>
                                                <td><?php echo $hastacek['hastayas'] ?></td>
                                                <td><?php echo $hastacek['icerik'] ?></td>
                                                <td><?php echo $hastacek['zaman'] ?></td>
                                                <td><center><a href="randduzenle.php?doktor_id=<?php echo $hastacek['doktor_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                                                <td><center><a href="../islem.php?doktor_id=<?php echo $hastacek['doktor_id']; ?>&reddet=ok"><button class="btn btn-danger btn-xs">Reddet</button></a></center></td>
                                                <input type="hidden" name="username" value="<?php echo $hastacek['username']; ?>"> 

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