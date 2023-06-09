<?php

namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;

class ReportController extends BaseController
{

    protected $projects = [];
    protected $report_file;


    public function index()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }

        // метод для проверки доступа
        //$this->allAccessCheck();

        $id_house = $_REQUEST['id_house'];

        $this->report_file = $this->model->read('houses', [
            'fields' => ['report'],
            'where' => ['id' => $id_house]
        ])[0]['report'];

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/report');
    }

}