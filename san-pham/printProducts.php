<?php
$masp=$tensp=$gia=$thongtin=$luotxem=$links='';
$noProduct='<p id="no-product"> Không tìm thấy sản phẩm nào !</p>';

require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/isAdmin.php');

$result= mysqli_query($conn,$sqlCmd);

if (isset($_GET['id']))
{
	if (substr($_GET['id'],0,7)=='product') //nếu là xem chi tiết sản phẩm
	{
		
		echo '<div id="productDetails">';
		if (!empty($result))
		{
			if ($result->num_rows>0){
				while ($row = mysqli_fetch_assoc($result)){

					$tensp=$row['tensp'];

					

					$gia=$row['gia'];
					$gia=addDot($gia);
					
					$masp = $row['masp'];
					
					$luotxem=$row['luotxem']+1;
					
					$thongtin = $row['thongtin'];
					
					$doc = $row['doc'];
					
					$ghi = $row['ghi'];
					
					$baohanh = $row['baohanh'];
					
					$links=$row['links'];
					
					$linksArray = explode(';',$links);

					$updateLX="update SANPHAM SET LUOTXEM=$luotxem where masp='$masp'";
					mysqli_query($conn,$updateLX);
					
					echo '<h1>'.$tensp.'</h1>
					<div id="product" class="clearfix">
						<div id="images">
							<div id="images-selector">';
							if (count($linksArray)==4)
								echo '
								<img src="'.$linksArray[1].'" onclick="LoadImage(this)" class="imgActive">
								<img src="'.$linksArray[2].'" onclick="LoadImage(this)">
								<img src="'.$linksArray[3].'" onclick="LoadImage(this)">';
							echo'
							</div>
							<div id="image">
								<img src="'.$linksArray[1].'">
							</div>
						</div>
						<div id="product-right">
							<span class="gia">Giá: '.$gia.' VNĐ</span>
							<span class="viewed">Lượt xem: '.$luotxem.'</span>
							<table>
								
									<thead>
										<tr>
											<th colspan=2>Thông số kỹ thuật</th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td>Tốc độ đọc</td>
										<td>'.$doc.' Mb/s</td>
									</tr>
									<tr>
										<td>Tốc độ ghi</td>
										<td>'.$ghi.' Mb/s</td>
									</tr>
									<tr>
										<td>Bảo hành</td>
										<td>'.$baohanh.' năm</td>
									</tr>
								</tbody>
							</table>
							<a id="'.$masp.'" class="mua" href="" onclick="return false;">Mua Ngay</a>
							<div id="previous-next" class="clearfix">
								<a id="previous" href=""><< Sản phẩm trước</a>
								<a id="next" href="">Sản phẩm kế >></a>
							</div>';
							if ($admin)
								echo '<a class="xoa-sp" href="" onclick="return false;">Xóa Sản Phẩm này</a>';
						echo'</div>
					</div>';
					if (isset($_COOKIE['ckUsername']))
					{
						if ($_COOKIE['ckUsername']== 'quynhtv')
						{
							if ($masp>35)
							{
								include "productForm.html";
								echo '<input style="visibility: hidden" type=text name="masp" value='.$masp.'></input>';
								echo'</form>
									</div>';
							}
							else
								echo '<p> Cái này của thằng Hào làm, chú làm cái <strong>Mã Sản Phẩm</strong> > 35 ấy.</p>';
						}
						else
							if ($_COOKIE['ckUsername']== 'haond')
							{
								if ($masp<36)
								{
									include "productForm.html";
									echo '<input style="visibility: hidden" type=text name="masp" value='.$masp.'></input>';
									echo'</form>
									</div>';
								}
								else
									echo '<p> Cái này của thằng Quỳnh làm, chú làm cái <strong>Mã Sản Phẩm</strong> < 35 ấy.</p>';
							}
					}
					else
						if (isset($_SESSION['user']))
							if ($_SESSION['user'] == 'quynhtv')
							{
								if ($masp>35)
								{
									include "productForm.html";
									echo '<input style="visibility: hidden" type=text name="masp" value='.$masp.'></input>';
									echo'</form>
									</div>';
								}
								else
									echo '<p> Cái này của thằng Hào làm, chú làm cái <strong>Mã Sản Phẩm</strong> > 35 ấy.</p>';
							}
							else
								if ($_SESSION['user'] == 'haond')
								{
									if ($masp<36)
									{
										include "productForm.html";
										echo '<input style="visibility: hidden" type=text name="masp" value='.$masp.'></input>';
										echo'</form>
									</div>';
										
									}
									else
										echo '<p> Cái này của thằng Quỳnh làm, chú làm cái <strong>Mã Sản Phẩm</strong> < 35 ấy.</p>';
								}
							
					echo'
					<div id="ctsp">
					<h1 id="details">Chi tiết sản phẩm</h1>
					<p>'.$thongtin.'</p>
					</div>
					';
					
				}
				
			}
			else
				if (isset($_POST['id']) && !empty($_POST['id'])) //nếu là load-more
				{			
					echo $noMore;
				}
				else //nếu là search hoặc dùng thanh menu bên trái
				{
					echo $noProduct;
				}
		}
		else
			if (isset($_POST['id']) && !empty($_POST['id']))
			{			
				echo $noMore;
			}
			else 
			{
				echo $noProduct;
			}
			echo '</div>';
	}
}
else //nếu là ở trang chủ
{
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
				
				echo '<li id="'.$masp.'"><a class="view-product" href="?id=product'.$masp.'"><span class="tensp">'.$tensp.'</span><img src="'.$links[0].'"/><span class="gia">'.$gia.' VND</span><a class="mua" href="" onclick="return false;">Mua Ngay</a>'; if ($admin) echo'<a class="xoa-sp" href="" onclick="return false;">Xóa SP này</a>'; echo'</li>';
				
			}
		}
		else
			if (isset($_POST['id']) && !empty($_POST['id'])) //nếu là load-more
			{			
				echo $noMore;
			}
			else //nếu là search hoặc dùng thanh menu bên trái
			{
				echo $noProduct;
			}
	}
	else
		if (isset($_POST['id']) && !empty($_POST['id']))
			{			
				echo $noMore;
			}
			else
			{
				echo $noProduct;
			}
}
?>
