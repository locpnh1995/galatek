<?php


echo '
	<div id="dat-hang">
		
		<div id="cach-thanh-toan">
			<h2>Cách thức thanh toán</h2>
			<div id="thanh-toan-selector" class="clearfix">
				<ul>
					<li id="1" class="selected">
					<a href="" onclick="return false;">
						<span>Thanh toán <br>chuyển khoản</span>
						<img src="/images/chuyenkhoan.png">
					</a>
					</li>
					<li id="2">
					<a href="" onclick="return false;">
						<span>Thanh toán <br>trực tuyến</span>
						<img src="/images/online.png">
						</a>
					</li>
					<li id="3">
					<a href="" onclick="return false;">
						<span>Thanh toán <br>khi nhận hàng</span>
						<img src="/images/nhanhang.png">
						</a>
					</li>
				</ul>
			</div>
			<div id="thanh-toan-content">';
			include_once"chuyenkhoan.html";
			echo'</div>
		</div>
	</div>
</div>
			';

if(isset($_POST['sohd']))
{
	require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
	include_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
	
	$sohd=$_POST['sohd'];
	$triGia=$_POST['trigia'];
	$makh=GetMaKH($conn);
	
	$sqlCmd="UPDATE HOADON SET THANHTOAN=1 WHERE MAKH='$makh' AND SOHD='$sohd'";
	mysqli_query($conn,$sqlCmd);
	
	$sqlCmd="SELECT DOANHSO FROM KHACHHANG WHERE MAKH='$makh'";
	$row=mysqli_fetch_assoc(mysqli_query($conn,$sqlCmd));
	
	$triGiaHT=$row['DOANHSO'];
	
	$triGiaHT+=$triGia;
	
	$sqlCmd="UPDATE KHACHHANG SET DOANHSO='$triGiaHT' WHERE MAKH='$makh'";
	mysqli_query($conn,$sqlCmd);

	mysqli_close($conn);
}
?>
