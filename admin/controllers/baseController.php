<?php

namespace admin\controllers;

abstract class baseController
{
    protected $folder;
    function render($viewName, $data = array())
    {
        $view_file = str_replace('controllers', '', __DIR__) . 'views/' . ((!is_null($this->folder)) ? ($this->folder . '/' . $viewName . '.php') : ($viewName . '.php'));
        if (is_file($view_file)) {
            ob_start();
            if (!is_null($data)) {
                extract($data);
            }
            include $view_file;
            $output = ob_get_contents();
            ob_end_clean();
            echo $output;
        } else {
            $this->errer500();
        }

    }
    abstract function index();
    // abstract function create();
    // abstract function insert();
    // abstract function update($id);
    // abstract function modify();
    // abstract function delete($id);
    function errer500(){
        $view_file = str_replace('controllers', '', __DIR__) . 'views/' . '500.php';
        if (is_file($view_file)) {
            ob_start();
            include $view_file;
            $output = ob_get_contents();
            ob_end_clean();
            echo $output;
        }
    }
}
