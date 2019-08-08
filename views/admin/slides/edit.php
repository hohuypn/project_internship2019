	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h3>Sửa ảnh slide show</h3></a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form method="POST" action="index.php?controller=slide&action=update&page=admin" enctype="multipart/form-data">
					<div>
						<?php foreach ($editslide as $value): ?>
							<label>Chọn ảnh</label>
							<input type="file" name="images">
							<img src="<?php echo $value['image'] ?>" width="100" height="100">
						<?php endforeach ?>
					</div>
					<div class="addCate">
						<input type="hidden" name="id" value="<?php echo $value['id'] ?>">		
						<input type="submit" name="editslides" value="Cập nhật" class="btn save-submit">
					</div>
				</form>
			</div>
		</div>
	</div>