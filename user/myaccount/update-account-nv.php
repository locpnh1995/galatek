<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
$hoten=$_POST['name'];
$diachi=$_POST['addr'];
$sodt=$_POST['phone'];
$email=$_POST['email'];

$day=$_POST["ngay"];
$month=$_POST["thang"];
$year=$_POST["nam"];
$loai=$_POST["kind"];

$birthday=$year.'/'.$month.'/'.$day;

$makh=GetMaKH($conn);
	
$sqlCmd="UPDATE NHANVIEN SET HOTEN='$hoten',DCHI='$diachi',SODT='$sodt',EMAIL='$email',NGSINH='$birthday',LOAI='$loai' WHERE MANV='$makh'";
mysqli_query($conn,$sqlCmd);
setcookie('update-account','true',time() +5,'/');
header('Location: /?id=tai-khoan');
?>