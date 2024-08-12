<?php

namespace src\controllers;

class homeController extends baseController
{
    public function __construct()
    {
        $this->folder = null;
    }
    public function index()
    {
        return $this->render("home");
    }
}
