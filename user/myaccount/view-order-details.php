<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');

$sohd=$_GET['sohd'];
echo'<div id="cart">
		<h1> Giỏ hàng của bạn </h1>
		<div id="danh-muc-sp">
		<table>
			<thead>
				<tr>
					<th colspan=2> Sản phẩm </th>
					<th> Giá </th>
					<th> Số lượng </th>
				</tr>
			</thead>
			<tbody>';
		
		
		$getCart="SELECT CTHD.MaSP, LINKS, TENSP, SL, GIA, TRIGIA, HOADON.SOHD FROM SANPHAM INNER JOIN CTHD ON CTHD.MASP=SANPHAM.MASP INNER JOIN HOADON ON CTHD.SoHD=HOADON.SoHD WHERE HOADON.SOHD='$sohd' GROUP BY MASP";
		$getCartResult=mysqli_query($conn,$getCart);
		
		if (!empty($getCartResult))
		{
			if ($getCartResult->num_rows>0){
				while ($row = mysqli_fetch_assoc($getCartResult)){
					$links=$row['LINKS'];
					$links=explode(';',$links);
					$tensp=$row['TENSP'];
					$gia=$row['GIA'];
					$gia=addDot($gia);
					$sl=$row['SL'];
					$masp=$row['MaSP'];
					$sohd=$row['SOHD'];
					
					echo '<tr>';
						echo '<td><img src="'.$links[0].'"></td>';
						echo '<td><a href="/?id=product'.$masp.'" target="_blank">'.$tensp.'</a></td>';
						echo '<td>'.$gia.'</td>';
						echo '<td>'.$sl.'</td>';
					echo '</tr>';
				}
			}
		}

?>