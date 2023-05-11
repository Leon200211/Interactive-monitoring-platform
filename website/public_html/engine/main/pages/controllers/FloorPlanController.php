<?php

namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;


/**
 * класс для работы со страницей этажей
 */
class FloorPlanController extends BaseController
{
    public function index ()
    {
        // метод для проверки доступа
        //$this->allAccessCheck();

        // получаем данные по заказам
        //$this->createData();
    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/floor_plan');
    }

}