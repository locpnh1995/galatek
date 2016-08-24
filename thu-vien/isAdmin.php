<?php

if(session_status() == PHP_SESSION_NONE)
	session_start();
$cookie=false;
$session=false;
$login=false;
$admin=false;
if (isset($_COOKIE['ckUsername']))
{
	$cookie=true;
	$login=true;
	if ($_COOKIE['ckUsername']=='viplocpro' or $_SESSION['user']=='viplocpro')
	{
		$admin=true;
	}
}
else
{
	if (isset($_SESSION['logged']) && isset($_SESSION['pass']))
	{
		$session=true;
		$login=true;
		if ($_COOKIE['ckUsername']=='viplocpro' or $_SESSION['user']=='viplocpro')
		{
			$admin=true;
		}
	}
	
}

?>
