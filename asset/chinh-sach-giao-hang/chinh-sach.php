	<div id="nor-content">
		<div>
		    <div class="tooltip">
		        <img class=" imafade" src="http://i.imgur.com/tixXwUw.png" alt="">
		        <span class="tooltiptext">Chúng tôi hỗ trợ thanh toán và nhận hàng trên toàn lãnh thổ Việt Nam</span>
		    </div>
		    <div class="tooltip">
		        <img class=" imafade" src="http://i.imgur.com/w8dPmn4.png" alt="">
		        <span class="tooltiptext">Dịch vụ giao hàng siêu tốc 24h tại Thành phố Hồ Chí Minh</span>
		    </div>
		    <div class="tooltip">
		        <img class=" imafade" src="http://i.imgur.com/ioatBU9.png" alt="">
		        <span class="tooltiptext">Galatek cam kết cung cấp các sản phẩm chính hãng từ các thương hiệu hàng đầu</span>
		    </div>
		    <div class="tooltip">
		        <img class=" imafade" src="http://i.imgur.com/eqxVpn3.png" alt="">
		        <span class="tooltiptext">Dịch vụ tư vấn và  hỗ trợ lắp đặt, cài đặt chuyên nghiệp cho khách hàng</span>
		    </div>
		    <div class="tooltip">
		        <img class=" imafade" src="http://i.imgur.com/TsDpbKu.png" alt="">
		        <span class="tooltiptext">Chính sách bảo hành siêu tốc một đổi một trong vòng 1h</span>
		    </div>
		</div>
		<div style="text-align: center;">
		    <h2 style="color: #039FDA">Chính sách giao hàng và bảo hành của Galatek</h2>
		     <div id="place-nav">
		        <a href="?id=chinh-sach-giao-hang&chinh-sach=hcm#place-nav"><img id ="area" src="http://i.imgur.com/tFVMa18.jpg" alt="HCM"></a>
		        <a href="?id=chinh-sach-giao-hang&chinh-sach=hn#place-nav"><img id ="area" src="http://i.imgur.com/9ujfonD.jpg" alt="HN"></a>
		        <a href="?id=chinh-sach-giao-hang&chinh-sach=dn#place-nav"><img id ="area" src="http://i.imgur.com/a8xrODy.jpg" alt="DN"></a>
		        <a href="?id=chinh-sach-giao-hang&chinh-sach=khac#place-nav"><img id ="area" src="http://i.imgur.com/8tKN7w9.jpg" alt="KHAC"></a>
		    </div>
		    <h3>Quý khách vui lòng chọn đúng khu vực giao hàng !</h3>
        </div>
		<?php 
			if (isset($_GET['chinh-sach']))
			{
				$khuVuc=$_GET['chinh-sach'];
				
				switch ($khuVuc){
					case "hcm":
						include "chinh-sach-hcm.html";
						break;
					case "hn":
						include "chinh-sach-hn.html";
						break;
					case "dn":
						include "chinh-sach-dn.html";
						break;
					case "khac":
						include "chinh-sach-khac.html";
						break;
				}
			}
			else
				echo '
		    <div id="chinhsach">
               <p style="color: crimson">* Quy định bảo hành</p>
                <h3>1. Điều kiện bảo hành:</h3>
                <p>- Tất cả các  thiết bị phải có tem bảo hành của Galatek, tem còn trong thời gian bảo hành sẽ được bảo hành và hỗ trợ đúng quy định của Galatek</p>
                <p>- Những hư hỏng của thiết bị được xác định do lỗi kỹ thuật hoặc lỗi từ nhà sản xuất.(thẻ nhớ không đọc được dữ liệu, không Format, không ghi đọc sao chép được)</p>
                <p>- Các sản phẩm và thiết bị có kèm theo phiếu bảo hành của Galatek, trên phiếu bảo hành có ghi rõ các điều kiện bảo hành , địa điểm bảo hành quyền lợi của khách hàng... Khách hàng cần xuất trình phiếu bảo hành khi bảo hành trực tiếp tại trung tâm bảo hành của Galatek.</p>
                <h3>2. Không bảo hành trong các trường hợp sau:</h3>
                <p>- Thiết bị không có tem bảo hành của Galatek</p>
                <p>- Trên thiết bị,  mã vạch, chỉ số dung lượng , tem bảo hành , số serial number bị rách, mờ hay có dấu hiệu chấp vá, cạo sửa…</p>
                <p>- Thiết bị, phụ kiện, trầy xước, bể, mẻ, cong, cháy nổ... (thẻ nhớ bị gãy, bị biến dạng, cháy nổ ,do hóa chất, va đập mạnh )</p>
                <p>- Thiết bị đã được sử dụng trong môi trường ẩm ướt, bụi bậm, từ trường cao, bị oxy hóa, hay trực tiếp dưới ánh nắng mặt trời và có dấu hiệu cháy nổ, do dùng nguồn điện không ổn định  hoặc do côn trùng, chuột bọ phá hoại, hoặc hư hỏng do thiên tai, hỏa hoạn.</p>
                <p>- Galatek không chịu trách nhiệm bảo hành dữ liệu có chứa trong thiết bị lưu trữ của khách hàng khi bảo hành thiết bị. ( ngoài ra Galatek có thể hỗ trợ khách hàng lấy được lại dữ liệu nếu còn có thể )</p>
                <h3>3. Phương thức bảo hành :</h3>
                <p>- Sản phẩm được bảo hành bằng cách đổi sản phẩm  tương tự khi còn trong mục 1- Điều Kiện bảo hành</p>
                <p>- Đối với sản phẩm tem còn bảo hành nhưng nằm trong trường hợp 2 - không được bảo hành, Galatek chỉ tạm nhận hỗ trợ, trong quá trình hỗ trợ nếu phát sinh chi phí, và sẽ thông báo đến khách hàng trước khi xử lý.</p>
            </div>'
		?>
	</div>