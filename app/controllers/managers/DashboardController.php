<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class DashboardController extends ManagersController
{
    public function admin()
    {
        $message = [
            'update' => '',
        ];

        $userProfile = $this->manager;
        $info = [
            'name' => $userProfile['name'],
            'image' => $userProfile['image'],
            'note' => $userProfile['note'],
            'username' => $userProfile['username']
        ];

        if ($this->method === 'POST') {
            $userprofileUpdate = $this->data;
            if ($userprofileUpdate['nameprofile'] == $userProfile['name'] && $userprofileUpdate['description'] == $userProfile['note'] && empty($_FILES['image']['name']) ){
                $message['update'] = 'Bạn chưa thay đổi thông tin !';
            } else {
                  if (empty($_FILES['image']['name'])){
                      $_FILES['image']['name'] = $userProfile['image'];
                  }
                  $info = [
                      'name' => $userprofileUpdate['nameprofile'],
                      'image' => $_FILES['image']['name'],
                      'note' => $userprofileUpdate['description'],
                      'username' => $userProfile['username']
                  ];
                  $name = new UploadImgHelper('image');
                  $name->upLoadFile();
                  $message['update'] = $name->messimg;
                  if ($this->AdministratorsModel->updateInfor($userProfile['username'], $info)) {
                      $message['update'] = '';
                  } else {
                        $message['update'] = 'Cập nhật không thành công !';
                    }
            }
        }

        $this->view('managers/dashboard/admin', [
            'manager' => $info,
            'message' => $message
        ]);
    }

    public function changePassword()
    {
        $message = '';
        $userProfile = $this->manager;
        if ($this->method === 'POST') {
            $passUpdate = $this->data;
            $pass = [
                'username' => $userProfile['username'],
                'password' => sha1($passUpdate['passold'])
            ];
            if ($this->AdministratorsModel->login($pass)){
                if ($passUpdate['passnew'] == $passUpdate['passconfirm']) {
                    $this->AdministratorsModel->updatePassword($userProfile['username'],sha1($passUpdate['passconfirm']));
                    $message = 'Đổi mật khẩu thành công !';
                } else {
                      $message = 'Xác nhận mật khẩu không trùng khớp !';
                  }
            } else {
                  $message = 'Mật khẩu cũ không chính xác';
              }
        }

        $this->view('managers/dashboard/changepass', [
            'manager' => $userProfile,
            'mess' => $message
        ]);
    }
}
