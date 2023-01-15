<?php 
include'../layout/header.php';
$randevubak=$db->prepare("SELECT * FROM randevular where doktor_id=:id");
$randevubak->execute(array(
  'id' => $_GET['doktor_id']
  ));

$randevucek=$randevubak->fetch(PDO::FETCH_ASSOC);
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
                            <form action="../islem.php" method="POST">
                            <div class="card-body">
                                <h4 class="card-title">Bekleyen Randevu</h4>
                                <p class="card-title-desc"> 
                                </p>
                                <div class="table-responsive">
                                    <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İsim <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="username"  required="required" value="<?php echo $randevucek['username'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bölüm <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="icerik"  required="required" value="<?php echo $randevucek['icerik'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarih <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="zaman"  required="required" value="<?php echo $randevucek['zaman'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Randevu Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="durum" required>

                  <option value="1" <?php echo $randevucek['durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($randevucek['durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  


                </select>
               <input type="hidden" name="doktor_id" value="<?php echo $randevucek['doktor_id'] ?>">

              </div>
            </div>
            <br>
            <td><button type="submit" name="kaydet" class="btn btn-primary btn-xs">Onayla</button></td>

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- end col -->

        </div>
        <!-- End Page-content -->

        <?php 
        include'../layout/footer.php';
         ?>