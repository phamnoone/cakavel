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
            <img src="<?php echo '../public/images/'.$thongdiep; ?>" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,</span>
            <h2><?php echo strtoupper($admin); ?></h2>
          </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>DashBoard</h3>
            <ul class="nav side-menu">
              <li><a href="/dashboard/admin"><i class="fa fa-home"></i> Home </a></li>
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