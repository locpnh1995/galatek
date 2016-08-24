<div id="header-content">
	<?php
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
		
	
	echo '<div id="background"></div>
	<div id="topnav" class="clearfix">';
		require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
		require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/isNVQLSP.php');
		if ($login)
		{
			if (isNVQLSP($conn)==1){
				echo'<a id="them-sp" href="/?id=them-sp" style="color: white;">Thêm Sản Phẩm</a>';
				echo'<a id="them-sp" href="/?id=delivered" style="color: white;">Cập nhật giao hàng</a>';
			}
			else
				if (isNVQLSP($conn)==2)
					echo'<a id="them-sp" href="/?id=new-orders" style="color: white;">Duyệt Đơn Hàng</a>';
					
			if ($admin)
			{
				echo'<a id="them-sp" href="/?id=them-sp" style="color: white;">Thêm Sản Phẩm</a>';
				echo'<a id="them-nv" href="/?id=dang-ky-nv" style="color: white;">Thêm Nhân Viên</a>';
			}
			if ($cookie)
			{
				echo '<a id="top-username" href="/?id=tai-khoan">'.$_COOKIE['ckUsername'].'</a>';
			}
			else
				if ($session)
			{
				echo '
				<a id="top-username" href="/?id=tai-khoan">'.$_SESSION['user'].'</a>';
			}
			
			
			echo '<form action="/user/logout.php" method=POST>
				<input type="submit" name="submit" class="text" value="[Thoát]">
			</form>';
		}
			else
				echo'<a id="dang-nhap-btn" href="#" onclick="openForm()">Đăng nhập/Đăng ký <i></i></a>';
			
			echo'</div>
			<div id="header">
				<a href="/"><img src="http://i.imgur.com/ltElOBq.jpg" alt="galatek.tk"/></a>
			</div>
			<div id="hornav" class="clearfix">';
			require "hornav.php";
			echo '</div>';
			
	?>
	<div id="dang-nhap-hidden">
		<div id="dang-nhap">
			<h3 id="dang-nhap-header"> Đăng nhập, Đăng kí <img src="/images/login.png"/></h3>
			<div id="dang-nhap-content" class="clearfix">
				<form name="login" id="loginForm" action="/user/login.php" method=POST>
					<label>Tên đăng nhập</label>
					<input class="enterForSubmit" id="username" type=text name="user" placeholder="Tên đăng nhập" onkeypress="return notAllowUnicode();"><br>
					<label>Mật khẩu</label>
					<input class="enterForSubmit" type=password name="pass" placeholder="Mật khẩu" onkeypress="return notAllowUnicode();"><br>
					<input class="enterForSubmit" type=checkbox name="remember" id="remember" value="1" checked>Ghi nhớ tôi
					<input type=submit name="semiSubmit" value="Đăng nhập">
				</form>
				Chưa là thành viên ?<a id="dang-ky" href="/?id=dang-ky">Đăng kí</a>
			</div>
		</div>
		<div class="overlay" onclick="closeForm(); closeCart(); closeChangePass();"></div>
	</div>
	<img id="mua-loading" src="">
</div>