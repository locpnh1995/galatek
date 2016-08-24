<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');


$sohd=$_GET['sohd'];
$manv=GETMaKH($conn);

$sqlCmd="UPDATE HOADON SET TTDONHANG=1, MANV='$manv' WHERE SOHD='$sohd'";
$result=mysqli_query($conn,$sqlCmd);

header ('Location: /?id=new-orders');

?>