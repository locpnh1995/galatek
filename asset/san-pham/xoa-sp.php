<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');

$masp=$_POST['masp'];
$sqlCmd="DELETE FROM SANPHAM WHERE MASP='$masp'";
$result=mysqli_query($conn,$sqlCmd);

if ($result==true)
{
	
	$result=array('xoa' => 'yes');
}
else
{
	
	$result=array('xoa' => 'no');
}

echo json_encode($result);
?>