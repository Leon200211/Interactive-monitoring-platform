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
            '161' => ['m 173.85902,609.78495 v 18.91995 h 5.62485 v 15.59618 H 281.75388 V 535.38351 H 181.01792 v 24.28913 h 2.55675 v 12.52808 h -9.45997 z', '55.94382879763283,37.76950438227846'],
            '162' => ['M 181.52927,810.23417 H 281.75388 V 647.1135 H 178.97252 v 58.03823 h 2.55675 z', '55.94375955716598,37.76949365344239'],
            '163' => ['m 38.095579,701.31661 h 93.321391 v 23.77778 h 45.76583 v 85.39546 H 37.584229 Z', '55.94376557808108,37.76934344973757'],
            '164' => ['m 138.06452,588.56392 v 93.06571 h -6.1362 v 16.3632 H 38.095579 V 588.56392 Z', '55.94382879763283,37.76935954299165'],
            '165' => ['M 38.095579,465.07288 H 138.32019 v 21.4767 h -7.67025 v 23.26643 h 7.67025 v 74.40143 H 37.584229 Z', '55.943904058868874,37.76937295403672'],
            '166' => ['m 137.80884,346.95102 v 68.5209 h -7.41457 v 26.07886 h 7.67025 v 19.68697 H 38.095579 V 346.69534 Z', '55.944013435219,37.769351496364614'],
            '167' => ['m 37.839904,170.0239 h 93.832736 v 45.76583 2.0454 h 6.1362 V 343.11589 H 37.839904 Z', '55.94414137862031,37.76937563624573'],
            '168' => ['M 280.73118,57.782557 V 2.5567503 H 38.095579 V 166.18877 h 92.298691 v -16.10753 h 7.1589 v -47.55555 h 5.1135 v 9.45997 h 27.10155 V 57.271207 Z', '55.94423771219529,37.76940245833589'],
            '169' => ['m 281.49821,225.2497 h -63.66308 v -2.30107 h -36.30586 l 0.60952,2.27477 h -8.02409 v -56.47788 h 6.64755 v -19.94265 h -6.90323 V 61.362007 h 107.63919 z', '55.94425577471378,37.76950974669649'],
            '170' => ['M 281.24253,392.46117 H 181.01792 V 343.62724 H 174.1147 V 228.3178 h 107.12783 z', '55.944171482888336,37.76950974669649'],
        ];
        $viewBox = '';
        $idFloor = 17; // id первого этажа из бд
        for ($i = 2; $i < 15; $i++){
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