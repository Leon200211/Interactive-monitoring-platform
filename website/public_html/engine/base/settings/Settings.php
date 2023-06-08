<?php


namespace engine\base\settings;


use engine\base\controllers\Singleton;


/**
 * Class Settings класс настроек
 * @package engine\base\settings
 */
class Settings
{

    use Singleton;

    // геттер для получения данных
    static public function get($property){
        return self::getInstance()->$property;
    }


    // настройки пути
    private $routes = [

        '/404' => [
            'controller' => 'exceptionalPages',
            'controllerPath' => '\engine\base\controllers\\',
            'action' => 'page404',
        ],

        '/' => [
            'controller' => 'main',
            'controllerPath' => '\engine\main\authentication\controllers\\',
            'action' => 'index',
        ],
        '/login' => [
            'controller' => 'authorization',
            'controllerPath' => '\engine\main\authentication\controllers\\',
            'action' => 'index'
        ],

        '/projects' => [
            'controller' => 'Projects',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],

        '/project' => [
            'controller' => 'Project',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],
        '/home/floor' => [
            'controller' => 'FloorPlan',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],
        '/home/apartment/update' => [
            'controller' => 'FloorPlan',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'updateData'
        ],


        '/test' => [
            'controller' => 'Test',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],
        '/rest' => [
            'controller' => 'Rest',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],
        '/home/report' => [
            'controller' => 'Report',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ],

        '/upload/file' => [
            'controller' => 'UploadFile',
            'controllerPath' => '\engine\main\pages\controllers\\',
            'action' => 'index'
        ]



    ];


}