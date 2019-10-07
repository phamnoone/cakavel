 <div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="" class="site_title"><i class="fa fa-paw"></i> <span>WELCOME TLU !</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="/public/images/img.jpg" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2>Admin</h2>
          </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>DashBoard</h3>
            <ul class="nav side-menu">
              <li><a href=""><i class="fa fa-home"></i> Home </a></li>
              <li><a><i class="fa fa-edit"></i> Quản lí giảng viên </a></li>
              <li><a><i class="fa fa-desktop"></i> Quản lí sinh viên </a></li>
              <li><a><i class="fa fa-table"></i> Quản lí môn học </a></li>
              <li><a><i class="fa fa-bar-chart-o"></i> Quản lí lớp học </a></li>
              <li><a><i class="fa fa-clone"></i> Quản lí danh mục bài viết </a></li>
            </ul>
          </div>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="/public/images/img.jpg" alt="">Admin
                <span class=" fa fa-angle-down"></span>
              </a>

              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="admin"> Profile</a></li>
                <li><a href="logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
              </ul>
            </li>
  


            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <li>
                  <a>
                    <span class="image"><img src="/public/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/public/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/public/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/public/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <div class="text-center">
                    <a>
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
      <!-- top tiles -->
      <center><h3>XIN CHÀO ADMIN</h3></center>

      <div id="content-wrapper">

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">  <h2>THÔNG TIN ADMIN</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
             <div class="form-group" style="margin-left: 22%;margin-right: 10px;">
              <select class="form-control" name="category">
                <option>ID</option>
                <option>Name</option>
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
            <a href="">Home</a>
          </li>
          <li class="breadcrumb-item"></li>
        </ol>
        <!-- Page Content -->
        <hr>
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15px;">STT</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 30px;">Tiêu đề</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 118px;">Ảnh</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Nội dung</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Loại tin</th>
              <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 92px;">Ngày</th>
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
              <td style="display: flex;">
                <a    type="button"  class="btn btn-xs btn-info btnsua" href=""  >Sửa</a>
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