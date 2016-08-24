<?php
	$name=$_POST["name"];
	$addr=$_POST["addr"];
	$username=$_POST["username"];
	$password=$_POST["pass"];
	$phone=$_POST["phone"];
	$email=$_POST["email"];
	
	$day=$_POST["ngay"];
	$month=$_POST["thang"];
	$year=$_POST["nam"];
	
	$birthday=$year.'/'.$month.'/'.$day;
	
	
	
	require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
	
	$userQuery="select user from KHACHHANG where user='$username'"; //kiểm tra user tồn tại
	$userResult= mysqli_query($conn,$userQuery);
	
	$emailQuery="select email from KHACHHANG where email='$email'"; //kiểm tra email tồn tại
	$emailResult= mysqli_query($conn,$emailQuery);
	
	
	
	if ($userResult->num_rows !== 0 )
	{
		setcookie('userExist',$username,time()+ 5,'/'); //dấu / cho biết cookie có giá trị trong toàn tên miền
	}
	else
	{
		if ($emailResult->num_rows !== 0 )
		{
			setcookie('emailExist',$email,time()+ 5,'/');
		}
		else
		{
			$sqlCmd="select MAX(MAKH) as MA FROM KHACHHANG";
			$result = mysqli_query($conn,$sqlCmd);
			
			$row = mysqli_fetch_assoc($result);
			$makh=$row['MA'];
			$makh+=1;
			$makhLength=strlen($makh);
			for ($i=0; $i<10-$makhLength; $i++)
				$makh = '0'.$makh;
			
			$today=getdate();
			$today=$today['year'].'/'.$today['mon'].'/'.$today['mday'];
			
			$password=md5($password);
			$sqlCmd="insert into KHACHHANG VALUES('$makh','$name','$addr','$phone','$email','$birthday','$today','$username','$password','0')";
			$result=mysqli_query($conn,$sqlCmd);

			setcookie('emailExist',$email,time()- 5,'/');
			setcookie('userExist',$username,time()- 5,'/');
			
			setcookie('userAdded',$username,time()+ 5,'/');
			

		}
	}
	header ('location: /?id=dang-ky');
?>