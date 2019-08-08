<table class="table" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th></th>
			<th>Sản Phẩm</th>
			<th>Số lượng</th>
			<th>Giá</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(isset($select_order_detail)&&!empty($select_order_detail)){
			foreach ($select_order_detail as $key => $value) {
				?>
				<tr>
					<td>
						<?php $image=explode(',', $value['image']); ?>
						<img src="<?= $image[0]?>" alt="" width="100" height="100">
					</td>
					<td><?php echo $value['prod_name'] ?></td>
					<td><?php echo $value['quantity'] ?></td>
					<td><?php echo $value['price'] ?></td>
				</tr>
				<?php
			}
		}

		 ?>
		
	</tbody>
</table>