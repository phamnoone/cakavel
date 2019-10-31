<?php
class ManagersController extends Controller
{
    const TOKEN_KEY = 'token_admin';
    const REDRIECT_URL = '/managers/auth/login';

    public $manager = null;
 
    public function beforeRender()
    {
        $this->model('AdministratorsModel');
        $this->model('TeachersModel');
        if (empty($_SESSION[self::TOKEN_KEY]) || !$this->AdministratorsModel->checkAuthenWithToken($_SESSION[self::TOKEN_KEY])) {
            $this->redirect(self::REDRIECT_URL);
        }

        $this->manager = $this->AdministratorsModel->getWithToken($_SESSION[self::TOKEN_KEY]);

        $this->view('template/managers/header', [
            'manager' => $this->manager
        ]);
    }

    public function afterRender()
    {
        $this->view('template/managers/footer');
    }
}
