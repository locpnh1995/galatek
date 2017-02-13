//responsive

var isLoadMore = true;

$(window).scroll(function(){
	if ($(document).height()-$(window).scrollTop()<850)
	{
		isLoadMore = false;
		console.log("tới tháng");
		var searchQuerry=window.location.search;
		var id=searchQuerry.substr(searchQuerry.length-10);
		var isIndex=true;
		if (searchQuerry.substr(4,7)=='product')
			isIndex=false;
		if(searchQuerry.substr(1,6)=='search')
		{
			$(document.body).animate({
			'scrollTop':
				$('#center').offset().top}, 750);
		}
		if (!isIndex)
		{
			id=parseInt(id);
			$('#previous').attr('href','http://'+window.location.hostname+'/?id=product'+isNext(id,'previous')+'#productDetails');
			$('#next').attr('href','http://'+window.location.hostname+'/?id=product'+isNext(id,'next')+'#productDetails');
			var doc=document.getElementById('doc');
			if(doc!=null)
				doc.focus();
		}
		
		var load=document.getElementsByClassName('load-more')[0];
		load.style.pointerEvents = 'none';
		load.style.backgroundColor=load.style.color='#eeeeee';
		load.style.border='none';

		$('.more').attr('src','/images/load-more.gif');

		var xemThem=document.getElementById('xem-them');

		xemThem.innerHTML='Xin chờ...';

		var ID = $('#san-pham li:last-child').attr('id');
		$.ajax({
			type: 'POST',
			url: '/trang-chu/load-more.php',
			data: 'id='+ID,
			success: function(html){
				load.style.pointerEvents = 'auto';
				load.style.backgroundColor=load.style.color='white';
				load.style.border='1px solid #4E5557';
				xemThem.innerHTML='Xem thêm...';
				$('#no-more').remove();
				$('#san-pham').append(html);
				$('.more').attr('src','/images/circle-arrow.png');
				isLoadMore = true;
			},
			async: false
		});
		
	}
});

$(document).ready(function() {

		$(".imenu").click(function(){

			$("ul").toggleClass("active-m");

			$(this).toggleClass("open");

		});
		
		

});



//Load Slider

$(window).load(function() {

        $('#slider').nivoSlider();

});



//Load Vernav



$(function() { //left menu

    var menu_ul = $('.menu > li > ul'),

	menu_a  = $('.menu > li > a');

    menu_ul.hide();

    menu_a.click(function(e) {

        e.preventDefault();

        if(!$(this).hasClass('active')) {

            menu_a.removeClass('active');

            menu_ul.filter(':visible').slideUp('normal');

            $(this).addClass('active').next().stop(true,true).slideDown('normal');

        } else {

            $(this).removeClass('active');

            $(this).next().stop(true,true).slideUp('normal');

        }

    });

});



//Load Filter

$(document).ready(function(){

	$(".tab1 .single-bottom").hide();

	$(".tab2 .single-bottom").hide();

	$(".tab3 .single-bottom").hide();

	$(".tab4 .star-at").hide();

	$(".tab1 ul").click(function(){

		$(".tab1 .single-bottom").slideToggle(300);

		$(".tab2 .single-bottom").hide();

		$(".tab3 .single-bottom").hide();

		$(".tab4 .star-at").hide();

	})

	$(".tab2 ul").click(function(){

		$(".tab2 .single-bottom").slideToggle(300);

		$(".tab1 .single-bottom").hide();

		$(".tab3 .single-bottom").hide();

		$(".tab4 .star-at").hide();

	})

	$(".tab3 ul").click(function(){

		$(".tab3 .single-bottom").slideToggle(300);

		$(".tab4 .star-at").hide();

		$(".tab2 .single-bottom").hide();

		$(".tab1 .single-bottom").hide();

	})

	$(".tab4 ul").click(function(){

		$(".tab4 .star-at").slideToggle(300);

		$(".tab3 .single-bottom").hide();

		$(".tab2 .single-bottom").hide();

		$(".tab1 .single-bottom").hide();

	})

});



//Load more

