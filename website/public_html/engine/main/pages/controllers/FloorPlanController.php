<?php

namespace engine\main\pages\controllers;


use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;
use mysqli_sql_exception;


/**
 * класс для работы со страницей этажей
 */
class FloorPlanController extends BaseController
{
    protected $sectionData;
    protected $id_section;
    protected $floor_number;
    protected $floor_count;
    protected $section_img;
    protected $viewBox;

    public function index ()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();



        if(!$this->accessRightsChecker->isAutorized()){
            $this->redirect('/login');
        }



        $this->id_section = $_GET['id_section'];
        $this->floor_number = isset($_GET['floor']) ? $_GET['floor'] : 2;

        $this->sectionData = $this->model->read('floors', [
            'fields' => ['id as id_floor', 'id_section', 'floor_number', 'floor_plan_img'],
            'where' => ['id_section' => $this->id_section, 'floor_number' => $this->floor_number],
            'join' => [
                [
                    'table' => 'apartments',
                    'fields' => ['id as id_apartments', 'id_floor as apartments_id_floor', 'apartment_number',
                                 'polygon_points', 'viewBox', 'coordinates',
                                'sockets',
                                'switches',
                                'toilet',
                                'sink',
                                'bath',
                                'floor_finishing',
                                'draft_floor_department',
                                'ceiling_finishing',
                                'draft_ceiling_finish',
                                'wall_finishing',
                                'draft_wall_finish',
                                'windowsill',
                                'slopes',
                                'doors',
                                'wall_plaster',
                                'trash',
                                'radiator',
                        ],
                    'type' => 'inner',
                    'on' => ['id', 'id_floor']
                ]
            ]
        ]);


        $this->floor_count = count($this->model->read('floors', [
            'fields' => ['id'],
            'where' => ['id_section' => $this->id_section],
        ]));

        $this->section_img = $this->sectionData[0]['floor_plan_img'];
        $this->viewBox = $this->sectionData[0]['viewBox'];

    }

    public function outputData()
    {
        return $this->render($_SERVER['DOCUMENT_ROOT'] . '/templates/default/floor_plan');
    }


    /**
     * @return void
     */
    public function updateData()
    {
        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();


        $id_apartment = $_POST['id_apartment'];
        $id_section = $_POST['id_section'];
        $floor = !empty($_POST['floor']) ? $_POST['floor'] : 2;


        // Начало транзакции
        mysqli_begin_transaction($this->model->getDbConnection());
        try {

            // Обновляем данные
            $this->model->update('apartments', [
               'fields' => [
                   'sockets' => $_POST['sockets'],
                   'switches' => $_POST['switches'],
                   'toilet' => isset($_POST['toilet']) ? 1 : 0,
                   'sink' => $_POST['sink'],
                   'bath' => isset($_POST['bath']) ? 1 : 0,
                   'floor_finishing' => $_POST['floor_finishing'],
                   'draft_floor_department' => $_POST['draft_floor_department'],
                   'ceiling_finishing' => $_POST['ceiling_finishing'],
                   'draft_ceiling_finish' => $_POST['draft_ceiling_finish'],
                   'wall_finishing' => $_POST['wall_finishing'],
                   'draft_wall_finish' => $_POST['draft_wall_finish'],
                   'windowsill' => $_POST['windowsill'],
                   'kitchen' => isset($_POST['kitchen']) ? 1 : 0,
                   'slopes' =>$_POST['slopes'],
                   'doors' => $_POST['doors'],
                   'wall_plaster' =>$_POST['wall_plaster'],
                   'trash' => isset($_POST['trash']) ? 1 : 0,
                   'radiator' => $_POST['radiator'],
               ],
                'where' => [
                    'id' => $id_apartment
                ]
            ]);

            // Если код достигает этой точки без ошибок, фиксируем данные в базе данных.
            mysqli_commit($this->model->getDbConnection());

            // Добавляем уведомление

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($this->model->getDbConnection());

            throw $exception;
        }

        $this->redirect("/home/floor?id_section=$id_section&floor=$floor");

    }

}