<?php


namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;

/**
 * Класс для работы со страницей проекта
 *
 * Class ProjectController
 * @package engine\main\pages\controllers
 */
class ProjectController extends BaseController
{

    public function index()
    {
        // метод для проверки доступа
        //$this->allAccessCheck();

        // получаем данные по заказам
        //$this->createData();
    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/zk-cards');
    }

}