$(document).ready(function(){
	var searchQuerry=window.location.search;
		var id=searchQuerry.substr(searchQuerry.length-10);
		var isIndex=true;
		if (searchQuerry.substr(4,7)=='product')
			isIndex=false;
		if(searchQuerry.substr(1,6)=='search')
		{
			$(document.body).animate({
			'scrollTop':
				$('#center').offset().top}, 750);
		}
	if (!isIndex)
	{
		id=parseInt(id);
		$('#previous').attr('href','http://'+window.location.hostname+'/?id=product'+isNext(id,'previous')+'#productDetails');
		$('#next').attr('href','http://'+window.location.hostname+'/?id=product'+isNext(id,'next')+'#productDetails');
		var doc=document.getElementById('doc');
		if(doc!=null)
			doc.focus();
	}
	
	$(document).on('click','.load-more',function(){

		var load=this;
		load.style.pointerEvents = 'none';
		load.style.backgroundColor=load.style.color='#eeeeee';
		load.style.border='none';

		$('.more').attr('src','/images/load-more.gif');

		var xemThem=document.getElementById('xem-them');

		xemThem.innerHTML='Xin chờ...';

		var ID = $('#san-pham li:last-child').attr('id');
		$.ajax({
			type: 'POST',
			url: '/trang-chu/load-more.php',
			data: 'id='+ID,
			success: function(html){
				load.style.pointerEvents = 'auto';
				load.style.backgroundColor=load.style.color='white';
				load.style.border='1px solid #4E5557';
				xemThem.innerHTML='Xem thêm...';
				$('#no-more').remove();
				$('#san-pham').append(html);
				$('.more').attr('src','/images/circle-arrow.png');
				
			}
		});

	});
	
	$(document).on('click','.xoa-sp',function(){ //update this
		var tensp=$(this).siblings('.view-product').children('.tensp').text();
		var remove=confirm('Bạn có chắc muốn xóa sản phẩm "'+tensp+'" không ?');
		if(remove)
		{
			openLoading();
			var masp;
			if (isIndex){
				masp = $(this).parent().attr('id');
			}
			else
				masp = $('.mua').attr('id');
			
			$.ajax({	
				type: 'POST',
				url: '/asset/san-pham/xoa-sp.php',
				dataType: 'json',
				data: 'masp='+masp,
				success: function(xoa){
					var isRemove=xoa['xoa'];
					$('#da-xoa').remove();
					$('#chua-xoa').remove();
					if (isRemove=='yes')
					{
						if (isIndex)
						{
							$('#'+masp).remove();
							$('#center').append('<p id="da-xoa" style="color: red; font-weight: bold">Đã xóa sản phẩm</p>');
						}
						else
						{
							document.getElementById('productDetails').innerHTML='';
							$('#productDetails').append('<p id="da-xoa" style="color: red; font-weight: bold">Đã xóa sản phẩm</p>');
							$(document.body).animate({
								'scrollTop':
								$('#content').offset().top}, 750);
									}
					}
					else
					{
						$('#center').append('<p id="chua-xoa" style="color: red; font-weight: bold">Chưa thể xóa sản phẩm</p>');
					}
					closeLoading();
				}
			});
				
		}
	});
	
	$(document).on('click','.mua',function(){ //update this
		
		openLoading();
		var masp;
		if (isIndex){
			masp = $(this).parent().attr('id');
		}
		else
			masp = $('.mua').attr('id');
		
		$.ajax({
			type: 'POST',
			url: '/thu-vien/isLogged.php',
			dataType: 'json',
			success: function(html){
				var logged=html['logged'];
				if (logged == 'yes')
				{
					
					$.ajax({
						type: 'POST',
						url: '/san-pham/buyNow.php',
						data: 'masp='+masp,
						success: function(buyNow){
							
							if (isIndex)
							{
								$('#buy-now').remove();
								$('#center').append(buyNow);
								closeLoading();
								openCart();
							}
							else
							{
								
								$('#buy-now').remove();
								$('#productDetails').append(buyNow);
								closeLoading();
								openCart();
							}
						}
					});
				}
				else
				{
					openForm();
				}
			}
		});
	});
	
	$(document).on('click','#mua-tiep, .thanh-toan',function(){
		var mua=this;
		mua.style.pointerEvents = 'none';
	
		var masp = $('#buy-now-left h3').attr('id');
		var soLuong = document.getElementById('soluong');
		var addFailed = document.getElementsByClassName('addFailed');
		addFailed=addFailed[0];
		
		if (soLuong.value>0 && soLuong.value<11)
		{	
			$.ajax({
				type: 'POST',
				url: '/gio-hang/addCart.php',
				data: {
				masp: masp, sl: soLuong.value},
				success: function(html){
						closeCart();
						addFailed.style.opacity=0;
						$('#content').append(html);
						mua.style.pointerEvents = 'auto';
						if($(this).attr('class') == 'thanh-toan')
						{
							window.location.href='/?id=gio-hang';
						}
				}
			});
			if($(this).attr('class') == 'thanh-toan')
			{
				window.location.href='/?id=gio-hang';
			}
		}
		
		else
		{
			addFailed.style.opacity=1;
			soLuong.select();
			mua.style.pointerEvents = 'auto';
			return false;
			
		}
		
		
	});
	
		
		
	$(document).on('submit','#loginForm', SetRedirectCookie(window.location.href));
	
	$('.enterForSubmit').keypress(function(event){
		if (event.which == 13)
			{
				document.getElementById('loginForm').submit();
				event.preventDefault();
				return false;
			}
	});
		
	
	
	$(document).on('click','.giohang',function(){ //update this
		SetRedirectCookie($('.giohang').attr('href'));
		$.ajax({
			type: 'POST',
			url: '/thu-vien/isLogged.php',
			dataType: 'json',
			success: function(html){
				var logged=html['logged'];
				if (logged == 'yes')
				{					
					window.location="/?id=gio-hang";
				}
				else
				{
					openForm();
				}
			}
		});
	});

	$(document).on('click','.xoa',function(){ //update this
		var xoa=this;
		xoa.style.pointerEvents = 'none';
		var masp=$(this).attr('id');
		var sohd=$('div#thanh-toan table tbody tr:nth-child(1) td:nth-child(2)').attr('id');

		$.ajax({
			type: 'POST',
			url: '/gio-hang/removeCart.php',
			data : {masp: masp, sohd: sohd},
			success: function(html){
				xoa.style.pointerEvents = 'auto';
				window.location="/?id=gio-hang";
			}
		});
	});
	
	$(document).on('click','.dat-hang',function(){ //update this
		var dat=this;
		dat.style.pointerEvents = 'none';
		var sohd=$('div#thanh-toan table tbody tr:nth-child(1) td:nth-child(2)').attr('id');
		$('.noProduct').remove();
		if (sohd!='Chưa có')
		{
			$('#danh-muc-sp').load('/gio-hang/dat-hang/datHang.php');
			$(this).attr('class','finalCheckOut');
		}
		else
			$('#danh-muc-sp').append('<p class="noProduct" style="color: red; font-weight: bold; font-size: 120%;"> Bạn chưa mua hàng</p>');
		dat.style.pointerEvents = 'auto';
	});
	
	$(document).on('click','#thanh-toan-selector li',function(){ //update this
		var id = $(this).attr('id');
		
		$('#thanh-toan-selector li').attr('class','');

		$('#thanh-toan-selector li#'+id).attr('class','selected');
		
		id=parseInt(id);
		switch(id){
			case 1:
				$('#thanh-toan-content').load('/gio-hang/dat-hang/chuyenkhoan.html');
				$('.finalCheckOut').attr('href','');
				$('.finalCheckOut').attr('onclick','return false;');
				break;
			case 2:
				$('#thanh-toan-content').load('/gio-hang/dat-hang/online.html');
				$('.finalCheckOut').attr('href','https://123pay.vn/');
				$('.finalCheckOut').attr('onclick','');
				$('.finalCheckOut').attr('target','_blank');
				break;
			case 3:
				$('#thanh-toan-content').load('/gio-hang/dat-hang/nhanhang.html');
				$('.finalCheckOut').attr('href','');
				$('.finalCheckOut').attr('onclick','return false;');
				break;
		}
	});
	
	$(document).on('click','.finalCheckOut',function(){ //update this
		var finalCheckOut = this;
		finalCheckOut.style.pointerEvents = 'none';
		
		var sohd=$('div#thanh-toan table tbody tr:nth-child(1) td:nth-child(2)').attr('id');
		var trigia=$('div#thanh-toan table tbody tr:last-child').attr('id');
		trigia=trigia.replace(/\./g, "");
			
		$.ajax({
			type: 'POST',
			url: '/gio-hang/dat-hang/datHang.php',
			data: {sohd: sohd, trigia: trigia},
			success: function(html){
				$('#content').load('/gio-hang/dat-hang/buyComplete.html');
				finalCheckOut.style.pointerEvents = 'auto';
			}
		});
	});

	$(document).on('click','a#change-pass-btn',function(){ //update this
		openOverlay();
		openChangePass();
	});
	
	$(document).on('click','.view-order-details',function(){
		var sohd= $(this).attr('id');
		
		var viewOrder = this;
		viewOrder.style.pointerEvents = 'none';
		
		$.ajax({
			type: 'GET',
			url: '/user/myaccount/view-order-details.php',
			data: {sohd: sohd},
			success: function(html){
				$('#order-details').empty();
				$('#order-details').append(html);
				viewOrder.style.pointerEvents = 'auto';
			}
		});
	});
	
	$(document).on('click','.delivered',function(){
		var sohd= $(this).attr('id');
		
		var delivered = this;
		delivered.style.pointerEvents = 'none';
		
		$.ajax({
			type: 'GET',
			url: '/user/staff/delivered.php',
			data: {sohd: sohd},
			success: function(html){
				$('#order-details').empty();
				$('#order-details').append(html);
				delivered.style.pointerEvents = 'auto';
				window.location="/?id=delivered";
			}
		});
	});
	
	$(document).on('click','.cancel, .ok',function(){
		
		var result = this;
		result.style.pointerEvents = 'none';
		
		if($(this).attr('class') == 'ok')
		{
			var sohd= $(this).attr('id');
			$.ajax({
				type: 'GET',
				url: '/user/staff/ok.php',
				data: {sohd: sohd},
				success: function(html){
					result.style.pointerEvents = 'auto';
					window.location="/?id=new-orders";
				}
			});
		}
		else
			if($(this).attr('class') == 'cancel')
			{
				var sohd= $(this).attr('id');
				$.ajax({
				type: 'GET',
				url: '/user/staff/cancel.php',
				data: {sohd: sohd},
				success: function(html){
					result.style.pointerEvents = 'auto';
					window.location="/?id=new-orders";
				}
			});
			}
			
	});
	
});

