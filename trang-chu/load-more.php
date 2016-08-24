<?php
	include ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
	if (isset($_POST['id']) && !empty($_POST['id']))
	{
		
		require ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
		$sqlCmd='select masp, tensp, links, gia from SANPHAM WHERE MASP>'.$_POST['id'].' LIMIT 6';
		$noMore='<p id="no-more">Không tìm thấy thêm sản phẩm nào !</p>';
		
		require ($_SERVER['DOCUMENT_ROOT'].'/san-pham/printProducts.php');
		mysqli_close($conn);
	}
?>
