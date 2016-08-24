<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');

$oldpassType=$_POST['oldpass'];
$newpass=$_POST['newpass'];

$makh=GetMaKH($conn);

$sqlCmd="SELECT PASSWD FROM NHANVIEN WHERE MANV='$makh'";
$result=mysqli_query($conn,$sqlCmd);

if (!empty($result))
{
	if ($result->num_rows>0){
		while ($row = mysqli_fetch_assoc($result)){
			$oldpassDB=$row['PASSWD'];
		}
		if ($oldpassDB==md5($oldpassType)){
			$newpass=md5($newpass);
			
			$sqlCmd="UPDATE NHANVIEN SET PASSWD='$newpass' WHERE MANV='$makh'";
			mysqli_query($conn,$sqlCmd);
			setcookie ('changepass','true',time()+ 20,'/'); //dấu / cho biết cookie có giá trị trong toàn tên miền
		}
		else
			setcookie ('changepass','false',time()+ 20,'/');
	}
}
header('Location: /?id=tai-khoan');

?>