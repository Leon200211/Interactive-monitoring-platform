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

    protected int $id_project;
    protected string $fileName;

    protected array $projectData;

    /**
     * Формирование данных
     */
    public function index()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }

        // метод для проверки доступа
        //$this->allAccessCheck();


        $this->id_project = $_GET['id_project'];
        switch ($this->id_project)
        {
            case 100:
                $this->fileName = 'mytishi';
                break;
            case 101:
                $this->fileName = '';
                break;
            case 102:
                $this->fileName = 'rublyovka';
                break;
        }

        $idProjectInDB = $this->model->read('projects', [
           'fields' => ['id'],
            'where' => ['project_number' => $this->id_project]
        ])[0]['id'];

        $projectData = $this->model->read('houses', [
            'fields' => ['id as houses_id_db', 'id_project', 'house_number', 'title', 'address', 'coordinates', 'area_coordinates'],
            'where' => ['id_project' => $idProjectInDB],
        ]);

//        foreach ($projectData as $house){
//            $this->projectData['houses_id_db'] = [
//
//            ];
//        }
//
//        exit();

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . "/templates/default/$this->fileName");
    }

}