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
            //REQUIRE viết lại đoạn update
        }
        $this->view('managers/dashboard/admin', [
            'manager' => $this->manager,
            'message' => $message,
        ]);
    }



    public function changePassword()
    {
        // tham khao change profile
    }
}