function LoadImage(x){ //load image ở trang Chi tiết sản phẩm
	$('div#image img').attr('src',x.src);
	$('div#images-selector img').attr('class','');
	x.className="imgActive";
}

function SetRedirectCookie(cookie){
		var d = new Date();
		d.setTime(d.getTime() + 1*24*60*60*1000); //hết hạn là 1 ngày sau
		var expires = "expires="+ d.toUTCString();
		var string = 'redirect' + "=" + cookie + "; " + expires +"; path=/";
		document.cookie = string;
}
	
function isNext(id,next){

	if (next=='next')

		id+=1;

	else

		id-=1;

	id=id.toString();

	len=10-id.length;

	for (var i=0;i<len;i++)

		id='0'+id;

	return id;

}



//button on top

$(function() {

		$('#bttop').click(function() {

			$('body,html').animate({

				scrollTop: 0

			}, 1000);

		 });

	});
	
function openOverlay(){
	var x=document.getElementsByClassName("overlay");
	x[0].style.opacity="0.6";
	$(".overlay").css('z-index','100');
}

function closeOverlay(){
	var x = document.getElementsByClassName("overlay");
	x[0].style.opacity="0";
	$(".overlay").css('z-index','-10');
}

function openLoading(){ //update this
	
	$('#mua-loading').attr('src','/images/mua-loading.gif');
	var muaLoading = document.getElementById('mua-loading');
	openOverlay();
	if (muaLoading!=null){
		
		muaLoading.style.opacity="1";
		muaLoading.style.zIndex="1100";
	}
	
}

