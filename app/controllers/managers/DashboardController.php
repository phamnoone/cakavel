<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class DashboardController extends ManagersController
{
    const CURRENT_PAGE = 1;
    const LIMIT = 3;

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

    public function teachers()
    {
        $current_page;
        $resultList = null;
        $userProfile = $this->manager;
        $this->model('TeachersModel');

        if (empty($_GET['page'])) {
            $current_page = self::CURRENT_PAGE;
        } else {
            $current_page = (int)$_GET['page'];
        }
        $total_records = $this->TeachersModel->totalPage();
        $total_page = (int)ceil($total_records["totals"]/self::LIMIT);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

        $start = ($current_page - 1) * self::LIMIT;
        $resultList = $this->TeachersModel->listInfor($start,self::LIMIT);

        $this->view('managers/dashboard/managerteachers', [
            'manager' => $userProfile,
            'resultList' => $resultList,
            'current_page' => $current_page,
            'total_page' => $total_page
        ]);
    }

    public function addTeacher()
    {
        $message = '';
        if ($this->method === 'POST') {
            if (empty($_FILES['image']['name'])) {
                $_FILES['image']['name'] = '';
            }
            $inforteacher = $this->data;     
            $this->model('TeachersModel');
            if ($this->TeachersModel->checkUser($inforteacher['user'])){
                $uploadImage = new UploadImgHelper('image');
                $uploadImage->upLoadFile();
                $message = $uploadImage->messimg;
                if(strlen($message)==0){
                    $this->TeachersModel->addUser($inforteacher,$_FILES['image']['name']);
                }
            } else {
                $message = 'Tài khoản đã tồn tại !';
            }
        }

        $this->view('managers/dashboard/addteachers',[
            'message' => $message
        ]);
    }

    public function deleteTeacher()
    {
        $this->model('TeachersModel');
        var_dump($_GET['id']);
        $this->TeachersModel->deleteUser($_GET['id']);
    }

    public function editTeacher()
    {
        $message = '';

        $this->view('managers/dashboard/editteachers',[
            'message' => $message
        ]);
    }
}
