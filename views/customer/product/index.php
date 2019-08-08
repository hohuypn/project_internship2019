<?php 


?>
<div class="content" id="content">
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php 
			$i=0;
			foreach ($select_slide as $key ) { ?>
				<div class='item <?=($i==0)?"active":""?>'>
					<img src="<?php echo $key['image'] ?>" style="height: 250px;width: 100%">
				</div>
				<?php $i++;} ?>
		</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
	</div><br><br>
		<div class="container"  >
			<div class="productHot"  >
				<div class="row"  id="sanphamtimkem">
					<div class="solugan">
						<div class="box-product-head" >
							<span class="box-title">
								<b>SẢN PHẨM HOT</b>
							</span>
							<span class="af-ter">

							</span>
						</div>
					</div><br>
					<?php foreach ($select_producthot as $product ) {
						$image=explode(',', $product['image']);?>
						<div class='col-lg-3 col-md-3 col-sm-6 col-xs-6 ' style="padding-bottom: 35px">
							<div class='product-item'>
								<div class='product-image'>
									<img src='<?php echo $image[0]; ?>'>
								</div>
								<?php 
								if ($product['price_new']=='') {
									$show = "hidden";
									$percent = 0;
									$price_new = $product['price']; 

								}else {
									$percent = round(($product['price'] - $product['price_new'])/($product['price']/100), 0);
									$show = "show";
									$price_new =$product['price_new'];
									?>
									<div class='promotion text-center $show '>
										GIẢM <?php echo $percent ?>%  
									</div>
									<?php
								}
								?>
								<div class='product-control text-center'>
									<a class="btn btn-addCart"><i class = 'fa fa-cart-plus fa-lg' style='color: #FFF;'></i></a>
									<a id="addCart"" class="btn btn-addCart" href="index.php?controller=product&action=productdetail&page=customer&id=<?php echo $product['id'] ?>"><i class = 'fa fa-eye' style='color: #FFF;'></i></a>
								</div>
								<div class='caption text-center'>
									<div class='col-xs-12 prod_name'>
										<h4 class = 'text-uppercase'><?php echo $product['prod_name'] ?></h4>
									</div>
									<div class='col-xs-6'>
										<span class='price float-left'><?php echo number_format($price_new)?>đ</span>
									</div>
									<?php if($price_new!==$product['price']){ ?>
										<div class='col-xs-6'><!-- show giá cũ khi có khuyến mãi -->
											<s class='price $show float-left'><?php echo number_format($product['price'])?>đ</s>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?> <br> 
				</div><br><br>
			</div>
			<!-- end show productHot -->
			<div class="productPromotion">
				<div class="row" >
					<div class="solugan">
						<div class="box-product-head">
							<span class="box-title">
								<b>SẢN PHẨM KHUYẾN MÃI </b> 
							</span>
							<span class="af-ter">

							</span>
						</div>
					</div><br>
					<!-- gọi show ra sp khuyến mãi -->
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
									<a  class="btn btn-addCart" href='#'><i class = 'fa fa-cart-plus fa-lg' style='color: #FFF;'></i></a>
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
			<div class="product">
				<div class="row" >
					<div class="solugan">
						<div class="box-product-head">
							<span class="box-title">
								<b>SẢN PHẨM CÓ THỂ BẠN QUAN TÂM</b>
							</span>
							<span class="af-ter">
							</span>
						</div>
					</div><br>
					<!-- gọi show ra sp  -->
					<?php foreach ($select_product as $product ) {
						$image=explode(',', $product['image']);
						
						?>
						<div class='col-lg-3 col-md-3 col-sm-6 col-xs-6 ' style="padding-bottom: 35px">
							<div class='product-item'>
								<div class='product-image'>
									<img src='<?php echo $image[0]; ?>'>
								</div>
								<?php 
								if ($product['price_new']=='') {
									$show = "hidden";
									$percent = 0;
									$price_new = $product['price']; 

								}else {
									$percent = round(($product['price'] - $product['price_new'])/($product['price']/100), 0);
									$show = "show";
									$price_new =$product['price_new'];
									?>
									<div class='promotion text-center $show '>
										GIẢM <?php echo $percent ?>%  
									</div>
									<?php
								}
								?>
								
								<div class='product-control text-center'>
									<a class="btn btn-addCart" href="javascript:void(0);" ><i class = 'fa fa-cart-plus fa-lg' style='color: #FFF;'></i></a>
									<a class="btn btn-addCart" href='index.php?controller=product&action=productdetail&page=customer&id=<?= $product['id']?>'><i class = 'fa fa-eye' style='color: #FFF;'></i></a>
								</div>
								<div class='caption text-center'>
									<div class='col-xs-12 prod_name'>
										<h4 class = 'text-uppercase'><?php echo $product['prod_name'] ?></h4>
									</div>
									<div class='col-xs-6'>
										<span class='price float-left'><?php echo number_format($price_new)?>đ</span>
									</div>
									<?php if($price_new!==$product['price']){ ?>
										<div class='col-xs-6'><!-- show giá cũ khi có khuyến mãi -->
											<s class='price $show float-left'><?php echo number_format($product['price'])?>đ</s>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?> <br> 
						<!-- end show product -->
				</div>
			</div>
		</div>
</div>