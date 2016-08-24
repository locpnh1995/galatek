<!DOCTYPE html>
<html>
<head>
	<title>
		Galatek ™ Linh kiện - Phụ kiện máy tính, Laptop chất lượng cao giá tốt Online
	</title>
	
	<meta name="description" content="Linh kiện - Phụ kiện máy tính, Laptop chất lượng cao giá tốt. Thẻ nhớ, USB, SSD, HDD, RAM, Webcam, Tai nghe, Chuột, Bàn Phím, Lót chuột, Đế tản nhiệt ... giá luôn tốt nhất"/>
	<meta name="keywords" content="thẻ nhớ điện thoại, ram máy tính, ram laptop, USB, USB 3.0, ổ cứng, ổ HDD, ổ cứng SSD, chuột, bàn phím, tai nghe điện thoại" />
	<link rel="icon" href="/images/logo/galatek.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel="stylesheet" href="/main.css" type="text/css">
	<!--[if lt IE 9]>
    <script src="js/thu-vien/internet/html5shiv.js"></script>
    <script src="js/thu-vien/internet/respond.min.js"></script>
    <![endif]-->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.3/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nivoslider/3.2/jquery.nivo.slider.min.js" type="text/javascript"></script>
	
	
	<!--<script src="/thu-vien/internet/jquery-1.12.3.min.js" type="text/javascript"></script>
	<script src="/thu-vien/internet/jquery.easing.1.3.js" type="text/javascript"></script>
	
	<script src="/thu-vien/internet/jquery.nivo.slider.js" type="text/javascript"></script>
	-->
	<script src="/thu-vien/internet/modernizr.2.5.3.min.js" type="text/javascript"></script>
	<script src="loadPage.js" type='text/javascript'></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
</head>

<body>
	<?php
		header('Content-Type: text/html; charset=utf-8');
		require_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/header.php');

		echo '<div id="content" class="clearfix">';

				if (!isset($_GET['id']))
				{
					include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/searchbar.html');
					include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/slidebar.html');
					include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/vernav.html');
					require_once "search.php";
					include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/right-menu.html');
				}
				else
				{
					if (substr($_GET['id'],0,7)=='product')
					{
						include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/searchbar.html');
						include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/vernav.html');
					}
					require_once "view.php";
				}

		echo '</div>';
		include_once ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/footer.html');
	?>
</body>
</html>
