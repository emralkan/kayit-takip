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
                    <div class="col-12">
                        <!-- Left sidebar -->
                        <div class="email-leftbar card">
                            <a href="email-compose.html"
                                class="btn btn-danger rounded-pill btn-custom btn-block waves-effect waves-light">Compose</a>

                            <h6 class="mt-4">Mesajlar</h6>

                            <div class="mt-4">
                                <?php
                                             
                                             $iletisor=$db->prepare("SELECT * FROM iletiler");
                                             $iletisor->execute();
                                             while($ileticek=$iletisor->fetch(PDO::FETCH_ASSOC)) {
                                              ?>
                                
                                <a href="#" class="d-flex">
                                    <img class="d-flex me-3 rounded-circle" src="assets/images/users/avatar-6.jpg"
                                        alt="Generic placeholder image" height="36">
                                    <div class="flex-1 chat-user-box">
                                        <p class="user-title m-0"><?php echo $ileticek['ileti_isim'] ?></p>
                                        <p class="text-muted text-truncate"><?php echo $ileticek['icerik'] ?></p>
                                    </div>
                                <?php }  ?>
                                </a>

                            </div>
                        </div>
                        <!-- End Left sidebar -->

                        <!-- Right Sidebar -->
                        <div class="email-rightbar mb-3">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="d-flex mb-5">
                                        <img class="d-flex me-3 rounded-circle  avatar-sm"
                                            src="assets/images/users/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="flex-1 align-self-center">
                                            <h4 class="font-size-14 m-0">Humberto D. Champion</h4>
                                            <small class="text-muted">support@domain.com</small>
                                        </div>
                                    </div>

                                    <h4 class="mt-0 font-size-16">This Week's Top Stories</h4>

                                    <p>Dear Lorem Ipsum,</p>
                                    <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque
                                        arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est
                                        quis orci varius viverra. Curabitur dictum volutpat massa vulputate
                                        molestie. In at felis ac velit maximus convallis.
                                    </p>
                                    <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu
                                        venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum
                                        orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus
                                        condimentum, ipsum urna lacinia lacus, vel tincidunt mi nibh sit amet lorem.
                                    </p>
                                    <p>Sincerly,</p>
                                    <hr />

                                    <div class="row">
                                        <div class="col-xl-2 col-md-4 col-6">
                                            <div class="card mb-4">
                                                <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg"
                                                    alt="Card image cap">
                                                <div class="py-2 text-center">
                                                    <a href="" class="text-muted font-500">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-4 col-6">
                                            <div class="card mb-4">
                                                <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg"
                                                    alt="Card image cap">
                                                <div class="py-2 text-center">
                                                    <a href="" class="text-muted font-500">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="email-compose.html" class="btn btn-secondary waves-effect mt-4"><i
                                            class="mdi mdi-reply"></i> Reply</a>
                                </div>

                            </div>

                        </div>
                        <!-- end Col-9 -->

                    </div>

                </div>
                <!-- End row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

       <?php 
include'../layout/footer.php';

 ?>
