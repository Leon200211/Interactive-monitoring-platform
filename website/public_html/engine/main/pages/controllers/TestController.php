<?php


namespace engine\main\pages\controllers;


use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;

class TestController extends BaseController
{
    public function index()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }


        $apparts = [
            '147' => ['M 280.73118,57.782557 V 2.5567503 H 38.095579 V 166.18877 h 92.298691 v -16.10753 h 7.1589 v -47.55555 h 5.1135 v 9.45997 h 27.10155 V 57.271207 Z', '55.94415506397067,37.76951894686876'],
            '84' => ['M 280.73118,57.782557 V 2.5567503 H 38.095579 V 166.18877 h 92.298691 v -16.10753 h 7.1589 v -47.55555 h 5.1135 v 9.45997 h 27.10155 V 57.271207 Z', '55.94415506397067,37.76951894686876'],
            '85' => ['M 280.73118,57.782557 V 2.5567503 H 38.095579 V 166.18877 h 92.298691 v -16.10753 h 7.1589 v -47.55555 h 5.1135 v 9.45997 h 27.10155 V 57.271207 Z', '55.94415506397067,37.76951894686876'],
            '86' => ['M 280.73118,57.782557 V 2.5567503 H 38.095579 V 166.18877 h 92.298691 v -16.10753 h 7.1589 v -47.55555 h 5.1135 v 9.45997 h 27.10155 V 57.271207 Z', '55.94415506397067,37.76951894686876'],
        ];
        $viewBox = '0 0 365 845';
        $idFloor = 317; // id первого этажа из бд
        for ($i = 2; $i < 4; $i++){
            foreach ($apparts as $key => $appart){
                $this->model->add('apartments', [
                    'fields' => [
                        'id_floor' => $idFloor,
                        'apartment_number' => $key + (count($apparts) * ($i-2)),
                        'polygon_points' => $appart[0],
                        'viewBox' => $viewBox,
                        'coordinates' => $appart[1]
                    ]
                ]);
            }
            $idFloor += 1; // Увеличиваем id на 1 так как в бд все по порядку
        }

        echo 123;
        exit();

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/zk-cards');
    }
}