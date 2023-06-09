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

    protected $projectData;
    protected $projectGlobalInfo;

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

        $this->id_project = $_GET['id_project']; // Кнопка назад из этажей отправляет на несуществующий контроллер


        $this->projectGlobalInfo = $this->model->read('projects', [
            'fields' => ['id', 'project_img', 'title'],
            'where' => ['project_number' => $this->id_project]
        ])[0];


        $this->projectData = $this->model->read('houses', [
            'fields' => ['id as houses_id_db', 'id_project', 'house_number', 'title', 'address', 'coordinates', 'area_coordinates', 'polygon_points', 'section_img'],
            'where' => ['id_project' => $this->projectGlobalInfo['id']],
        ]);


        foreach ($this->projectData as $key => $house){
            $this->projectData[$key]['polygon_points'] = json_decode(json_encode(json_decode($house['polygon_points'])), true);
            $this->projectData[$key]['sections'] = $this->model->read('sections', [
               'fields' => ['id as section_db_id', 'id_house', 'section_number', 'polygon_points'],
                'where' => ['id_house' => $house['houses_id_db']]
            ]);
        }


        foreach ($this->projectData as $key => $house){
            foreach ($house['sections'] as $sectionKey => $section){
                $this->projectData[$key]['sections'][$sectionKey]['polygon_points'] = json_decode(json_encode(json_decode($section['polygon_points'])), true);
            }
        }

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . "/templates/default/project");
    }

}