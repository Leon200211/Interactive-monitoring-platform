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
    protected $veiwBox;

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
        $this->veiwBox = $this->sectionData[0]['viewBox'];

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
                   'sockets' => isset($_POST['sockets']) ? 1 : 0,
                   'switches' => isset($_POST['switches']) ? 1 : 0,
                   'toilet' => isset($_POST['toilet']) ? 1 : 0,
                   'sink' => isset($_POST['sink']) ? 1 : 0,
                   'bath' => isset($_POST['bath']) ? 1 : 0,
                   'floor_finishing' => isset($_POST['floor_finishing']) ? 1 : 0,
                   'draft_floor_department' => isset($_POST['draft_floor_department']) ? 1 : 0,
                   'ceiling_finishing' => isset($_POST['ceiling_finishing']) ? 1 : 0,
                   'draft_ceiling_finish' => isset($_POST['draft_ceiling_finish']) ? 1 : 0,
                   'wall_finishing' => isset($_POST['wall_finishing']) ? 1 : 0,
                   'draft_wall_finish' => isset($_POST['draft_wall_finish']) ? 1 : 0,
                   'windowsill' => isset($_POST['windowsill']) ? 1 : 0,
                   'slopes' => isset($_POST['slopes']) ? 1 : 0,
                   'doors' => isset($_POST['doors']) ? 1 : 0,
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