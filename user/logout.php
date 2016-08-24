<?php
if (!empty($_COOKIE['ckUsername']))
{
	setcookie('ckUsername','out',time()- 3600,'/');
}

if (!empty($_COOKIE['isnv']))
		setcookie('isnv','0',time()-3600,'/');
	
session_start();
if (isset($_SESSION['logged']) && isset($_SESSION['pass']) && isset($_SESSION['user']))
{
    session_destroy();
	setcookie('session','noConnect',time()- 3600,'/');
}

header('Location: /');

?>
