<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');

	$ten=$_POST["tensp"];
	$chitiet=$_POST["details"];
	$gia=$_POST["price"];
	$loai=$_POST["kind"];
	$links=$_POST["hinh1"].';'.$_POST["hinh2"].';'.$_POST["hinh3"].';'.$_POST["hinh4"];
	$doc=$_POST['doc'];
	$ghi=$_POST['ghi'];
	$baohanh=$_POST['baohanh'];
	$today=date("Y/m/d");
	
	$sqlCmd="select MAX(MASP) as MA FROM SANPHAM";
	$result = mysqli_query($conn,$sqlCmd);
	

	$row = mysqli_fetch_assoc($result);
	$masp=$row['MA'];
	$masp+=1;
	$maspLength=strlen($masp);
	for ($i=0; $i<10-$maspLength; $i++)
		$masp = '0'.$masp;
	$sqlCmd="insert into SANPHAM VALUES('$masp','$ten','$chitiet','$gia','0','$loai','0','$doc','$ghi','$baohanh','$links','$today')";
	echo $sqlCmd;
	$result=mysqli_query($conn,$sqlCmd);
	setcookie('lastUpdate','true',time()+10,'/');
	header('Location: /?id=them-sp');
?>