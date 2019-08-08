	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h3>Thêm ảnh slide show</h3></a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form method="POST" action="index.php?controller=slide&action=insert&page=admin" enctype="multipart/form-data">
					<div>						
						<label>Chọn ảnh</label>
						<input type="file" name="images">					
					</div>
					<div class="addCate">						
						<input type="submit" name="addslide" value="Thêm" class="btn save-submit">
					</div>
				</form>
			</div>
		</div>
	</div>