<?php 
$showUsername = "hidden";
$showDangki_Dangnhap = "show";

if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$remember = "checked";
}
if (isset($_SESSION['username'])) {
	$showDangki_Dangnhap = "hidden";
	$username = $_SESSION['username'];
	$image = $_SESSION['image'];
	$showUsername = "show";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SHOPPY Việt Nam | Mua và bán trên ứng dụng di động hoặc website</title>
	<link rel="stylesheet" title="style" href="public/asset/admin/css/checkout.css">
	<link rel="icon" type="image/png" href="public/asset/customer/imagevd/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/asset/customer/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="header" >
			<div class="header-top">
				<div class="container">
					<div class="header-left col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="info">
							<span>
								<i class="glyphicon glyphicon-map-marker"></i>
								SHOPPY
							</span>
							<span>
								<i class="glyphicon glyphicon-earphone"></i>
								+84 648 534 343
							</span>
						</div>
					</div>    
					<div class="header-right col-lg-8 col-md-8 col-sm-8 col-xs-8 " >
						<ul class="nav navbar-nav" id="header-right">
							<li class="<?php echo $showDangki_Dangnhap?>">
								<a href="#" data-toggle="modal" data-target="#dangki">
									<span>
										<i class="fa fa-user-plus "></i>
									</span> ĐĂNG KÍ
								</a>
							</li>
							<li class="<?php echo $showDangki_Dangnhap?>">
								<a href="" data-toggle="modal" data-target="#dangnhap">
									<span>
										<i class="fa fa-sign-in"></i>
									</span> ĐĂNG NHẬP
								</a>
							</li>  
							<li class="<?php echo $showDangki_Dangnhap?>">
								<a href="" data-toggle="modal" data-target="#dangnhapseller">
									<span>
										<i class="fa fa-sign-in"></i>ĐĂNG NHẬP NGƯỜI BÁN
									</span>
								</a>
							</li> 
							<li class="<?php echo $showUsername?>">
								<a href=""><span><i class="fa fa-bell-o ">THÔNG BÁO</i></span></a>
							</li> 
							<li class="dropdown <?php echo $showUsername?>" >
								<a href="#" id="user" class="<?php echo $showUsername; ?>" data-toggle="dropdown">
									<img class="img-circle" width="15" height="15" src="<?php echo $_SESSION['image']; ?>">
									<?php echo $username; ?>&ensp;<i class="fa fa-chevron-down" aria-hidden="true"></i>
								</a>
								<ul class="dropdown-menu text-capitalize" role="menu">
									<li><a href="index.php?controller=user&action=profile&page=customer"><span><i class="fa fa-user-circle-o"></i></span> Tài khoản của tôi</a></li>
									
								</ul>
							</li>
							<li class="<?php echo $showUsername?>">
								<a href="index.php?controller=user&action=logout&page=customer"><span><i class="fa fa-sign-out">Đăng xuất</i></span> </a>
							</li>        
						</ul>
					</div>
				</div>
			</div>
		</div>	
		<div class="menu">
			<div class="header-menu text-uppercase" id="myMenu">
				<nav class="navbar navbar-inverse">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span> 
							</button>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
								<li class="dropdown active "> 
									<a href="#" id="category" class="" data-toggle="dropdown"><span class="fa fa-bars "></span>  DANH MỤC SẢN PHẨM</a>
									<ul class="dropdown-menu text-capitalize">
										<?php 
										//gọi danh mục để show 
										$select_cate=$_SESSION['cat_list'];
										foreach ($select_cate as $key ){ ?>
											<li><a href="index.php?controller=product&action=productCate&page=customer&id=<?= $key['id']?>"><?php echo $key['cate_name'] ?></a></li>
										<?php } ?>
									</ul>
								</li>
								<li class="mn">
									<a href="index.php?controller=product&action=index&page=customer" >TRANG CHỦ</a>
								</li>
								<li class="mn">
									<a href="index.php?controller=product&action=product&page=customer">SẢN PHẨM</a>
								</li>
								<li class="mn">
									<a href="index.php?controller=product&action=aboutUs&page=customer">GIỚI THIỆU</a>
								</li>
								<li class="mn">
									<a href="index.php?controller=product&action=contactUs&page=customer">LIÊN HỆ</a>
								</li>
								<li>
									<form method="POST" class="navbar-form">
										<div class="input-group search-box">
											<input id="txtsearch" type="text" class=" search form-control col-md-10 " placeholder="Tìm kiếm">
										</div>
									</form>
								</li> 
								<li class="cart" id="cart-shop" >
									<a href="index.php?controller=order&action=showcart&page=customer">
										<span>
											<i class="fa fa-shopping-cart fa-2x" style="font-size: 1.5em">
											</i>
										</span>
										<?php $cart=(isset($_SESSION['cart']))?count($_SESSION['cart']):0; ?>
										<span id="count-cart" data-count="0">GIỎ HÀNG (<?=$cart?>)</span>
									</a>
								</li> 
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
		
	</header>
	<div class="body">
		<div class="content" id="content">
			<div class="container">
				<?php 
				echo $content;
				?> 
			</div>

		</div>
	</div>

	<footer>
		<div class="footer">
			<div class="container ">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<h4>GIỚI THIỆU</h4>
					<hr>
					<p class="title">ĐỒ THỜI TRANG CAO CẤP</p>
					<p class="title">Địa chỉ: </p><span>101B, Lê Hữu Trắc, Quận Sơn Trà, Đà Nẵng</span>
					<p class="title">Giấy chứng nhận kinh doanh: </p><span>Số 012345678 do phường đăng kí kinh doanh, sở kế hoạch và đàu tư thành phố ĐÀ Nẵng cấp</span>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<h4>ĐỊA CHỈ LIÊN HỆ</h4>
					<hr>
					<p class="title"><span><i class="glyphicon glyphicon-map-marker"></i></span>Phản ánh chất lượng</p><span><a href="#">Hotline: 0123.456.789</a></span> <br> 
					<p class="title">Liên hệ với chúng tôi </p>
					<p><a href="#"><span><i class="fa fa-phone"></i></span> 0123 456 789</a></p>
					<p><a href="#"><span><i class="fa fa-envelope-o "></i></span> contactabc@gmail.com</a></p>
					<p><a href="#"><span><i class="fa fa-address-card "></i></span> +84 123 456 789</a></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<h4>THANH TOÁN</h4>
					<hr>
					<p class="title">Chủ tài khoản: <span>SHOP THỜI TRANG</span></p>
					<p class="title">Ngân hàng Vietcombank : </p><span>123456789</span>
					<p class="title">Ngân hàng Agribank : </p><span>123456789</span>
				</div>
			</div>
		</div>
	</footer>

	<div id="dangki" class="modal fade" role="dialog" style="z-index: 9999; ">
		<div class="modal-dialog">
			<br><br>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">ĐĂNG KÍ</h3>
				</div>
				<form method="POST" action="index.php?controller=user&action=addUser&page=customer">
					<div class="modal-body">
						<div class="col-md-6 home"> Họ:
							<input type="text" name="ho" class="form-control" placeholder="Họ" required>
						</div>
						<div class="col-md-6 home">Tên:
							<input type="text" name="ten" class="form-control" placeholder="Tên" required>
						</div>
						<div class="col-md-12 home">Email:
							<input type="text" name="email" class="form-control" placeholder="Email" required>
						</div>
						<div class="col-md-12 home">Address:
							<input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
						</div>
						<div class="col-md-12 home"> Phone:
							<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">Gender:
							<input type="radio" name="gender" value="Nam" checked="checked">Nam
							<input type="radio" name="gender" value="Nữ">Nữ
						</div>
						<div class="col-md-12 home">Ngày sinh:
							<input type="date" name="birthday" class="form-control">
						</div>
						<div class="col-md-12 home"> Username:
							<input type="text" name="username" class="form-control" placeholder="User Name" required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home">Chọn:
							<input type="radio" name="user_role" value="0" checked="checked">Người mua hàng
							<input type="radio" name="user_role" value="2">Người bán hàng
						</div>
						<div class="col-md-6 home">Password:
							<input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
						</div>
						<div class="col-md-6 home">Confirmpassword:
							<input type="password" name="confirmpassword" class="form-control" placeholder="Xác nhận mật khẩu" required>
						</div>
					</div>

					<div class="modal-footer"><br>
						<div class="register"><button type="submit" class="btn" name="dangki" > REGISTER </button></div>
					</div>
				</form>
			</div>

		</div>
	</div>

	<div id="dangnhap" class="modal fade" role="dialog" style="z-index: 9999">
		<div class="modal-dialog">
			<br><br>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">ĐĂNG NHẬP</h3>
				</div>
				<form method="POST" action="index.php?controller=user&action=Login&page=customer">
					<div class="modal-body">
						<div class="col-md-12 home">
							Tên đăng nhập:
							<input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập" value="" required>
						</div>
						<div class="col-md-12 home">
							Mật Khẩu:
							<input type="password" name="password" class="form-control" placeholder="Mật khẩu" value=""required>
						</div>
						<div class="col-md-12 home">
							Nhớ mật khẩu  <input type="checkbox" name="remember">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn" name="login" >ĐĂNG NHẬP</button>
					</div>
				</form>
			</div>

		</div>
	</div>

	<div id="dangnhapseller" class="modal fade" role="dialog" style="z-index: 9999">
		<div class="modal-dialog">
			<br><br>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">ĐĂNG NHẬP</h3>
				</div>
				<form method="POST" action="index.php?controller=user&action=Login&page=seller">
					<div class="modal-body">
						<div class="col-md-12 home">
							Tên đăng nhập:
							<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" value="" required>
						</div>
						<div class="col-md-12 home">
							Mật Khẩu:
							<input type="password" name="password" class="form-control" placeholder="password" value=""required>
						</div>
						<div class="col-md-12 home">
							Nhớ mật khẩu  <input type="checkbox" name="remember">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn" name="loginseller" value="login" >ĐĂNG NHẬP</button>
					</div>
				</form>
			</div>

		</div>
	</div>

</body>
<script type="text/javascript">
	$('.product-item').on('click', '.btn-addCart:first', function(e){
		e.preventDefault();
		var el=$(this);
		if ($(this).hasClass('disable')) {
			return false;
		}
		$('.product-item').find('.btn-addCart:first').addClass('disable');
		var parent =  $(this).parents('.product-item');
		var cart = $(document).find('#cart-shop');
		var src  = parent.find('img').attr('src');
		var parTop = parent.offset().top;
		var parLeft = parent.offset().left;
		$('<img />', {
			class: 'img-product-fly',
			src: src
		}).appendTo('body').css({
			'top': parseInt(parTop) + parseInt(parent.height()) - 130,
			'left':  parseInt(parLeft) + parseInt(parent.height()) - 280
		});
		setTimeout(function(){
			$(document).find('.img-product-fly').css({
				'top'  : cart.offset().top,
				'left' : cart.offset().left
			});
			setTimeout(function(){
				$(document).find('.img-product-fly').remove();
				var citem = parseInt(cart.find('#count-cart').data('count'))+1;
				var link_get_id=el.parent().find('.btn-addCart:last').attr('href');
				var id_arr=link_get_id.split('id=');
				var id=id_arr[1];
				console.log(id);
				$.post('index.php?controller=order&action=cart&page=customer', {'id' : id, 'num' : 1}, function(data){
					$('#count-cart').html('GIỎ HÀNG ('+data+')');
				});
				$(document).find('.btn-addCart').removeClass('disable');
			}, 1000);
		}, 500);
	});

	$(document).ready(function(){
		$('#txtsearch').keyup(function(){
			var keyword = $('#txtsearch').val();
			$.post('index.php?controller=product&action=findproduct&page=customer', {tukhoa: keyword}, function(data){
				$('#sanphamtimkem').html(data);
			})
		})
	})

	
</script>
</html>
