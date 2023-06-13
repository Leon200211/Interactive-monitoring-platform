<?php


namespace engine\main\pages\controllers;


use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;

class UploadFileController extends BaseController
{

    public function index()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



//        if(!$this->accessRightsChecker->isAutorized()){
//            $this->redirect('/login');
//        }

        // метод для проверки доступа
        //$this->allAccessCheck();

        $res = [
          'req' => $_REQUEST,
          'file' => $_FILES
        ];

        file_put_contents(__DIR__ . '/test.log', print_r($res, 1), FILE_APPEND);

        $token = 'qwerty';
        if($token != $_REQUEST['token']){
            exit('Access denied');
        }

        if(empty($_REQUEST['id_house_in_db'])){
            exit('Нет номера дома');
        }

        $id_house_in_db = $_REQUEST['id_house_in_db'];

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/files/report/';
        $uploadfile = $uploaddir . "report_$id_house_in_db.xlsx";




        echo '<pre>';
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";

            $this->model->update('houses', [
                'fields' => [
                    'report' => "report_$id_house_in_db.xlsx"
                ],
                'where' => [
                    'id' => $id_house_in_db
                ]
            ]);

        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);
        print "</pre>";


    }

    public function outputData()
    {
        //return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/report');
    }
}