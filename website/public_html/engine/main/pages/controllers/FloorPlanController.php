<?php

namespace engine\main\pages\controllers;

use engine\base\controllers\BaseController;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;


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

}