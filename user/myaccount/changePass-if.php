<?php 
$isnv=0;
if (!empty($_COOKIE['isnv']))
		$isnv=1;

echo'
<div id="change-pass">
	<h3 id="change-pass-header"> Đổi mật khẩu <img src="/images/key.png"/></h3>
	<div id="change-pass-content" class="clearfix">';
	if ($isnv==1)
		echo'
			<form name="changePassForm" id="changePassForm" action="/user/myaccount/changePass-nv.php" method=POST>';
	else
		echo '<form name="changePassForm" id="changePassForm" action="/user/myaccount/changePass.php" method=POST>';
	echo'
			<label>Mật khẩu cũ</label><br>
			<input id="oldpass" type=password name="oldpass" placeholder="Mật khẩu cũ" onkeypress="return notAllowUnicode();"><br>
			<label>Mật khẩu mới</label><br>
			<input id="newpass" type=password name="newpass" placeholder="Mật khẩu mới" onkeypress="return notAllowUnicode();"><br>
			<label>Nhập lại mật khẩu mới</label><br>
			<input id="re-newrepass" type=password name="re-newpass" placeholder="Nhập lại mật khẩu mới" onkeypress="return notAllowUnicode();"><br>
			<input type=submit name="semiSubmit" value="Đổi mật khẩu">
		</form>
	</div>
</div>';
?>