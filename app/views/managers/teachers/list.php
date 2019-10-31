<center>
  <h3>XIN CHÀO <?php echo strtoupper($profileAdmin['username']); ?></h3>
</center>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
        <h2>QUẢN LÍ TÀI KHOẢN GIÁO VIÊN</h2>
      </div>
      <form action="list" method="POST">
        <div class="col-lg-6 col-md-6 col-sm-12" style="display: flex;">
          <div class="form-group" style="margin-left: 26%;margin-right: 10px;">
            <select class="form-control" name="selected">
              <option>username</option>
              <option>email</option>
            </select>
          </div>
          <div class="active-cyan-3 active-cyan-2 mb-2">
            <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
          </div>
          <input style="margin-left: 10px;height: 100%;" type="submit"  href="" class="btn btn-info  btnadd" value="Tìm Kiếm" />
        </div>
      </form>
    </div>
    <hr>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="">Danh sách quản lí giảng viên</a>
      </li>
      <li class="breadcrumb-item">
        <a style="margin-left: 10px;height: 100%;"  href="" class="btn btn-primary  btnadd">Thêm mới</a>

      </li>

      <li class="breadcrumb-item"></li>
    </ol>
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
        <?php
        if(!empty($resultList) && $page['current']>=0 && $page['current'] <= $page['total']){
          for ($i=0; $i < count($resultList) ; $i++) {
            ?>
            <tr role="row" class="odd">
              <td><?php  echo $i+1; ?></td>
              <td><?php  echo $resultList[$i]['username']; ?></td>
              <td><?php  echo $resultList[$i]['name']; ?></td>
              <td><?php  echo $resultList[$i]['image']; ?></td>
              <td><?php  echo $resultList[$i]['email']; ?></td>
              <td><?php  echo $resultList[$i]['address']; ?></td>
              <td><?php  echo $resultList[$i]['phone']; ?></td>
              <td><?php  echo $resultList[$i]['description']; ?></td>
              <td style="display: flex;">
                <a type="button"  class="btn btn-xs btn-info btnsua" href="/managers/editTeacher?id=<?php echo $resultList[$i]['id']; ?>"  >Sửa</a>
                <a type="button"  class="btn btn-xs btn-info btnsua" href="/managers/deleteTeacher?id=<?php echo $resultList[$i]['id']; ?>"  >Xóa</a>
              </td>
            </tr>
            <?php 
          }
        }  else {
            echo '<tr role="row" class="odd"><td style="color: red;"> NO SOUND DATA </td></tr>';
          }
        ?>
      </tbody>
    </table>
    <ul class="pull-right pagination justify-content-end">
      <?php
      if ($page['current'] >= 0 && $page['current'] <= $page['total']) {
        if ($page['current'] > 1 && $page['total'] > 1){
            echo '<li class="page-item"><a class="page-link" href="/managers/teachers/list?page='.($page['current']-1).'">Prev</a></li>';
        }
        for ($i = 1; $i <= $page['total']; $i++){
            echo '<li class="page-item"><a class="page-link" href="/managers/teachers/list?page='.$i.'">'.$i.'</a></li>';
        }
        if ($page['current'] < $page['total'] && $page['total'] > 1){
          echo '<li class="page-item"><a class="page-link" href="/managers/teachers/list?page='.($page['current']+1).'">Next</a></li>';
        }
      }
      ?>
    </ul>
  </div>
</div>