function closeLoading(){ //update this
	$('#mua-loading').attr('src','');
	var muaLoading = document.getElementById('mua-loading');
	closeOverlay();
	if (muaLoading!=null){
		muaLoading.style.opacity="0";
		muaLoading.style.zIndex="-3";
	}
}


function openCart (){ //update this
	document.getElementById("buy-now").style.opacity="1";
	$("#buy-now").css('z-index','1100');
	openOverlay();
	var soLuong=$('input#soluong');
	soLuong.select();
}

function closeCart (){ //update this
	var buyNow = document.getElementById("buy-now");
	if (buyNow!=null)
	{
		buyNow.style.opacity="0";
		$("#buy-now").css('z-index','-2');
	}
	closeOverlay();
	closeLoading();
	return false;
}

function openForm (){ //update this
	closeLoading();
	document.getElementById("dang-nhap").style.opacity="1";
	$("#dang-nhap").css('z-index','1100');
	openOverlay();
	var username = document.getElementById("username");
	if (username!=null)
		username.focus();
	return false;
}

function closeForm (){ //update this
	document.getElementById("dang-nhap").style.opacity="0";
	$("#dang-nhap").css('z-index','-1');
	closeOverlay();
}

function openChangePass (){ //update this
	document.getElementById("change-pass").style.opacity="1";
	$("#change-pass").css('z-index','1100');
	var oldpass = document.getElementById("oldpass");
	if (oldpass!=null)
		oldpass.focus();
	return false;
}

