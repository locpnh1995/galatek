<div id="center">
<ul id="san-pham" class="clearfix">
<?php
	include ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/addDot.php');
	
	require ($_SERVER['DOCUMENT_ROOT'].'/thu-vien/connect.php');
	$sqlCmd="select masp, tensp, links, gia from SANPHAM LIMIT 6";
	
	if (isset($_GET['search']))
	{
		$sqlCmd="select masp, tensp, links, gia from SANPHAM";
		$search=$_GET['search'];
		
		$sub=substr($search,0,6);

		if ($sub=="kindof") //người dùng nhấp vào thanh menu bên trái
		{
			$strArr = explode('-',$search);
			$isSearch=false;
			$sub=substr($strArr[0],6);
			$sqlCmd="select masp, tensp, links, gia from SANPHAM WHERE LOAI='$sub'";
		}
		else //người dùng sử dụng thanh search
		{
			$strArr = explode(' ',$search);
			$isSearch=true;
		}
		
		$strArrLength=count($strArr);
		
		if ($isSearch)
			$i=0;
		else
			$i=1;	

		for ($i; $i< $strArrLength; $i++ )	
		{			
			if($i==0)
				$sqlCmd.= " WHERE (TENSP LIKE '% $strArr[$i]' OR TENSP LIKE '$strArr[$i] %' OR TENSP LIKE '% $strArr[$i] %')";
			else
				$sqlCmd .= " AND (TENSP LIKE '% $strArr[$i]' OR TENSP LIKE '$strArr[$i] %' OR TENSP LIKE '% $strArr[$i] %')";
		}
	}	
	
	require ($_SERVER['DOCUMENT_ROOT'].'/san-pham/printProducts.php');
	
	
	mysqli_close($conn);
echo '</ul>';
	if (!isset($_GET['search']))
		include  ($_SERVER['DOCUMENT_ROOT'].'/trang-chu/load-more.html');
echo '</div>';

?>