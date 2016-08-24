<?php
$masp=$_POST['masp'];
$soluong=$_POST['sl'];
//$isThanhToan=$_POST['isThanhToan'];

require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');

function SetSoLuongSP($sohd,$masp,$conn,$soluong){
	$sqlCmd="SELECT SL FROM CTHD WHERE SOHD='$sohd' AND MASP='$masp'";
	$result = mysqli_query($conn,$sqlCmd);
	
	if (!empty($result)) //đã từng mua mặt hàng này chưa ?
	{
		if ($result->num_rows>0){ //nếu rồi cập nhật lại số lượng
			
			$row=mysqli_fetch_assoc($result);
			$curSoLuong=$row['SL'];
			
			$soluong=$curSoLuong+$soluong;
			
			$sqlCmd="UPDATE CTHD SET SL='$soluong' WHERE SOHD='$sohd' AND MASP='$masp'";
			mysqli_query($conn,$sqlCmd);
		}
		else // nếu chưa cập nhật 1 dòng mới
		{
			$sqlCmd="INSERT INTO CTHD VALUES ('$sohd','$masp','$soluong')";
			mysqli_query($conn,$sqlCmd);
		}
	}
}



function NewHD($makh,$masp,$soluong,$conn){
	$sqlCmd="select MAX(SOHD) as MA FROM HOADON";
	$result = mysqli_query($conn,$sqlCmd);
	$row = mysqli_fetch_assoc($result);
	$sohd=$row['MA']; //số hóa đơn lớn nhất
	
	$sohd+=1;
	$sohdLength=strlen($sohd);
	for ($i=0; $i<10-$sohdLength; $i++)
		$sohd = '0'.$sohd;
	
	$today=getdate();
	$today=$today['year'].'/'.$today['mon'].'/'.$today['mday'];
	
	$triGia=TimGiaSP($masp,$conn)*$soluong; //tính trị giá
	
	$sqlCmd="INSERT INTO HOADON VALUES ('$sohd','$today','$makh','$triGia','0','0','0',null)";
	mysqli_query($conn,$sqlCmd);
	
	$sqlCmd="INSERT INTO CTHD VALUES ('$sohd','$masp','$soluong')";
	mysqli_query($conn,$sqlCmd);
}


$makh=GetMaKH($conn);


$sqlCmd="select MAX(SOHD) as MA FROM HOADON WHERE MAKH='$makh'";
$result = mysqli_query($conn,$sqlCmd);


if (!empty($result)) //đã từng mua hàng chưa ?
{
	if ($result->num_rows>0){
		
		$row = mysqli_fetch_assoc($result);
		$sohd=$row['MA']; //số hóa đơn lớn nhất của khách hàng trên
		if ($sohd==null)
		{
			
			NewHD($makh,$masp,$soluong,$conn);
			
		}
		else
		{
			$sqlCmd="select thanhtoan from HOADON where sohd='$sohd'";
			$result = mysqli_query($conn,$sqlCmd);
			$row = mysqli_fetch_assoc($result);
			$thanhtoan=$row['thanhtoan'];

			if ($thanhtoan==0) //chưa thanh toán, thêm sp vào giỏ hàng htại
			{
				SetSoLuongSP($sohd,$masp,$conn,$soluong);
				
				$sqlCmd="select TRIGIA FROM HOADON WHERE SOHD='$sohd'";
				$result = mysqli_query($conn,$sqlCmd);
				$row = mysqli_fetch_assoc($result);
				$curTriGia=$row['TRIGIA']; //lấy trị giá hiện tại của hóa đơn
				
				$triGia=$curTriGia+TimGiaSP($masp,$conn)*$soluong;
				
				$sqlCmd="UPDATE HOADON SET TRIGIA='$triGia' WHERE SOHD='$sohd'";
				mysqli_query($conn,$sqlCmd);
			}
			else // tạo hóa đơn mới, do đã thanh toán
			{
				NewHD($makh,$masp,$soluong,$conn);
			}
		}
	}
	else //nếu chưa từng mua hàng
	{
		
		NewHD($makh,$masp,$soluong,$conn);
	}
}
?>
