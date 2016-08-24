<?php

$masp=$_POST['masp'];
$tensp=$links=$gia=$SLSP=$triGia='';

require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/get.php');

$sqlCmd="SELECT masp, tensp, links, gia FROM SANPHAM WHERE MASP='$masp'";

$result= mysqli_query($conn,$sqlCmd);

	if (!empty($result))
	{
		if ($result->num_rows>0){
			while ($row = mysqli_fetch_assoc($result)){

				$tensp=$row['tensp'];

				$links=$row['links'];
				$links=explode(';',$links);

				$gia=$row['gia'];
				
				$gia=addDot($gia);
				
				$masp = $row['masp'];

				$makh=GetMaKH($conn);
				$getSLSP="SELECT COUNT(MASP) AS SL FROM CTHD INNER JOIN HOADON ON CTHD.SoHD=HOADON.SoHD WHERE HOADON.MAKH='$makh' AND HOADON.THANHTOAN=0";
				$getResult=mysqli_query($conn,$getSLSP);
				while ($row = mysqli_fetch_assoc($getResult)){
					$SLSP+=$row['SL'];
				}
				
				$triGiaResult=GetTriGiaMaxHD($conn,$makh);
				if ($triGiaResult != '')
				{
					$triGia=$triGiaResult['TriGia'];
					$triGia=addDot(round($triGia));
				}
				else
					$triGia =0;
				
				echo '<div id="buy-now">
					<div id="buy-now-left">
						<h3 id="'.$masp.'">Bạn sẽ thêm sản phẩm sau vào giỏ hàng</h3>
						<img style="float: left; margin: 0% 2%;" src="'.$links[0].'">
						<div id="info">
							<p class="tensp">'.$tensp.'</p>
							<p class="gia">Giá: '.$gia.' VNĐ</p>
						</div>
					</div>
					<div id="middle-line" style="float: left; width: 2px; background-color: #dddddd">
					</div>
					<div id="buy-now-right">
						<a class="giohang" href="" onclick="return false;"><h3>Giỏ hàng của tôi </h3> <img src="/images/cart.png" height=30 width=30> 
						<span class="countCart"> ('.$SLSP.' sản phẩm)</span></a>
						<a class="closeButton" href="" onclick="return closeCart();"></a>
						<form name="soluong">
							<lable id="so-luong-lable">Số lượng</lable>
							<input id="soluong" name="soluong" type=number min=0 max=10 value=1 placeholder="Số lượng"></input>
						</form>
						<span class="addFailed" style="color: red; font-weight: bold; opacity: 0">Số lượng không hợp lệ. TỐI ĐA 10 sản phẩm</span>
						<a id="mua-tiep" href="" onclick="return false;">Thêm vào giỏ hàng và tiếp tục mua sắm</a>
						<span id="thanh-tien">Thành tiền: '.$triGia.' VNĐ</span>
						<a class="thanh-toan" href="" onclick="return false;">Thanh Toán</a>
					</div>
					<div id="bottom-line" style="clear: both; height: 2px; background-color: #dddddd">
					</div>
				</div>';
			}
			
		}
	}
?>
