<?php
namespace core;
class Database {
    public $pdo;
    private $DATABASE_HOST = 'localhost';
    private $DATABASE_USER = 'root';
    private $DATABASE_PASS = 'root';
    private $DATABASE_NAME = 'fpt_shop';
    public function __construct() {
        try {
            $this->pdo = new \PDO('mysql:host=' . $this->DATABASE_HOST . ';dbname=' . $this->DATABASE_NAME . ';charset=utf8', $this->DATABASE_USER, $this->DATABASE_PASS);
        } catch(\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
