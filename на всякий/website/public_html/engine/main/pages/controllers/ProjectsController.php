<?php


namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;

/**
 * Класс для работы со страницей проектов
 *
 * Class ProjectsController
 * @package engine\main\pages\controllers
 */
class ProjectsController extends BaseController
{

    protected $projects = [];

    public function index()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }

        // метод для проверки доступа
        //$this->allAccessCheck();

        $this->projects = $this->model->read('projects');

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/zk-cards');
    }


}