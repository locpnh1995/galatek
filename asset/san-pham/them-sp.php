 <?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/isAdmin.php');

if ($admin==true || isNVQLSP($conn)==1)
{
	echo'<div id="updatesp-form">
		<h2>Nhập thông tin sản phẩm</h2>';
			if (!empty($_COOKIE['lastUpdate']))
			{
				echo '<p style="color: red; font-weight: bold;"> Cập nhật thành công</p>';
			}
		echo'
		<form name="updatesp" action="/asset/san-pham/updatesp.php" method=POST onsubmit="return ktNull();">
			<table>
				<tr>
					<td>Tên sản phẩm: </td>
					<td><span class="important">* </span></td>
					<td> <input type=text id="tensp" name="tensp" placeholder="Tên của sản phẩm" autofocus></td>
					<td><i id="x-tensp" class="x-icon"></i></td>
				</tr>
				<tr>
					<td>Thông tin chi tiết: </td>
					<td><span class="important">* </span></td>
					<td> <input  type=text id="details" name="details" placeholder="Thông tin chi tiết của sản phẩm"></td>
					<td><i id="x-details" class="x-icon"></i></td>
				</tr>
				<tr>
					<td>Giá: </td>
					<td><span class="important">* </span></td>
					<td> <input type=text id="price" name="price" placeholder="Giá của sản phẩm" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="return addDot();"></td>
					<td><i id="x-price" class="x-icon"></i></td>
				</tr>
				<tr>
					<td>Loại sản phẩm: </td>
					<td><span class="important">* </span></td>
					<td><select id="addProduct" name="kind">';
				
						$products = array ("MicroSD","SD","SSD","RAM","2.0","3.0");
						$proLength=count($products);
						for ( $i=0; $i < $proLength; $i++ )
						{
							echo '<option value="'.$products[$i].'">'.$products[$i].'</option>';
						}
						echo'</select></td>
					<td><i id="x-kind" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Tốc độ đọc</label></td>
					<td><span class="important">* </span></td>
					<td><input id="doc" type=text name="doc" placeholder="Tốc độ đọc của sản phẩm"></input></td>
					<td><label>Mb/s</label></td>
					<td><i id="x-doc" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Tốc độ ghi</label></td>
					<td><span class="important">* </span></td>
					<td><input id="ghi" type=text name="ghi" placeholder="Tốc độ ghi của sản phẩm"></input></td>
					<td><label>Mb/s</label></td>
					<td><i id="x-ghi" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Bảo hành</label></td>
					<td><span class="important">* </span></td>
					<td><input id="baohanh" type=text name="baohanh" placeholder="Thời gian bảo hành của sản phẩm"></input></td>
					<td><label>năm</label></td>
					<td><i id="x-baohanh" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Hình 1</label></td>
					<td><span class="important">* </span></td>
					<td> <input type=text id="hinh1" name="hinh1" placeholder="Link hình 1 của sản phẩm"></td>
					<td><i id="x-hinh1" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Hình 2</label></td>
					<td><span class="important">* </span></td>
					<td><input id="hinh2" type=text name="hinh2" placeholder="Link hình 2 của sản phẩm"></input></td>
					<td><i id="x-hinh2" class="x-icon"></i></td>
				</tr>	
				<tr>
					<td><label>Hình 3</label></td>
					<td><span class="important">* </span></td>
					<td><input id="hinh3" type=text name="hinh3" placeholder="Link hình 3 của sản phẩm"></input></td>
					<td><i id="x-hinh3" class="x-icon"></i></td>
				</tr>
				<tr>
					<td><label>Hình 4</label></td>
					<td><span class="important">* </span></td>
					<td><input id="hinh4" type=text name="hinh4" placeholder="Link hình 4 của sản phẩm"></input></td>
					<td><i id="x-hinh4" class="x-icon"></i></td>
				</tr>
			</table>
			<input type=submit name="submit" value="Nhập">
		</form>
	</div>';
}
else
	echo '<p style="color: red; font-weight: bold">Bạn không có quyền truy cập</p>';
?>