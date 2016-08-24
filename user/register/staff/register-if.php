<div id="register-form">
	<h2>Đăng ký</h2>
	<?php
		if(isset($_COOKIE['userExist']))
			echo '<h3 style="font-weight: bold; color: red;">User đã tồn tại !</h3>';
		if(isset($_COOKIE['emailExist']))
			echo '<h3 style="font-weight: bold; color: red;">Email đã tồn tại !</h3>';
		if(isset($_COOKIE['userAdded']))
			echo '<h3 style="font-weight: bold; color: red;">User đã được tạo thành công !</h3>';
	?>
	<form name="register" action="/user/register/staff/register.php" method=POST onsubmit="return checkNullRegister();">
		<table>
			<tr>
				<td>Họ và tên: </td>
				<td><span class="important">* </span></td>
				<td> <input type=text name="name" placeholder="Họ và tên của bạn" id="name"></td>
				<td><i id="x-name" class="x-icon"></i></td>
			</tr>
			<tr>
				<td>Địa chỉ: </td>
				<td><span class="important">* </span></td>
				<td> <input type=text name="addr" placeholder="Địa chỉ nhà bạn" id="addr"></td>
				<td><i id="x-addr" class="x-icon"></i></td>
			</tr>
			<tr>
				<td>Tên đăng nhập: </td>
				<td><span class="important">* </span></td>
				<td> <input type=text name="username" placeholder="Tên đăng nhập của bạn" onkeypress="return notAllowUnicode();" id="username"></td>
				<td><i id="x-username" class="x-icon"></i></td>
			</tr>
			<tr>
				<td>Mật khẩu: </td>
				<td><span class="important">* </span></td>
				<td> <input type=password name="pass" placeholder="Mật khẩu của bạn" onkeypress="return notAllowUnicode();" id="pass"></td>
				<td><i id="x-pass" class="x-icon"></i></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu: </td>
				<td><span class="important">* </span></td>
				<td> <input type=password name="repass" placeholder="Nhập lại mật khẩu bên trên" onkeypress="return notAllowUnicode();" onfocusout="checkRetypePass()" id="repass"></td>
				<td><i id="x-repass" class="x-icon"></i></td>
				<td id="checkRetypePass">Password nhập lại chưa chính xác !</td>
			</tr>
			<tr>
				<td>Số điện thoại: </td>
				<td><span class="important">* </span></td>
				<td> <input type=text name="phone" placeholder="Số điện thoại liên lạc" onkeypress="return notAllowUnicodeNum();" id="phone"></td>
				<td><i id="x-phone" class="x-icon"></i></td>			
			</tr>
			<tr>
				<td>Email: </td>
				<td><span class="important">* </span></td>
				<td> <input type=text name="email" placeholder="Email của bạn" onkeypress="return notAllowUnicodeEmail();" id="email"> </td>
				<td><i id="x-email" class="x-icon"></i></td>
			</tr>
			<tr>
				<td>Ngày sinh: </td>
				<td></td>
				<td><?php
					echo '<select id="ngay" name="ngay">';
					for ($i=1; $i<32; $i++)
					{
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
					echo '</select>';
					
					echo '<select id="thang" name="thang">';
					for ($i=1; $i<13; $i++)
					{
						echo '<option value="'.$i.'">Tháng '.$i.'</option>';
					}
					echo '</select>';
					
					echo '<select id="nam" name="nam">';
					$curYear=intval(date("Y"));
					for ($i=$curYear; $i>=1900; $i--)
					{
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
					echo '</select>';
				?>
				</td>
			</tr>
			<tr id="checkDate" style="color: red; font-weight: bold; visibility: hidden;">
				<td></td>
				<td></td>
				<td>Ngày không hợp lệ</td>
			</tr>
			<tr>
				<td>Loại nhân viên: </td>
				<td><span class="important">* </span></td>
				<td><select id="addProduct" name="kind">';
				<?php
					$products = array ("QLDH","QLSP");
					$proLength=count($products);
					for ( $i=0; $i < $proLength; $i++ )
					{
						echo '<option value="'.$products[$i].'">'.$products[$i].'</option>';
					}
					?></select></td>
				<td><i id="x-kind" class="x-icon"></i></td>
			</tr>
		</table>
		<input type=submit name="submit" value="Đăng ký">
	</form>
</div>
</div>