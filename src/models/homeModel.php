<?php

namespace src\models;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use core\Database;

class homeModel
{
    private $Id;
    private $Name;
    private $Point;
    // get set
    public function setId($id)
    {
        $this->Id = $id;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function setName($name)
    {
        $this->Name = $name;
    }
    public function getName()
    {
        return $this->Name;
    }
    public function setPoint($point)
    {
        $this->Point = $point;
    }
    public function getPoint()
    {
        return $this->Point;
    }
    public function __construct($id, $name, $point)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Point = $point;
    }
    // GetAllStudent
    public static function getAllStudents()
    {
        $db = new Database();
        return $db->pdo->query('select * from students')->fetchAll();
    }
    public static function getStudentById($id)
    {
        $db = new Database();
        return $db->pdo->query("select * from students where Id = '$id'")->fetch();
    }
    public static function Create($student)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare('INSERT INTO students VALUES (?, ?, ?)');
        try {
            return $stmt->execute([$student->getId(), $student->getName(), $student->getPoint()]); // Trả về boolean
        } catch (\Exception $ex) {
            throw new \Exception("Create Fail!");
        }
    }
    public static function Update($student)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare('UPDATE students SET Name=?, Point=? WHERE Id=? ');
        try {
            return $stmt->execute([$student->getName(), $student->getPoint(), $student->getId()]); // Trả về boolean
        } catch (\Exception $ex) {
            throw new \Exception("Update Fail!");
        }
    }
    public static function Delete($id)
    {
        $db = new Database();
        try {
            return $db->pdo->query("delete from students where Id = '$id'")->execute();
        } catch (\Exception $ex) {
            throw new \Exception("Delete Fail!");
        }
    }
}
