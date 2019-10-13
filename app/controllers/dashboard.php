<?php
require 'Zmanagers.php';
require 'UploadImageHellper.php';

class Dashboard extends Zmanagers{

  function admin () {
    $messageUpdate = '';
    $messimg = '';
    $this->model('AdministratorsModel');
    $userProfile = $this->AdministratorsModel->infor($_SESSION['username']);
    $_SESSION['urlimg'] = $userProfile['image'];
    if ($this->method === 'POST') {
        $profileUpdate = $this->data;
        if ($profileUpdate['nameprofile'] == $userProfile['name'] && $profileUpdate['description'] == $userProfile['note'] && empty($_FILES['image']['name']) ){
            $messageUpdate = 'Bạn chưa thay đổi thông tin !';
        } else {
              if (empty($_FILES['image']['name'])){
                  $_FILES['image']['name'] = $userProfile['image'];
              }
              $namefile = 'image';
              $name = new UploadImageHellper($namefile);
              $name->upLoadFile();
              $messimg = $name->messimg;
              if ($this->AdministratorsModel->updateInfor($profileUpdate['nameprofile'], $_FILES['image']['name'], $profileUpdate['description'], $_SESSION['username'])) {
                  $messageUpdate = '';
                  header("Location: /dashboard/admin");   
              } else {
                    $messageUpdate = 'Cập nhật không thành công !';
              }
        }
    }
    $this->view('template/managers/header');
    $this->view('main/managers',[
        'admin' => $_SESSION['username'],
        'nameprofile' => $userProfile['name'],
        'thongdiep' => $userProfile['image'],
        'noteprofile' => $userProfile['note'],
        'messageUpdate' => $messageUpdate,
        'messimg' =>$messimg
    ]);
    $this->view('template/managers/footer');
  }

  function logout() {
    $this->model('AdministratorsModel');
    $this->AdministratorsModel->insertToken(NULL,$_SESSION['username']);
    unset($_SESSION['token_admin']);
    unset($_SESSION['username']);
    header("Location: /managers/login");
  }

  function changePassword() {
    $messageUpdate = '';
    if ($this->method === 'POST') {
        $this->model('AdministratorsModel');
        $passUpdate = $this->data;
        $passold = sha1($passUpdate['passold']);
        $passnew = sha1($passUpdate['passconfirm']);
        if ($this->AdministratorsModel->checkLogin($_SESSION['username'], $passold)){
            if ($passUpdate['passnew'] == $passUpdate['passconfirm']) {
                $this->AdministratorsModel->updatePass($passnew, $_SESSION['username']);
                $messageUpdate = 'Đổi mật khẩu thành công !';
            } else {
                  $messageUpdate = 'Xác nhận mật khẩu không trùng khớp !';
            }
        } else {
              $messageUpdate = 'Mật khẩu cũ không chính xác';
        }
    }
    $this->view('template/managers/header');
    $this->view('main/changepass',[
        'admin' => $_SESSION['username'],
        'thongdiep' =>  $_SESSION['urlimg'],
        'mess' => $messageUpdate
    ]);
    $this->view('template/managers/footer');
  }
}

?>