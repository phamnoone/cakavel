<?php
class ManagersController extends Controller
{
    const TOKEN_KEY = 'token_admin';
    const REDRIECT_URL = '/managers/auth/login';
    public $isLoginPage = false;
    public $manager = null;

    public function beforeRender()
    {
        $this->model('AdministratorsModel');
	if ((empty($_SESSION[self::TOKEN_KEY]) || !$this->AdministratorsModel->checkAuthenWithToken($_SESSION[self::TOKEN_KEY])) && !$this->isLoginPage) {
	$this->redirect(self::REDRIECT_URL);
        } else {
            $this->manager = $this->AdministratorsModel->getWithToken($_SESSION[self::TOKEN_KEY]);
        }

        $this->view('template/managers/header', [
            'manager' => $this->manager
        ]);
    }

    public function afterRender()
    {
        $this->view('template/managers/footer');
    }
}
