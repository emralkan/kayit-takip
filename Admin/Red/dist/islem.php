<?php 
include'baglan.php';
ob_start();
session_start();

if (isset($_POST['giris'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usersor=$db->prepare(" SELECT * FROM user where username=:username and password=:password"); 
	$usersor->execute(array(
	'username'=> $username,
	'password'=> $password,
	)); 
	$userdata = $usersor->fetch(PDO::FETCH_ASSOC);
	$say=$usersor->rowCount();
	$nitelik = $userdata['nitelik'];
	if ($say==1 && $nitelik==1) {
		$_SESSION['username']= $username;
		$_SESSION['password']= $password;
		header("location:pages/index.php");
	}else if ($say==1 && $nitelik==0) {
		$_SESSION['username']= $username;
		$_SESSION['password']= $password;
		header("location:pages/hasta.php");
	}else{
		header("location:login/login.php?basarisiz");
	}
}

if (isset($_POST['randal'])){
	$randkaydet=$db->prepare("INSERT INTO randevular SET 
			username=:username,
			hastayas=:hastayas,
			zaman=:zaman,
			icerik=:icerik,
			durum=:durum
			");
			$insert=$randkaydet->execute(array(
			
			'username' => $_POST['username'],
			'hastayas' => $_POST['hastayas'],
			'zaman' => $_POST['zaman'],
			'icerik' => $_POST['icerik'],
			'durum' => $_POST['durum'],			

			));
			if ($insert) {
				header("location:pages/hastarandevular.php");
			}else{
				header("location:pages/randal.php");
			}

}


if (isset($_POST['kaydet'])) {

	$doktor_id=$_POST['doktor_id'];

	$kaydet=$db->prepare("UPDATE randevular SET
		zaman=:zaman,
		icerik=:icerik,	
		durum=:durum
		WHERE doktor_id={$_POST['doktor_id']}");
	$update=$kaydet->execute(array(
		'zaman' => $_POST['zaman'],
		'icerik' => $_POST['icerik'],
		'durum' => $_POST['durum']		
		));

	if ($update) {

		Header("Location:pages/randevular.php?basarili?durum=ok&doktor_id=$doktor_id");

	} else {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}
}


if ($_GET['reddet']== "ok") {
	$reddet=$db->prepare("DELETE from randevular where doktor_id=:doktor_id");
	$kontrol=$reddet->execute(array(
		'doktor_id'=>$_GET['doktor_id']
	));
	if ($kontrol) {
		header("location:pages/randevular.php");
	}
}








































/////////////////////////////////////////////////////////