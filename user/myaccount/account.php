<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');

$makh=GetMaKH($conn);
$isnv=0;

if ($makh!=""){
	if (!empty($_COOKIE['isnv']))
		$isnv=1;
	if ($isnv==1)
		$sqlCmd="SELECT HOTEN, DCHI, SODT, EMAIL, NGSINH, LOAI FROM NHANVIEN WHERE MANV='$makh'";
	else
		$sqlCmd="SELECT HOTEN, DCHI, SODT, EMAIL, NGSINH, DOANHSO FROM KHACHHANG WHERE MAKH='$makh'";
	$result=mysqli_query($conn,$sqlCmd);
	if (!empty($result))
	{
		if ($result->num_rows>0){
			while ($row = mysqli_fetch_assoc($result)){
				
				$hoten=$row['HOTEN'];
				$dchi=$row['DCHI'];
				$sodt=$row['SODT'];
				$email=$row['EMAIL'];
				$ngsinh=$row['NGSINH'];
				
				if ($isnv==1)
					$loai=$row['LOAI'];
				else
				{
					$doanhso=$row['DOANHSO'];
					$doanhso=round($doanhso);
					$doanhso=addDot($doanhso);
				}
				
				$ngay=substr($ngsinh,8);
				$thang=substr($ngsinh,5,2);
				$nam=substr($ngsinh,0,4);
				
				
				if ($isnv==1)
					echo '
					<form id="myaccount" name="myaccount" action="/user/myaccount/update-account-nv.php" method=POST onsubmit="return checkNullAccount();">
						<table>';
				else
					echo '
					<form id="myaccount" name="myaccount" action="/user/myaccount/update-account.php" method=POST onsubmit="return checkNullAccount();">
						<table>';
						if (isset($_COOKIE['update-account']))
						{
							echo'
							<tr>
								<td></td>
								<td></td>
								<td style="color:red; font-weight: bold;">Cập nhật thành công</td>
							</tr>';
						}
							echo'
							<tr>
								<td>Họ và tên: </td>
								<td><span class="important">* </span></td>
								<td><input type=text name="name" placeholder="Họ và tên của bạn" value="'.$hoten.'"></td>
								<td><i id="x-name" class="x-icon"></i></td>
							</tr>
							<tr>
								<td>Địa chỉ: </td>
								<td><span class="important">* </span></td>
								<td> <input type=text name="addr" placeholder="Địa chỉ nhà bạn" value="'.$dchi.'"></td>
								<td><i id="x-addr" class="x-icon"></i></td>
							</tr>
							<tr>
								<td>Số điện thoại: </td>
								<td><span class="important">*</span></td>
								<td><input type=text name="phone" placeholder="Số điện thoại liên lạc" onkeypress="return notAllowUnicodeNum();" value="'.$sodt.'"></td>						
								<td><i id="x-phone" class="x-icon"></i></td>
							</tr>
							<tr>
								<td>Mật khẩu: </td>
								<td><span class="important"></span></td>
								<td><a href="" onclick="return false;" id="change-pass-btn">Đổi mật khẩu</a></td>
								<td></td>
							</tr>
							<tr style="color: red; font-weight: bold;">
								<td></td>
								<td></td>
								<td>'; 
								
								if (isset($_COOKIE['changepass']))
									if ($_COOKIE['changepass']=='false')
									{
										echo'Mật khẩu chưa được thay đổi.';
									}
									else 
										echo'Mật khẩu đã được thay đổi thành công.';
									
								echo'</td>
							</tr>
							<tr>
								<td>Email: </td>
								<td><span class="important">* </span></td>
								<td><input type=text name="email" placeholder="Email của bạn" onkeypress="return notAllowUnicodeEmail();" value="'.$email.'"></td>
								<td><i id="x-email" class="x-icon"></i></td>
							</tr>';
							if ($isnv==1)
							{
								echo' 
								<tr>
									<td>Loại nhân viên: </td>
									<td><span class="important">* </span></td>
									<td><select id="addProduct" name="kind">';
									
										$products = array ("QLDH","QLSP");
										$proLength=count($products);
										for ( $i=0; $i < $proLength; $i++ )
										{
											if ($products[$i]==$loai)
												echo '<option value="'.$products[$i].'" selected>'.$products[$i].'</option>';
											else
												echo '<option value="'.$products[$i].'">'.$products[$i].'</option>';
										}
										echo'</select></td>
									<td><i id="x-kind" class="x-icon"></i></td>
								</tr>
								';
							}
							else
								echo'
							<tr>
								<td>Doanh số: </td>
								<td><span class="important"></span></td>
								<td><input type=text readonly="readonly" value="'.$doanhso.' VNĐ"></td>						
								<td></td>
							</tr>';
							echo'
							<tr>
								<td>Ngày sinh: </td>
								<td></td>
								<td>
									<select id="ngay" name="ngay">';
									for ($i=1; $i<32; $i++)
									{
										if ($i==$ngay)
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										else
											echo '<option value="'.$i.'">'.$i.'</option>';
									}
									echo '</select>';
									
									echo '<select id="thang" name="thang">';
									for ($i=1; $i<13; $i++)
									{
										if ($i==$thang)
											echo '<option value="'.$i.'" selected>Tháng '.$i.'</option>';
										else
											echo '<option value="'.$i.'">Tháng '.$i.'</option>';
									}
									echo '</select>';
									
									echo '<select id="nam" name="nam">';
									$curYear=intval(date("Y"));
									for ($i=$curYear; $i>=1900; $i--)
									{
										if ($i==$nam)
											echo '<option value="'.$i.'" selected>'.$i.'</option>';
										else
											echo '<option value="'.$i.'">'.$i.'</option>';
									}
									echo '</select>';
							echo'
								</td>
							</tr>
							<tr id="checkDate" style="color: red; font-weight: bold; visibility: hidden;">
								<td></td>
								<td></td>
								<td>Ngày không hợp lệ</td>
							</tr>';
							if ($isnv!=1)
							{
								echo '<tr>
									<td>Lịch sử đặt hàng: </td>
									<td><span class="important"></span></td>
									<td><a href="/?id=view-order" id="order-history">Lịch sử đặt hàng</a></td>
									<td></td>
								</tr>';
							}
						echo'
						</table>
							<input type=submit name="submit" value="Cập nhật thông tin">
					</form>
					';
					require_once "changePass-if.php";
			}
		}
	}	
}
?>