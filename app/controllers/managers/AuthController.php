<?php
require 'ManagersController.php';

class AuthController extends ManagersController
{
    const COST_TIME = 3600;


    public function __contruct()
    {
        parent::__contruct();
        $this->isLoginPage = true;
    }


    public function beforeRender()
    {
        $this->model('AdministratorsModel');

        $this->view('template/login/header');
    }


    public function afterRender()
    {
        $this->view('template/login/footer');
    }


    public function login()
    {
        $message = '';
        if ($this->method === 'POST') {
            $admin = $this->data;
            $admin['password'] = sha1($admin['password']);

            if ($this->AdministratorsModel->login($admin)) {
                $token= sha1($admin['username'] . $admin['password'] . time() . rand());
                $this->AdministratorsModel->updateToken($admin['username'], $token);
                $_SESSION['token_admin'] = $token;
                $this->redirect("/managers/dashboard/admin");
            } else {
                $message = "Đăng nhập không thành công !";
            }
        }

        $this->view('managers/login', [
            'message' => $message
        ]);
    }

    public function logout()
    {
        $this->AdministratorsModel->updateToken($this->manager['username'], null);
        unset($_SESSION[self::TOKEN_KEY]);
        $this->redirect("/managers/auth/login");
    }
}
