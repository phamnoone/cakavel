<?php
require 'Zmanagers.php';
require 'UploadImageHellper.php';

class Dashboard extends Zmanagers{

  function admin () {
    $thongdiep ='';
    $message = '';
    $messageUpdate = '';
    $messimg = '';
    $this->model('AdministratorsModel');
    $userProfile = $this->AdministratorsModel->infor($_SESSION['username']);
    if ($this->method === 'POST') {
        $profileUpdate = $this->data;
        if ($profileUpdate['nameprofile'] == $userProfile['name'] && $profileUpdate['description'] == $userProfile['note']){
          $messageUpdate = 'Bạn chưa thay đổi thông tin !';
        } else {
              $namefile = 'image';
              $name = new UploadImageHellper($namefile);
              $name->upLoadFile();
              $messimg = $name->messimg;
              $thongdiep = $_FILES['image']['name'];
              if (!$this->AdministratorsModel->updateInfor($profileUpdate['nameprofile'], $thongdiep, $profileUpdate['description'], $_SESSION['username'])) {
                 $messageUpdate = 'Cập nhật không thành công !';
              } else {
                    $messageUpdate = '';
                    header("Location: /dashboard/admin");
              }
        }

    }

    $this->view('template/managers/header');
    $this->view('main/managers',[
        'admin' => $_SESSION['username'],
        'nameprofile' => $userProfile['name'],
        'thongdiep' => $thongdiep,
        'noteprofile' => $userProfile['note'],
        'messageprofile' => $message,
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
}

?>