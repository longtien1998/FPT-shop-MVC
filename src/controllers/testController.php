<?php

namespace src\controllers;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
    echo $class;
});

use src\models\testModel;
class testController extends baseController
{
    public function __construct()
    {
        session_start();
        $this->folder = null;
    }
    public function index()
    {
        return $this->render("test",["user"=>testModel::getbyall()]);
    }
    public function test(){
        $email = $_POST["email"];
        echo $email;
    }
}