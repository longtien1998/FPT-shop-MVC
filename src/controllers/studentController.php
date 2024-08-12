<?php

namespace src\controllers;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use src\models\student;

class studentController extends baseController
{
    
    public function __construct()
    {
        $this->folder = 'students';
    }
    public function index()
    {
        $data = ['students' => student::getAllStudents()];
        return $this->render('index', $data);
    }
    public function create()
    {
        return $this->render('create');
    }
    public function insert()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $point = $_POST['point'];
        $student = new student($id, $name, $point);
        if (student::Create($student)) {
            header('Location: index.php?students');
        } else {
            return "Thêm mới thất bại!";
        }
    }
}