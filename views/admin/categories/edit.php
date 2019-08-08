	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h3>Sửa danh mục sản phẩm</h3></a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<?php foreach ($cateselect as $value): ?>
					<form method="POST" action="index.php?controller=category&action=update&page=admin">
						
						<div>						
							<label>Tên</label>
							<input type="text" name="cate_name" class="form-control" style="width: 50%" value="<?php echo $value['cate_name'] ?>" required>					
						</div>
						<div class="addCate">
							<input type="hidden" name="id" value="<?php echo $value['id'] ?>"/>
							<input type="submit" name = "editCate"class="btn btn-primary" value="Cập nhật">
						</div>
					</form>
				<?php endforeach ?>
			</div>
		</div>
	</div>