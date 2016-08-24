<?php
function isNVQLSP ($conn){
	
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');

	$manv=GetMaKH($conn);
	$isNVQLSP=0;
	$loai="";


	if ($manv!=""){

		$sqlCmd="SELECT LOAI FROM NHANVIEN WHERE MANV='$manv'";
		
		$result=mysqli_query($conn,$sqlCmd);
		if (!empty($result))
		{
			if ($result->num_rows>0){
				while ($row = mysqli_fetch_assoc($result)){
						$loai=$row['LOAI'];
						
						if ($loai=='QLSP')
							$isNVQLSP=1;
						else
							if ($loai='QLDH')
								$isNVQLSP=2; // là nhân viên quản lý đơn
				}
				
					
			}
		}
	}
	return $isNVQLSP;
}

?>
