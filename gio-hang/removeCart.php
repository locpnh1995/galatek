<?php
$masp=$_POST['masp'];
$sohd=$_POST['sohd'];
$soluong="";

require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');

$sqlCmd="SELECT SL FROM CTHD WHERE SOHD='$sohd' AND MASP='$masp'";
$soluong=mysqli_fetch_assoc(mysqli_query($conn,$sqlCmd))['SL'];


$sqlCmd="DELETE FROM CTHD WHERE SOHD='$sohd' AND MASP='$masp'";
mysqli_query($conn,$sqlCmd);

$sqlCmd="SELECT COUNT(MASP) AS MA FROM CTHD WHERE SOHD='$sohd'";
$count=mysqli_fetch_assoc(mysqli_query($conn,$sqlCmd))['MA'];
echo 'count: '.$count;
if ($count>0)
{
	echo 'count >0: '.$count;
	$sqlCmd="select TRIGIA FROM HOADON WHERE SOHD='$sohd'";
	$result = mysqli_query($conn,$sqlCmd);
	$row = mysqli_fetch_assoc($result);
	$curTriGia=$row['TRIGIA']; //lấy trị giá hiện tại của hóa đơn
	echo 'curTriGia'.$curTriGia;
	
	$triGia=$curTriGia-TimGiaSP($masp,$conn)*$soluong;
	echo 'new TriGia'.$triGia;
	
	$sqlCmd="UPDATE HOADON SET TRIGIA='$triGia' WHERE SOHD='$sohd'";
}
else
{
	echo 'count else: '.$count;
	$sqlCmd="DELETE FROM HOADON WHERE SOHD='$sohd'";
	mysqli_query($conn,$sqlCmd);
}

mysqli_query($conn,$sqlCmd);

?>
