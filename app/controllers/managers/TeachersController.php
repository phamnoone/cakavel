<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class TeachersController extends ManagersController
{
    const currentPage = 1;
    const LIMIT = 3;

	public function list()
    {
        $this->model('TeachersModel');
        $currentPage;
        $resultList = null;
        $profileAdmin = $this->manager;
        $getData = $this->query;

        if (empty($getData['page'])) {
            $currentPage = self::currentPage;
        } else {
            $currentPage = (int)$getData['page'];
        }
        $totalRecords = $this->TeachersModel->totalPage();
        $totalPage = (int)ceil($totalRecords["totals"]/self::LIMIT);
        if ($currentPage > $totalPage){
            $currentPage = $totalPage;
        }
        else if ($currentPage < 1){
            $currentPage = 1;
        }

        $start = ($currentPage - 1) * self::LIMIT; 
        $resultList = $this->TeachersModel->getPages($start,self::LIMIT);
        if ($this->method === "POST") {
            $dataSearch = $this->data;
            $resultList = $this->TeachersModel->search($dataSearch);
            $totalPage =0;
            if ($resultList[0] == false) {
                $resultList = null;
            }
        }

        $this->view('managers/teachers/managerteachers', [
            'profileAdmin' => $profileAdmin,
            'resultList' => $resultList,
            'currentPage' => $currentPage,
            'totalPage' => $totalPage
        ]);
    }
}