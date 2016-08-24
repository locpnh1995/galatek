<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
$i=1;
$makh=GetMaKH($conn);
echo '
	<h1>Các hóa đơn của bạn</h1>
	<table id="myorder" cellspacing="4px" cellpadding="4px" rules=all frame=box>
		<thead>
			<th>STT</th>
			<th>Số Hóa Đơn</th>
			<th>Trị Giá Hóa Đơn</th>
			<th>Thanh Toán</th>
			<th>Giao Hàng</th>
		</thead>';
if ($makh!=""){
	$sqlCmd="SELECT SOHD, MAKH, TRIGIA, THANHTOAN, GIAOHANG FROM HOADON WHERE MAKH='$makh' ";
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
							echo '<img src="/images/x.png" width=22px height=22px />';
						echo '</td>
						<td>';
						if ($giaohang==1)
							echo '<img src="/images/v.png" width=22px height=22px />';
						else
							echo '<img src="/images/x.png" width=22px height=22px />';
						echo '</td>
						<td><a id="'.$sohd.'" class="view-order-details" href="" onclick="return false;">Xem</a></td>
				</tr>';
				$i++;
			}
		}
	}	
}
echo'
						</table>
		<div id="order-details">
		</div>';
?>
