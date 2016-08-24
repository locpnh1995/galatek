<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');


$sohd=$_GET['sohd'];


$sqlCmd="UPDATE HOADON SET GIAOHANG=1 WHERE SOHD='$sohd'";
$result=mysqli_query($conn,$sqlCmd);

header ('Location: /?id=new-orders');

?>