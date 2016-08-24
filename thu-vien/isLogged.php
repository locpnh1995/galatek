<?php

session_start();
if (isset($_COOKIE['ckUsername']) || isset($_SESSION['user']))
{
	$logged=true;
}
else
{
	$logged=false;
}
if ($logged)
	$result=array('logged' => 'yes');
else
	$result=array('logged' => 'no');

echo json_encode($result);



?>
