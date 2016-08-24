<?php
	$id=$_GET['id'];
	
	switch ($id){
		case "gioi-thieu":
			include "asset/gioi-thieu/gioi-thieu.html";
			break;
		case "hang-moi":
			include "asset/hang-moi/hang-moi.html";
			break;
		case "khuyen-mai":
			include "asset/khuyen-mai/khuyen-mai.html";
			break;
		case "nha-cung-cap":
			include "asset/nha-cung-cap/nha-cung-cap.html";
			break;
		case "thanh-toan":
			include "asset/thanh-toan/thanh-toan.html";
			break;
		case "chinh-sach-giao-hang":
			include "asset/chinh-sach-giao-hang/chinh-sach.php";
			break;
		case "lien-he":
			include "asset/lien-he/lien-he.html";
			break;
		case "dang-ky":
			include "user/register/register-if.php";
			break;
		case "dang-ky-nv":
			include "user/register/staff/register-if.php";
			break;
		case "gio-hang":
			include "gio-hang/cart.php";
			break;
		case "dat-hang":
			include "gio-hang/dat-hang/datHang.php";
			break;
		case "tai-khoan":
			include "user/myaccount/account.php";
			break;
		case "them-sp":
			include "asset/san-pham/them-sp.php";
			break;
		case "view-order":
			include "user/myaccount/view-order.php";
			break;
		case "new-orders":
			include "user/staff/quan-ly.php";
			break;
		case "delivered":
			include "user/staff/quan-ly-qlsp.php";
			break;
		default:
			include "san-pham/viewProducts.php";
			break;
	}
?>