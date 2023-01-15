<?php
    include'../layout/header.php';
?>
<div class="vertical-menu">

        <div data-simplebar class="h-100">

            <?php include'../layout/hastasidebar.php'; ?>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">

                                <?php 
                                $randsor=$db->prepare("SELECT * FROM randevular where durum=:durum");
                                $randsor->execute(array(
                                    'durum'=>0));
                             ?>
                                <h3 class="text-info mt-2"><?php echo $randsor->rowCount(); ?></h3>Bekleyen Randevular
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <?php 
                                $randsor=$db->prepare("SELECT * FROM randevular where durum=:durum");
                                $randsor->execute(array(
                                    'durum'=>1));
                             ?>
                                <h3 class="text-primary mt-2"><?php echo $randsor->rowCount(); ?></h3>Geçmiş Randevular
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center">
                            <div class="mb-2 card-body text-muted">
                                <?php 
                                $randsor=$db->prepare("SELECT * FROM randevular");
                                $randsor->execute();
                             ?>
                                <h3 class="text-danger mt-2"><?php echo $randsor->rowCount(); ?></h3>Toplam Müşteri
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Mailler</h4>

                                <div class="row text-center mt-4">
                                    <div class="col-4">
                                        <?php 
                                        $iletisor=$db->prepare("SELECT * FROM iletiler where durum=:durum");
                                        $iletisor->execute(array(
                                        'durum'=>1
                                         )); ?>
                                        <h5 class="mb-2 font-size-18"><?php echo $iletisor->rowCount(); ?></h5>
                                        <p class="text-muted text-truncate">Yeni Mailler</p>
                                    </div>
                                    <div class="col-4">
                                        <?php 
                                        $iletisor=$db->prepare("SELECT * FROM iletiler where durum=:durum");
                                        $iletisor->execute(array(
                                        'durum'=>0
                                         )); ?>
                                        <h5 class="mb-2 font-size-18"><?php echo $iletisor->rowCount(); ?></h5>
                                        <p class="text-muted text-truncate">Okunmamış Mailler</p>
                                    </div>
                                    <div class="col-4">
                                        <?php 
                                        $iletisor=$db->prepare("SELECT * FROM iletiler");
                                        $iletisor->execute(); ?>
                                        <h5 class="mb-2 font-size-18"><?php echo $iletisor->rowCount(); ?></h5>
                                        <p class="text-muted text-truncate">Toplam Mail</p>
                                    </div>
                                </div>

                                <div id="morris-area-example" class="morris-charts morris-chart-height"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Görüşmelerim</h4>

                                <div class="table-responsive">
                                    <table class="table mt-4 mb-0 table-centered table-nowrap">

                                        <tbody>
                                            <?php 
                                                     $randbak=$db->prepare("SELECT * FROM randevular where durum=:durum");
                                                     $randbak->execute(array(
                                                        'durum'=>1
                                                    ));
                                                    while ($randal=$randbak->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/avatar-2.jpg" alt="user-image"
                                                        class="avatar-sm rounded-circle me-2" /><?php echo $randal['username'] ?>
                                                </td>
                                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                                    Confirm</td>
                                                <td>
                                                    <?php echo $randal['hastayas'] ?>
                                                    <p class="m-0 text-muted">Yaş</p>
                                                </td>
                                                <td>
                                                    <?php echo $randal['zaman'] ?>
                                                    <p class="m-0 text-muted">Tarih</p>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    <?php
        include'../layout/footer.php';
    ?>