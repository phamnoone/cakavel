<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class DashboardController extends ManagersController
{
    public function admin()
    {
        $message = [
            'update' => '',
            'image' => ''
        ];

        $userProfile = $this->manager;

        if ($this->method === 'POST') {
            $profileUpdate = $this->data;
            if ($profileUpdate['nameprofile'] == $userProfile['name'] && $profileUpdate['description'] == $userProfile['note'] && empty($_FILES['image']['name'])) {
                $message['update'] = 'Bạn chưa thay đổi thông tin !';
            } else {

                //REQUIRE viết lại đoạn update
                if (empty($_FILES['image']['name'])) {
                    $_FILES['image']['name'] = $userProfile['image'];
                }
                $image = new UploadImgHelper('image');
                $image->upLoadFile();
                $message['image'] = $image->messimg;
                if ($this->AdministratorsModel->updateInfor($profileUpdate['nameprofile'], $_FILES['image']['name'], $profileUpdate['description'], $_SESSION['username'])) {
                    $message['update'] = '';
                    $this->redriect("/managers/dashboard/admin");
                } else {
                    $message['update'] = 'Cập nhật không thành công !';
                }
            }
        }
        $this->view('managers/admin', [
            'manager' => $this->manager,
            'message' => $message,
        ]);
    }



    public function changePassword()
    {
        // tham khao change profile
    }
}