function closeChangePass (){ //update this
	var x=document.getElementById("change-pass");
	if (x!=null)
	{
		x.style.opacity="0";
		$("#change-pass").css('z-index','-1');
		closeOverlay();
	}
}

/*function EscDetect (e){

	if (e == 27)

		closeForm();

}*/



document.onkeyup = function (e){  //update this
	e = e || window.event;
	if (e.keyCode == 27)
	{
		closeCart();
		closeForm();
		closeChangePass();
	}
};



function addDot(){

	var price;

	var tempPrice;

	price=document.forms["updatesp"].price.value;

	tempPrice=numeral().unformat(price);

	tempPrice=numeral(tempPrice).format('0,0');

	document.forms["updatesp"].price.value=tempPrice;
}



function elementSearchRemove(){

	var search=document.getElementById("searchbar");

	search.remove();

}



/* Phần Đăng Ký - Đăng Nhập*/



function notAllowUnicodeNum()

{

	return event.charCode >= 48 && event.charCode <= 57;

}

function notAllowUnicode()

{

	return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >=65 && event.charCode <=90) || (event.charCode >=97 && event.charCode <=122)

}



function notAllowUnicodeEmail()

{

	return (event.charCode==64 || event.charCode==46 || event.charCode >= 48 && event.charCode <= 57) || (event.charCode >=65 && event.charCode <=90) || (event.charCode >=97 && event.charCode <=122)

}



function checkDate()

{

	var ngay = document.getElementById("ngay").value;

	var thang = document.getElementById("thang").value;

	var nam = document.getElementById("nam").value;

	var checkDate = document.getElementById("checkDate");



	var months=[31,28,31,30,31,30,31,31,30,31,30,31];



	if (nam%400 == 0 || (nam%4==0 && nam%100!=0))

	{

		months[1]=29;

	}



	if (ngay>months[thang-1])

	{

		checkDate.style.visibility="visible";

		return false;

	}



	else

	{

		checkDate.style.visibility="hidden";

		return true;

	}



}

function checkRetypePass()

{

	var pass = document.forms["register"].pass.value;

	var retype = document.forms["register"].repass.value;



	if (pass.localeCompare(retype) != 0)

	{

		document.getElementById("checkRetypePass").style.visibility = "visible";

		return false;

	}

	else

	{

		document.getElementById("checkRetypePass").style.visibility = "hidden";

		return true;

	}



}

function checkNullAccount()

{
	var info="";

	var infos=['name','addr','phone','email'];

	for (i=0, len=infos.length; i<len; i++)

	{

		info=document.forms["myaccount"][infos[i]].value;

		if (info.length==0)

		{

			alert("Bạn nhập thiếu thông tin "+infos[i]+" !");

			document.getElementById("x-"+infos[i]).style.visibility = "visible";

			return false;

		}

		else

			document.getElementById("x-"+infos[i]).style.visibility = "hidden";



	}
	
	return true;
}


function checkNullRegister()

