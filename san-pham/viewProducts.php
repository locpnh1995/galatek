<?php
	include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
	$masp=substr($_GET['id'],7);
	require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
	$sqlCmd="select masp, tensp, thongtin, gia, luotxem, doc, ghi, baohanh, links from SANPHAM where masp='$masp'";
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/san-pham/printProducts.php');
	
	mysqli_close($conn);

?>