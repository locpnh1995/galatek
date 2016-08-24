<?php

function TimGiaSP($masp,$conn){
	$sqlCmd="SELECT gia FROM SANPHAM WHERE masp='$masp'";
	$result = mysqli_query($conn,$sqlCmd);
	$row = mysqli_fetch_assoc($result);
	$gia=$row['gia']; //lấy giá của sản phẩm
	
	return $gia;
}

function GetMaKH($conn){
	$isnv=0;
	$username="";
	if (!empty($_COOKIE['isnv']))
		$isnv=1;
	if (isset($_COOKIE['ckUsername']))
	{
		$cookie=true;
		$username=$_COOKIE['ckUsername'];
	}

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	if (isset($_SESSION['user']))
	{
		$cookie=false;
		$username=$_SESSION['user'];
	}
	if ($isnv==1)
		$sqlCmd="SELECT manv FROM NHANVIEN where user='$username'";
	else
		$sqlCmd="SELECT makh FROM KHACHHANG where user='$username'";
	$result = mysqli_query($conn,$sqlCmd);
	$row = mysqli_fetch_assoc($result);
	
	if ($isnv==1)
		$ma=$row['manv']; //mã nhân viên
	else
		$ma=$row['makh']; //mã khách hàng
	return $ma;
}

function GetTriGiaMaxHD($conn, $makh){
	$finalResult=array();
	
	$maxSoHDCmd="select MAX(SOHD) as MA, TRIGIA FROM HOADON WHERE MAKH='$makh' AND THANHTOAN=0";
	$maxSoHDResult = mysqli_query($conn,$maxSoHDCmd);
	
	if (!empty($maxSoHDResult)) //đã từng mua hàng chưa ?
	{
		if ($maxSoHDResult->num_rows>0){
			
			$row = mysqli_fetch_assoc($maxSoHDResult);
			$sohd=$row['MA']; //số hóa đơn lớn nhất của khách hàng trên
			if ($sohd!=null)
			{
				$triGia=$row['TRIGIA'];
				return $finalResult=array("SoHD"=>"$sohd", "TriGia"=>"$triGia");
			}
			else
			{
				$triGia=0;
				return $finalResult="";
			}
		}
	}			
	return $finalResult="";
}
?>