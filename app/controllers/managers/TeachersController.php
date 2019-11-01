<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class TeachersController extends ManagersController
{
    public function beforeRender()
    {
        parent::beforeRender();
        $this->model('TeachersModel');
    }

	public function list()
    {
        $profileAdmin = $this->manager;
        $getData = $this->query;
        $page = [
            'current' => 0,
            'total' => 0,
            'limit' => 10,
            'start' => 0
        ];
        $resultList = null;
        $page['current'] = (empty($getData['page'])) ? 1 : (int)$getData['page'];
        $page['total'] = $this->TeachersModel->totalPage();
        $page['total'] = (int)ceil($page['total']["totals"]/$page['limit']);

        if ($page['current'] >= 0 && $page['current'] <= $page['total']) {
            $page['start'] = ($page['current'] - 1) * $page['limit'];
            $resultList = $this->TeachersModel->getPages($page);
            if ($this->method === "POST") {
                $dataSearch = $this->data;
                $resultList = $this->TeachersModel->search($dataSearch);
                $page['total'] =1;
                if ($resultList[0] == false) {
                    $resultList = null;
                }
            }
        }

        $this->view('managers/teachers/list', [
            'profileAdmin' => $profileAdmin,
            'resultList' => $resultList,
            'page' => $page
        ]);            
    }
}