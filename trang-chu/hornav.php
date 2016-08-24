<?php
	
	$active="hornav-active";
	$a=array (0,'gioi-thieu'=>1,'hang-moi'=>2,'khuyen-mai'=>3,'nha-cung-cap'=>4,'thanh-toan'=>5,'chinh-sach-giao-hang'=>6,'lien-he'=>7);
	
	if (isset($_GET['id']))
		$a[$_GET['id']]=$active;
	else
		$a[0]=$active;
	
	echo'
		<div class="imenu"></div>
		<ul>
			<li><a href="/" id="'.$a[0].'">Trang chủ</a></li>
			<li><a href="/?id=gioi-thieu#hornav" id="'.$a['gioi-thieu'].'">Giới thiệu</a></li>
			<li><a href="/?id=hang-moi#hornav" id="'.$a['hang-moi'].'">Hàng mới</a></li>

			<li><a href="/?id=nha-cung-cap#hornav" id="'.$a['nha-cung-cap'].'">Nhà cung cấp</a></li>
			<li><a href="/?id=thanh-toan#hornav" id="'.$a['thanh-toan'].'">Thanh toán</a></li>
			<li><a href="/?id=chinh-sach-giao-hang#hornav" id="'.$a['chinh-sach-giao-hang'].'">Chính sách giao hàng</a></li>
			<li><a href="/?id=lien-he#hornav" id="'.$a['lien-he'].'">Liên hệ</a></li>
		</ul>';
					//<li><a href="/?id=khuyen-mai#hornav" id="'.$a['khuyen-mai'].'">Khuyến mãi</a></li>
?>