<?php

		$makh=GetMaKH($conn);
		$sqlCmd="SELECT HOTEN, DCHI, SODT, EMAIL FROM KHACHHANG WHERE MAKH='$makh'";
		$result=mysqli_query($conn,$sqlCmd);
		$row=mysqli_fetch_assoc($result);
		$hoten=$row['HOTEN'];
		$dchi=$row['DCHI'];
		$sodt=$row['SODT'];
		$email=$row['EMAIL'];
		
		echo'</tbody>
		</table>
		</div>
		<div id="thanh-toan">
		<table>
			<thead>
				<tr>
					<th colspan=2> Thông tin đơn hàng </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Số hóa đơn:</td>
					<td id="'.$sohd.'">'.$sohd.'</td>
				</tr>
				<tr>
					<td>Họ và tên:</td>
					<td>'.$hoten.'</td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td>'.$dchi.'</td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td>'.$sodt.'</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>'.$email.'</td>
				</tr>
				<tr id="'.$triGia.'">
					<td>Thành tiền:</td>';
					if ($triGia=='Chưa có')
						echo'<td>'.$triGia.'</td>';
					else
						echo'<td>'.$triGia.' VNĐ</td>';
				echo'</tr>
			';
		
		
echo '		</tbody>
		</table>';
?>