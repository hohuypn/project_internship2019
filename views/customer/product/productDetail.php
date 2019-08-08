<?php 
$show = "hidden";

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$image = $_SESSION['image'];
	$show ="show";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCT DETAIL</title>
</head>
<body>
	<div class="content" id="content">
		<div class="container">
			<div class="productdetail" id="sanphamtimkem">
				<div class="productDetail" style="margin: 50px 0px 50px 0px;">
					<form method="POST" action="">
						<?php 
						$images= explode(",",$select_productdetail['image']);
						?>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 image">
								<div class="imageMain col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<img id="expandedImg" src="<?php echo $images[0] ?>" width="90%">
								</div>
								<div class="row image">
									<?php foreach ($images as $key => $image) {
										?>
										<div class="col-xs-3" style="margin-top: 30px; height: 30px">
											<img src="<?php echo $image ?>" style="width:100%; height: 100px" onclick="changeImage(this);" >
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 detail">
								<div class="row">
									<br>
									<p class="prod_name"><?php echo $select_productdetail['prod_name'] ?></p><!--  đổ tên sp ra -->
									<div class="col-xs-6 float-left">
										Mã Hàng:
									</div> 
									<div class="col-xs-6 float-right">
										<b><?php echo $select_productdetail['sku'] ?></b>
									</div><hr><!--  đổ mã sp ra -->
									<hr>
									<div class="col-xs-6 float-left">
										Nhóm Sản Phẩm:
									</div>
									<div class="col-xs-6 float-right">
										<b><?php echo $select_productdetail['cate_name'] ?></b>
									</div><hr><!--  đổ nhóm danh mục sp ra -->
									<hr>
									<div class="col-xs-6 float-left">
										Chất liệu:
									</div>
									<div class="col-xs-6 float-right">
										<b><?php echo $select_productdetail['product_type'] ?></b><!--  đổ chất liệu sp ra -->
									</div><hr>
									<hr>
									<div class="col-xs-6 float-left">
										Số Lượt Xem:
									</div>
									<div class="col-xs-6 float-right">
										<b><?php echo $select_productdetail['views'] ?></b><!--  đổ view sp ra -->
									</div><hr>
									<hr>
									<div class="col-xs-12">
										<p ><?php echo $select_productdetail['description'] ?></p><hr>
									</div><!--  đổ decription sp ra -->
									<div class="row" style="font-size: 20px;">
										<div class="col-xs-3">
											Giá:
										</div>
										<?php 
										if ($select_productdetail['price_new']=='') {
											$show = "hidden";
											$percent = 0;
											$price_new = $select_productdetail['price']; 

										}else {
											$percent = round(($select_productdetail['price'] - $select_productdetail['price_new'])/($select_productdetail['price']/100), 0);
											$show = "show";
											$price_new =$select_productdetail['price_new'];
											?>
											<div class='promotion text-center $show' style="font-size: 20px;">
												<strong style="color: red">GIẢM <?php echo $percent ?>%  <i class="fa fa-arrow-down" aria-hidden="true"></i></strong>
											</div>
										<?php }?>
										<div class='col-xs-5' style="text-align: center;">
											<span class='price float-left'><?php echo number_format($price_new)?>đ</span>
										</div>
										<?php if($price_new!==$select_productdetail['price']){ ?>
											<div class='col-xs-2'><!-- show giá cũ khi có khuyến mãi -->
												<s class='price $show float-left '><?php echo number_format($select_productdetail['price'])?>đ</s>
											</div>
										<?php } ?>
									</div>
									<hr>
									<div class="input-quantity row">
										<div class='col-sm-2'>
											&nbsp; Số lượng: 
										</div>
										<div class='col-sm-1'>
											<button type="button" class="btn" onclick="minus()"><i class="glyphicon glyphicon-minus"></i></button>
										</div>
										<div class='col-sm-2'>
											<input id="num" type="text" value="1" class="form-control">
										</div>
										<div class='col-sm-1'>
											<button type="button" class="btn" onclick="plus()"><i class="glyphicon glyphicon-plus"></i></button> 
										</div>
										<div class='col-sm-6'>
											<?php echo $select_productdetail['quantity'] ?>
											Số lượng có sẵn
										</div><!--  đổ số lượng sp hiện đang có ra -->
									</div>
									<hr><br>
									<div class="button" >
										<div class="col-sm-7 col-xs-5" style="text-align: center;">
											<div class="notifi-cart"></div>
											<a onclick="addToCart(<?php echo $select_productdetail['id']; ?>)" class="btn"><i class="fa fa-shopping-cart">Thêm vào giỏ</i></a>
										</div>
										<div class="col-sm-5">
											<a href="index.php?controller=order&action=checkout&page=customer" class="btn">Mua ngay</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<!-- show list comment của custommer -->
				
				<div class="listcomment" id="listcomment" style="padding-bottom: 90px;padding-left: 45px;padding: 35px">
					<h3>ĐÁNH GIÁ SẢN PHẨM</h3>

					<?php 
					foreach ($select_comment as $key ) { ?> 
						<div class="row" id="resultcomment">
							<div class="imageacount" style="width: 80px">
								<div class="acount col-sm-2" >
									<img src="<?php echo $key['image']; ?>" style="width: 5.5rem;height: 5.5rem"> 
								</div> <!-- show ảnh của custommer đã comment -->
							</div>
							<div class="commentuser col-sm-10" style="padding-left: 50px;padding-top: 5px;">
								<div class="nameuser">
									<?php echo $key['username']; ?> 
								</div> <!-- show tên của custommer đã comment -->
								<div class="nameproduct">
									Loại hàng: <?php echo $select_productdetail['cate_name'] ?>  <!-- get name of product -->
								</div> <!-- show tên của product mà user đã đặt --><hr> <!-- show ngày custommer comment -->
								<div class="maincomment">
									<?php echo $key['message']; ?> 
								</div> <!-- show comment của custommer -->
								<div class="daycomment">
									<?php echo  $key['date']; ?> 
								</div> <!-- show ngày comment của custommer (lấy thời gian của customer khi họ cmt) -->
							</div> 
						</div> <br>
					<?php } ?>
				</div>
				<?php 
				if (isset($_SESSION['username'])=='') {
					$show='hidden';
				}else{
					$show='show';
					?>
					<div class="formcommentuser  $show ">
						<form method="POST" id="commentcustommer" onsubmit="return addComment()"> 
							<div class="row ">
								<div class="imageacount" style="width: 80px">
									<div class="acount col-sm-2" >
										<img src="<?php echo $_SESSION['image']; ?>" style="width: 5.5rem;height: 5.5rem"> 
									</div><!-- show ảnh của custommer đã comment -->
								</div>
								<div class="commentuser col-sm-9" style="padding-left: 50px;padding-top: 5px;border-radius: 20px">
									<div >
										<input type="hidden" name="product_id" id="product_id"  value="<?php echo $select_productdetail['id']; ?>">
										<textarea type="text" name="message" id="message" placeholder="Viết bình luận ....." required style="height: 50px;border-radius: 20px;border: 1px solid #a6a6a6;"></textarea>
									</div><!-- show tên của custommer đã comment -->
								</div>
								<div style="padding-top: 10px;">
									<button  type="submit" class="btn" name="btncomment" id="btncomment" style="border-radius: 10px;">Gửi</button>
								</div>
							</div>
						</form>
					</div><br>

					<?php } ?><br>


					<div class="productHOT">
						<div class="row">
							<div class="solugan">
								<div class="box-product-head">
									<span class="box-title">
										<b>SẢN PHẨM CÙNG DANH MỤC</b>
									</span>
									<span class="af-ter">

									</span>
								</div>
							</div><br>
							<!-- gọi show ra sp cùng chung danh mục () -->
							<?php foreach ($select_productcate as $key ) {
								$images=explode(',', $key['image']);
								?>
								<div class='col-lg-3 col-md-3 col-sm-6 col-xs-6 ' style="padding-bottom: 35px">
									<div class='product-item'>
										<div class='product-image'>
											<img src='<?php echo $images[0]; ?>'>
										</div>
										<?php 
										if ($key['price_new']=='') {
											$show = "hidden";
											$percent = 0;
											$price_new = $key['price']; 

										}else {
											$percent = round(($key['price'] - $key['price_new'])/($key['price']/100), 0);
											$show = "show";
											$price_new =$key['price_new'];
											?>
											<div class='promotion text-center $show '>
												GIẢM <?php echo $percent ?>%  
											</div>
											<?php
										}
										?>
										<div class='product-control text-center'>
											<a class="btn btn-addCart" href=''><i class = 'fa fa-cart-plus fa-lg' style='color: #FFF;'></i></a>
											<a class="btn btn-addCart" href='index.php?controller=product&action=productdetail&page=customer&id=<?php echo $key['id'] ?>'><i class = 'fa fa-eye' style='color: #FFF;'></i></a>
										</div>
										<div class='caption text-center'>
											<div class='col-xs-12 prod_name'>
												<h4 class = 'text-uppercase'><?php echo $key['prod_name'] ?></h4>
											</div>
											<div class='col-xs-6'>
												<span class='price float-left'><?php echo number_format($price_new)?>đ</span>
											</div>
											<?php if($price_new!==$key['price']){ ?>
												<div class='col-xs-6'><!-- show giá cũ khi có khuyến mãi -->
													<s class='price $show float-left'><?php echo number_format($key['price'])?>đ</s>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							<?php } ?>


						</div>
					</div>
					<div class="productPromotion">
						<div class="row">
							<div class="solugan">
								<div class="box-product-head">
									<span class="box-title">
										<b>SẢN PHẨM KHUYẾN MÃI </b> 
									</span>
									<span class="af-ter">

									</span>
								</div>
							</div><br>
							<?php foreach ($select_productpromotion as $key ) {
								$image=explode(',', $key['image']);
								$percent = round(($key['price'] - $key['price_new'])/($key['price']/100), 0);
								?>
								<div class='col-lg-3 col-md-3 col-sm-6 col-xs-6 ' style="padding-bottom: 35px">
									<div class='product-item'>
										<div class='product-image'>
											<img src='<?php echo $image[0]; ?>'>
										</div>
										<div class='promotion text-center '>
											GIẢM <?php echo $percent ?>%  
										</div>
										<div class='product-control text-center'>
											<a class="btn btn-addCart" href='#'><i class = 'fa fa-cart-plus fa-lg' style='color: #FFF;'></i></a>
											<a class="btn btn-addCart" href='index.php?controller=product&action=productdetail&page=customer&id=<?php echo $key['id'] ?>'><i class = 'fa fa-eye' style='color: #FFF;'></i></a>
										</div>
										<div class='caption text-center'>
											<div class='col-xs-12 prod_name'>
												<h4 class = 'text-uppercase'><?php echo $key['prod_name'] ?></h4>
											</div>
											<div class='col-xs-6'>
												<span class='price float-left'><?php echo number_format($key['price_new'] )?>đ</span>
											</div>
											<div class='col-xs-6'> <!-- show giá cũ khi có khuyến mãi -->
												<s class='price float-left'><?php echo number_format($key['price'])?>đ</s>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<!-- end show productPromotion -->
				</div>
			</div>
		</body>
		<script type="text/javascript">
			function changeImage(imgs) {
				var expandImg = document.getElementById("expandedImg");
				expandImg.src = imgs.src;
				expandImg.parentElement.style.display = "block";
			}
			function plus(){
				// Giấy giá trị của quantity
				var quantity="<?=$select_productdetail['quantity']?>";
				var plus = document.getElementById("num").value;
				// Cộng thêm 1 đơn vị rồi gán trở lại quantity
				if(plus < parseInt(quantity)){
					document.getElementById("num").value = parseInt(plus)+1;
				}
			}
			function minus(){
				// Giấy giá trị của quantity
				var minus = document.getElementById("num").value;
				// Cộng thêm 1 đơn vị rồi gán trở lại quantity
				if (parseInt(minus) > 1) {			
					document.getElementById("num").value = parseInt(minus)-1;
				}
			}
			function addToCart(id) {
				var num = $('#num').val();
				$.post('index.php?controller=order&action=cart&page=customer', {'id' : id, 'num' : num}, function(data){
					$('#count-cart').html('GIỎ HÀNG ('+data+')');
					$('.notifi-cart').css('color','lime').text('Thêm Giỏ Hàng Thành Công');
					setTimeout(function () {
						$('.notifi-cart').empty();
					},500)
				});
			}

			function addComment(){
				var str = $("#commentcustommer").serializeArray();
				$.ajax({
					url: "index.php?controller=product&action=addcomment&page=customer",
					type: 'post',
					data: str, 
					
					success: function (html){
						$('#listcomment').empty().html(html);
					}
				});
				return false;
			}


</script>
</html>
