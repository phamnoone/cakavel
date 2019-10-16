<center>
  <h3>XIN CHÀO <?php echo strtoupper($admin); ?></h3>
</center>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
        <h2><?php echo strtoupper($admin); ?> Profile</h2>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 ">
        <div class="container">
          <h2>Thông tin cá nhân</h2>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu3">Đổi mật khẩu</a></li>
          </ul>
          <div class="row">
            <div class="col-lg-8">
              <div class="well">
                <div id="myTabContent" class="tab-content">
                  <div id="menu3" class="tab-pane fade in active">
                    <form method="POST">
                      <label>Mật khẩu cũ</label>
                      <input id="myInput" style="margin:10px 0px 10px 25px;" name="passold" type="password" value="" required class="input-xlarge myInput">
                      <br>
                      <label>Mật khẩu mới</label>
                      <input id="myInput" style="margin:10px 0px 10px 16px;" name="passnew" type="password" value="" required class="input-xlarge myInput">
                      <br>
                      <label>Xác nhận lại</label>
                      <input id="myInput" style="margin:10px 0px 10px 24px;" name="passconfirm" type="password" value="" required class="input-xlarge myInput">
                      <br>
                      <div class="form-check" style="text-align: initial; margin-bottom: 15px;">
                        <input type="checkbox" onclick="myFunction()" name="checkpass">
                        <label class="form-check-label" for="exampleCheck1">Hiển thị mật khẩu</label>
                      </div>
                      <br>
                      <center>
                        <h2 style="color: red;"><?php echo $mess; ?></h2>
                      </center>
                      <br>
                      <input type="submit" class="btn btn-primary" style="margin-top: 10px;" value="Đổi mật khẩu" />
                    </form>
                    <script>
                      function myFunction()
                      {
                        var x = document.getElementsByClassName("myInput");
                        for (i = 0; i < x.length; i++)
                        {
                          if (x[i].type === "password")
                          {
                            x[i].type = "text";
                          }
                          else
                          {
                            x[i].type = "password";
                          }
                        }
                      }
                    </script>
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
