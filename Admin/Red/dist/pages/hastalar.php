<?php 
include'../layout/header.php';

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
                                <h4 class="card-title">Kayıtlı Hastalar</h4>
                                <p class="card-title-desc"> 
                                </p>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                         <thead> 
                                            <tr>
                                                <th>id</th>
                                                <th>İsim</th>
                                                <th>Soyisim</th>
                                                <th>Kayıt Tarihi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             
                                             $usersor=$db->prepare("SELECT * FROM user where nitelik=:nitelik");
                                             $usersor->execute(array(
                                                'nitelik'=> 0
                                            ));
                                             while($usercek=$usersor->fetch(PDO::FETCH_ASSOC)) {
                                              ?>
                                            <tr>
                                                <td><?php echo $usercek['id'] ?></td>
                                                <td><?php echo $usercek['username'] ?></td>
                                                <td><?php echo $usercek['yetki'] ?></td>
                                                <td><?php echo $usercek['kayıtTarihi'] ?></td>
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