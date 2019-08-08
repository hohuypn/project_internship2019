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
									<hr> <!-- show ngày custommer comment -->
									<div class="maincomment">
										<?php echo $key['message']; ?> 
									</div> <!-- show comment của custommer -->
									<div class="daycomment">
										<?php echo  $key['date']; ?> 
									</div> <!-- show ngày comment của custommer (lấy thời gian của customer khi họ cmt) -->
								</div> 
							</div> <br>
						<?php } ?>