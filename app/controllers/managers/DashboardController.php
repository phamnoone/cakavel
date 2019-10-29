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

        if ($this->method === 'POST') {
            $userUpdate = $this->data;
            if ($userUpdate['nameprofile'] == $userProfile['name'] && $userUpdate['description'] == $userProfile['note'] && empty($_FILES['image']['name']) ) {
                $message['update'] = 'Bạn chưa thay đổi thông tin !';
            } else {
                if (empty($_FILES['image']['name'])) {
                    $_FILES['image']['name'] = $userProfile['image'];
                }
                $userProfile['name'] = $userUpdate['nameprofile'];
                $userProfile['note'] = $userUpdate['description'];
                $userProfile['image'] = $_FILES['image']['name'];
                $uploadImage = new UploadImgHelper('image');
                $uploadImage->upLoadFile();
                $message['update'] = $uploadImage->messimg;
                if ($this->AdministratorsModel->updateInfor($userProfile)) {
                    $message['update'] = 'Cập nhật thành công !';
                } else {
                    $message['update'] = 'Cập nhật không thành công !';
                }
            }
        }

        $this->view('managers/dashboard/admin', [
            'manager' => $userProfile,
            'message' => $message
        ]);
    }

    public function password()
    {
        $message = '';
        $userProfile = $this->manager;
        if ($this->method === 'POST') {
            $passUpdate = $this->data;
            $accout = [
                'username' => $userProfile['username'],
                'password' => sha1($passUpdate['passold'])
            ];
            if ($this->AdministratorsModel->login($accout)) {
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
            'message' => $message
        ]);
    }
}
