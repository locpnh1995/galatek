<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/isNVQLSP.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
$sohd=$trigia=$hoten=$makh=$dchi="";

$i=1;

echo '
	<h1>Các đơn hàng đang đợi</h1>
	<table id="myorder" cellspacing="4px" cellpadding="4px" rules=all frame=box>
		<thead>
			<th>STT</th>
			<th>Số Hóa Đơn</th>
			<th>Mã Khách Hàng</th>
			<th>Trị Giá Hóa Đơn</th>
			<th>Họ và Tên Khách Hàng</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th>Đơn hàng đã xác thực ?</th>
		</thead>
		<tbody>';

if (isNVQLSP($conn)==2){
	
	$sqlCmd="SELECT SOHD, KH.MAKH, TRIGIA, HOTEN, DCHI, SODT, TTDONHANG FROM HOADON HD, KHACHHANG KH WHERE KH.MAKH=HD.MAKH GROUP BY SOHD ORDER BY TTDONHANG";
	$result=mysqli_query($conn,$sqlCmd);
	if (!empty($result))
	{
		if ($result->num_rows>0){
			while ($row = mysqli_fetch_assoc($result)){
				
				$sohd=$row['SOHD'];
				$makh=$row['MAKH'];
				$trigia=$row['TRIGIA'];
				$trigia=addDot(substr($trigia,0,strlen($trigia)-5));
				$hoten=$row['HOTEN'];
				$dchi=$row['DCHI'];
				$sodt=$row['SODT'];
				$ttdonhang=$row['TTDONHANG'];
				
				echo '<tr>
						<td>'.$i.'</td>
						<td>'.$sohd.'</td>
						<td id="makh">'.$makh.'</td>
						<td>'.$trigia.'</td>
						<td>'.$hoten.'</td>
						<td>'.$dchi.'</td>
						<td>'.$sodt.'</td>
						<td>';
						if ($ttdonhang==1)
							echo '<img src="/images/v.png" width=22px height=22px />';
						else
							echo '<img src="/images/x.png" width=22px height=22px />';
						echo'</td>
						<td><a id="'.$sohd.'" class="view-order-details" href="" onclick="return false;">Xem</a></td>';
						if ($ttdonhang==0)
							echo'
						<td><a id="'.$sohd.'" class="ok" href="" onclick="return false;" />Xác nhận</form></td>
						<td><a id="'.$sohd.'" class="cancel" href="" onclick="return false;" />Hủy bỏ</form></td>';
				echo'
				</tr>';
				$i++;
			}
		}
	}	
	echo '</tbody>
	</table>
		<div id="order-details">
		</div>';
}
else
	echo '<p style="color: red; font-weight: bold">Bạn không có 213321quyền truy cập</p>';
				

?>