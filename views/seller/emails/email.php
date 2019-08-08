<div class="registration-form">
    <div class="row">
     <div class="xem_anh" style="float: left;">
<a href="index.php?controller=email&action=sendMail&page=seller"> <button type="button" class="btn btn-primary">Quay lại danh sách sản phẩm</button></a> 
</div>
  </div>
            <form method="post" action="index.php?controller=user&action=send_email&page=seller" enctype="multipart/form-data" accept-charset="utf-8">
                <h3 class="text-center">Điền Đầy Đủ Thông Tin Để Gửi Mail</h3>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Tên Người Nhận</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="send_to"   placeholder="địa chỉ người nhận" required></div>
                </div>
                </div>
                <div class="form-group">
                 <div class="row">
                    <div class="col-2"> <center>Chủ Đề Mail</center> </div>
                    <div class="col-10"><center><input class="form-control item" type="text" name="subject" value="SHOPPY Cam - Quyet - Huy"  placeholder="Chủ đề của email" required></div>
                </div>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-2"> <center>Nội Dung Email</center> </div>
                    <textarea name="content" placeholder="nội dung bạn muốn truyền tải" style="width: 800px; height: 300px"></textarea>
                </div>
                </div>
                  
                <div class="form-group">
                    <center><button class="btn btn-primary btn-block create-account" type="submit" name="send">Gửi Mail</button></center>
                </div>

            </form>
        </div>