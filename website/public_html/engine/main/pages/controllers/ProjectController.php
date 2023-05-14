<?php


namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;

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
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }

        // метод для проверки доступа
        //$this->allAccessCheck();
    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/rublyovka');
    }

}