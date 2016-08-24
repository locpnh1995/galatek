<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/isNVQLSP.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
$sohd=$trigia=$hoten=$makh=$dchi="";

$i=1;



if (isNVQLSP($conn)==1){
	
	echo '
	<h1>Các hóa đơn</h1>
	<table id="myorder" cellspacing="4px" cellpadding="4px" rules=all frame=box>
		<thead>
			<th>STT</th>
			<th>Số Hóa Đơn</th>
			<th>Trị Giá Hóa Đơn</th>
			<th>Thanh Toán</th>
			<th>Giao Hàng</th>
		</thead>
		<tbody>';
	
	$sqlCmd="SELECT SOHD, MAKH, TRIGIA, THANHTOAN, GIAOHANG FROM HOADON WHERE TTDONHANG=1 GROUP BY SOHD ORDER BY GIAOHANG";
	$result=mysqli_query($conn,$sqlCmd);
	if (!empty($result))
	{
		if ($result->num_rows>0){
			while ($row = mysqli_fetch_assoc($result)){
				
				$sohd=$row['SOHD'];
				$makh=$row['MAKH'];
				$trigia=$row['TRIGIA'];
				$trigia=addDot(substr($trigia,0,strlen($trigia)-5));
				$thanhtoan=$row['THANHTOAN'];
				$giaohang=$row['GIAOHANG'];
				
				echo '<tr>
						<td>'.$i.'</td>
						<td >'.$sohd.'</td>
						<td>'.$trigia.'</td>
						<td>';
						if ($thanhtoan==1)
							echo '<img src="/images/v.png" width=22px height=22px />';
						else
							echo 'Thanh toán khi nhận hàng';
						echo '</td>
						<td>';
						if ($giaohang==1)
							echo '<img src="/images/v.png" width=22px height=22px />';
						else
							echo '<img src="/images/x.png" width=22px height=22px />';
						echo'</td>
						<td><a id="'.$sohd.'" class="view-order-details" href="" onclick="return false;">Xem</a></td>';
						if ($giaohang==0)
							echo'
						<td><a id="'.$sohd.'" class="delivered" href="" onclick="return false;" />Xác nhận đã giao hàng</form></td>';
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
	echo '<p style="color: red; font-weight: bold">Bạn không có quyền truy cập</p>';
				

?>