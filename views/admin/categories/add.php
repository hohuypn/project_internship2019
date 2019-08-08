	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h3>Thêm danh mục sản phẩm</h3></a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form method="POST" action="index.php?controller=category&action=InsertCate&page=admin">
					<div>						
						<label>Tên danh mục</label>
						<input type="text" name="cate_name" class="form-control" style="width: 50%" placeholder="Nhập tên danh mục" required>					
					</div>
					<div class="addCate">						
						<input type="submit" name="addCate" value="Thêm" class="btn save-submit">
					</div>
				</form>
			</div>
		</div>
	</div>