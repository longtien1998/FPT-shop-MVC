<?php

namespace admin\controllers;

class dashboardController extends baseController
{
    public function __construct()
    {
        $this->folder = null;
    }
    public function index()
    {
        return $this->render("dashboard");
    }
    public function create()
    {
    }
    public function insert()
    {
    }
    public function update($id)
    {
    }
    public function modify()
    {
    }
    public function delete($id)
    {
    }
}
