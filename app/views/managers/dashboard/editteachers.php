<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
        <a style="margin-left: 10px;height: 100%;"  href="teachers" class="btn btn-primary  btnadd">Trở về</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 ">
        <div class="container">
          <h2>Thông tin cá nhân</h2>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu2">Thông tin</a></li>
          </ul>
          <div class="row">
            <div class="col-lg-8">
              <div class="well">
                <div id="myTabContent" class="tab-content">
                  <div id="menu2" class="tab-pane fade in active">
                    <div class="tab-pane in" id="home">
                      <form method="POST" action="addTeacher" enctype="multipart/form-data">
                        <label>Tài khoản</label>
                        <input style="margin:10px 0px 10px 20px;" required   name="user"  type="text" value="" class="input-xlarge">
                        <br>
                        <label>Tên</label>
                        <input style="margin-left: 58px;margin-bottom: 10px;" name="name" required type="text" value="">
                        <br>
                        <label>Email</label>
                        <input style="margin-left: 46px;margin-bottom: 10px;" name="email" required type="email" value="" class="input-xlarge">
                        <br>
                        <label>Địa chỉ</label>
                        <input style="margin-left: 38px;margin-bottom: 10px;" name="address" required type="text" value="" class="input-xlarge">
                        <br>
                        <label>Phone</label>
                        <input style="margin-left: 41px;margin-bottom: 10px;" name="phone" required type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  value="" class="input-xlarge">
                        <br>
                        <label>Mô tả</label>
                        <br>
                        <textarea rows="2" cols="50" style="margin-left: 43px;" name="description"></textarea>
                        <br>
                        <label>Ảnh</label>
                        <input type="file" onchange="showImage.call(this)" name="image" value="">
                        <h2 style="color: red;text-align: center;margin-top: 16px;"><?php echo  $message ?></h2>
                        <input type="submit" class="btn btn-primary" style="margin-top: 20px;" name="uploadclick" value="Thêm mới" />
                      </form>
                    </div>
                  </div>
                  <div id="menu3" class="tab-pane fade">
                    <script>
                      function showImage()
                      {
                        if (this.files && this.files[0])
                        {
                          var obj = new FileReader();
                          obj.onload = function(data)
                          {
                            var image = document.getElementById("image");
                            image.src = data.target.result;
                          }
                          obj.readAsDataURL(this.files[0]);
                        }
                      }
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="d-flex justify-content-center h-100">
                <div class="image_outer_container thung">
                  <div class="image_inner_container">
                    <img src="/public/images/user.png" id="image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div>
  </div>
</div>
