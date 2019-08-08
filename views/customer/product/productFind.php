
<div class="productHOT">
	<div class="row"  id="sanphamtimkem">
		<!-- gọi show ra sp cùng chung danh mục () -->
		<?php foreach ($select_find as $key ) {
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
<!-- end show productPromotion -->