{

	var pass = document.forms["register"].pass.value;

	var retype = document.forms["register"].repass.value;



	var info="";

	var infos=['name','addr','username','pass','repass','phone','email'];

	for (i=0, len=infos.length; i<len; i++)

	{

		info=document.forms["register"][infos[i]].value;

		if (info.length==0)

		{

			alert("Bạn nhập thiếu thông tin "+infos[i]+" !");

			document.getElementById("x-"+infos[i]).style.visibility = "visible";
			
			var missing =  document.getElementById(infos[i]);
			missing.focus();

			return false;

		}

		else

			document.getElementById("x-"+infos[i]).style.visibility = "hidden";



	}

	if (checkRetypePass() && checkDate())

	{

		return true;

	}

	else

		return false;

}



function ktNull()

{
	var info="";

	var infos=['tensp','details','price','doc','ghi','baohanh','hinh1','hinh2','hinh3','hinh4'];

	for (i=0, len=infos.length; i<len; i++)
	{

		info=document.forms["updatesp"][infos[i]].value;

		if (info.length==0)

		{
			alert("Bạn nhập thiếu thông tin "+infos[i]+" !");

			var missing = document.getElementById(infos[i]);
			missing.focus();
			document.getElementById("x-"+infos[i]).style.visibility = "visible";
			
			return false;
		}
		else
			document.getElementById("x-"+infos[i]).style.visibility = "hidden";
	}
	document.forms["updatesp"].price.value=numeral().unformat(document.forms["updatesp"].price.value);
	return true;

}

//Rotate 3D

var init = function() {

	var box = document.querySelector('#theArt').children[0],

	    showPanelButtons = document.querySelectorAll('#show-buttons input'),

	    panelClassName = 'show-front',



	    onButtonClick = function( event ){

	        box.removeClassName( panelClassName );

	        panelClassName = event.target.className;

	        box.addClassName( panelClassName );

	};



		for (var i=0, len = showPanelButtons.length; i < len; i++) {

		    showPanelButtons[i].addEventListener( 'click', onButtonClick, false);

		}

	};

window.addEventListener( 'DOMContentLoaded', init, false);





Element.prototype.hasClassName = function (a) {

    return new RegExp("(?:^|\\s+)" + a + "(?:\\s+|$)").test(this.className);

};



Element.prototype.addClassName = function (a) {

    if (!this.hasClassName(a)) {

        this.className = [this.className, a].join(" ");

    }

};



Element.prototype.removeClassName = function (b) {

    if (this.hasClassName(b)) {

        var a = this.className;

        this.className = a.replace(new RegExp("(?:^|\\s+)" + b + "(?:\\s+|$)", "g"), " ");

    }

};



Element.prototype.toggleClassName = function (a) {

  this[this.hasClassName(a) ? "removeClassName" : "addClassName"](a);

};





(function(){



var DDD = {};

DDD.isTangible = !!('createTouch' in document);

DDD.CursorStartEvent = DDD.isTangible ? 'touchstart' : 'mousedown';

DDD.CursorMoveEvent = DDD.isTangible ? 'touchmove' : 'mousemove';

DDD.CursorEndEvent = DDD.isTangible ? 'touchend' : 'mouseup';



DDD.EventHandler = function() {};



DDD.EventHandler.prototype.handleEvent = function( event ) {

  if ( this[event.type] ) {

    this[event.type](event);

  }

};



var transformProp = Modernizr.prefixed('transform');



DDD.translate = Modernizr.csstransforms3d ?

  function( x, y ) {

    return 'translate3d(' + x + 'px, ' + y + 'px, 0 )';

  } :

  function( x, y ) {

    return 'translate(' + x + 'px, ' + y + 'px)';

  };





DDD.init = function() {

};

window.addEventListener( 'DOMContentLoaded', DDD.init, false);

window.DDD = DDD;

})();



//Flip Image

$(function () {

	if ($('html').hasClass('csstransforms3d')) {

		$('.artGroup').removeClass('slide').addClass('flip');

		$('.artGroup.flip').hover(

			function () {

				$(this).find('.artwork').addClass('theFlip');

			},

			function () {

				$(this).find('.artwork').removeClass('theFlip');

			}

		);

	} else {

		$('.artGroup').hover(

			function () {

				$(this).find('.detail').stop().animate({bottom:0}, 500, 'easeOutCubic');

			},

			function () {

				$(this).find('.detail').stop().animate({bottom: ($(this).height() * -1) }, 500, 'easeOutCubic');

			}

		);



	}

});