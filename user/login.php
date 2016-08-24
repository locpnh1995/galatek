<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');

$username=$_POST['user'];
$password=$_POST['pass'];
$user=$passwd=$user2=$passwd2="";


$sqlCmd="select user, passwd from KHACHHANG where user='$username'";

$result= mysqli_query($conn,$sqlCmd);

while ($row = mysqli_fetch_assoc($result)){

	$user=$row['user'];

	$passwd=$row['passwd'];

}

$sqlCmd2="select user, passwd from NHANVIEN where user='$username'";

$result2= mysqli_query($conn,$sqlCmd2);

while ($row2 = mysqli_fetch_assoc($result2)){

	$user2=$row2['user'];

	$passwd2=$row2['passwd'];

}

mysqli_close($conn);



$password=md5($password);

function Redirect($url, $permanent = false)

{

	if (headers_sent() === false)

	{

		header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);

	}



	exit();

}

	

if ( ($username == $user && $password == $passwd) || ($username == $user2 && $password == $passwd2)  )

{

	echo "<font color=red>Welcome to, ".$username."<font>";
	
	session_start();
	
	$_SESSION['logged']=true;
	
	$_SESSION['user']=$username;
	
	$_SESSION['pass']=$password;
	
	setcookie('session',$username,time()+ 3600,'/');
	
	if ($username == $user2 && $password == $passwd2)
		setcookie('isnv','1',time()+ 3600,'/');
	
	if (isset($_POST['remember']))
	{
		setcookie('ckUsername',$username,time()+ 3600,'/');
	}

	if (isset($_COOKIE['redirect']))
	{
		header('Location: '.$_COOKIE['redirect']);
	}
	else
		header('Location: /');

}

else

{

	echo "<font color=red>Username hoac password khong chinh xac<font>";

}



?>