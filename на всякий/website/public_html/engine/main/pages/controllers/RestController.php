<?php


namespace engine\main\pages\controllers;


use engine\base\controllers\BaseController;
use engine\base\exceptions\DbException;
use engine\main\authentication\controllers\AccessRightsController;
use engine\main\authentication\models\MainModel;


class RestController extends BaseController
{
    private $result;
    private $db;

    public function index ()
    {

        header('Content-Type:text/html;charset=utf-8'); // в какой кодировки пользователь обрабатывает данные (первый заголовок)
        mb_internal_encoding("UTF-8");

        if(!$this->model) $this->model = MainModel::getInstance();
        if(!$this->accessRightsChecker) $this->accessRightsChecker = AccessRightsController::getInstance();


        $data = $_REQUEST['sql'];


        // подключение к БД
        $this->db = @new \mysqli(HOST, USER, PASS, DB_NAME);
        $this->db->query("SET NAMES UTF8");
        // отлов и логирование ошибок
        if($this->db->connect_error){
            throw new DbException("Ошибка подключение к БД: " .
                $this->db->connect_errno . " " . $this->db->connect_error);
        }

        $this->result = $this->my_query($data);


        echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
    }

    public function my_query($query, $crud = 'r', $return_id = false){

        $result = $this->db->query($query);

        if($this->db->affected_rows === -1){
            throw new DbException("Ошибка в SQL запросе: $query - {$this->db->errno} {$this->db->error}");
        }

        switch ($crud){

            case 'r':
                if($result->num_rows){
                    $res = [];

                    for($i = 0; $i < $result->num_rows; $i++){
                        $res[] = $result->fetch_assoc();
                    }

                    return $res;
                }
                return false;
                break;

            case 'c':

                if($return_id){
                    // вернуть id вставленного элемента
                    return $this->db->insert_id;
                }
                return true;
                break;

            default:
                return true;
                break;


        }
    }

    public function outputData()
    {
        echo json_encode($this->result);
    }

}