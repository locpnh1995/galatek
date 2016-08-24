<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
	
	$doc=$_POST['doc'];
	$ghi=$_POST['ghi'];
	$baohanh=$_POST['baohanh'];
	$links=$_POST['hinh1'].';'.$_POST['hinh2'].';'.$_POST['hinh3'];
	$masp=$_POST['masp'];
	
	$sqlCmd="UPDATE SANPHAM SET DOC=$doc, GHI=$ghi, BAOHANH=$baohanh, LINKS='$links' WHERE masp='$masp'";
	
	
	$result=mysqli_query($conn,$sqlCmd);
	
	if ($result){
		$masp+=1;
		$len=strlen($masp);
		for ($i=0;$i<10-$len;$i++)
			$masp='0'.$masp;
		
		
		$header='Location: /?id=product'.$masp;
		
		header ($header);
	}
	else
		echo 'Nhập cơ sở dữ liệu bị lỗi';

	mysqli_close($conn);
?>
