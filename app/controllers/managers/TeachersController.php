<?php
require 'ManagersController.php';
require './app/helpers/UploadImgHelper.php';

class TeachersController extends ManagersController
{
    const CURRENT_PAGE = 1;
    const LIMIT = 3;

	public function list()
    {
        $this->model('TeachersModel');
        $current_page;
        $resultList = null;
        $userProfile = $this->manager;

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
        $resultList = $this->TeachersModel->getPages($start,self::LIMIT);
        if ($this->method === "POST") {
            $infoSearch = $this->data;
            $resultList = $this->TeachersModel->search($infoSearch);
            $total_page =0;
            if ($resultList[0] == false) {
                $resultList = null;
            }
        }

        $this->view('managers/teachers/managerteachers', [
            'manager' => $userProfile,
            'resultList' => $resultList,
            'current_page' => $current_page,
            'total_page' => $total_page
        ]);
    }

    public function edit()
    {
        
    }
}