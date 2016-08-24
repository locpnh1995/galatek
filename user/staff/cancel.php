<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');

$sohd=$_GET['sohd'];

$sqlCmd="DELETE FROM CTHD WHERE SOHD='$sohd'";
$result=mysqli_query($conn,$sqlCmd);

$sqlCmd="DELETE FROM HOADON WHERE SOHD='$sohd'";
$result=mysqli_query($conn,$sqlCmd);

header ('Location: /?id=new-orders');

?>