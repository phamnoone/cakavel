 <div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <?php require_once "menu.php"; ?>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <?php require_once "nav_menu.php"; ?>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
      <!-- top tiles -->
      <center><h3>XIN CHÀO <?php echo strtoupper($admin); ?></h3></center>

      <div id="content-wrapper">

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">  <h2>THÔNG TIN <?php echo strtoupper($admin); ?></h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
             <div class="form-group" style="margin-left: 22%;margin-right: 10px;">
              <select class="form-control" name="category">
                <option>Username</option>
                <option>Email</option>
              </select>
            </div>
            <!-- Search form -->
            <div class="active-cyan-3 active-cyan-2 mb-2">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </div>
            <a style="margin-left: 10px;height: 100%;"  href="" class="btn btn-info  btnadd">Tìm kiếm</a>
          </div>
        </div>
        <!-- Single button -->
        <hr>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">Danh sách quản lí giảng viên</a>
          </li>
          <li class="breadcrumb-item"></li>
        </ol>
        <!-- Page Content -->
        <hr>
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15px;">STT</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 30px;">Tên Tài khoản</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">Tên</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Ảnh</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 80px;">Email</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 70px;">Địa Chỉ</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 70px;">Phone</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 92px;">Mô tả</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 92px;">Hành Động</th>

            </tr>
          </thead>
          <tbody>
            <tr role="row" class="odd">
              <td class="sorting_1">1</td>
              <td>tieu de</td>
              <td>anh</td>
              <td>noi dung</td>
              <td>loai tin</td>
              <td>ngay</td>
              <td>ngay</td>
              <td>ngay</td>
              <td style="display: flex;">
                <a type="button"  class="btn btn-xs btn-info btnsua" href=""  >Sửa</a>
                <a type="button"  class="btn btn-xs btn-info btnsua" href=""  >Xóa</a>
              </td>
            </tr>
          </tbody>
        </table>
        <ul class="pull-right pagination justify-content-end">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4 </a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<footer>
  <div class="">
    <center><h5>Dashboard Amin Manager Designed by Văn Phễn</h5></center>
  </div>
  <div class="clearfix"></div>
</footer>
</div>
</div>
