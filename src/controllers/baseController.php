<?php

namespace src\controllers;

abstract class baseController
{
    protected $folder;
    function render($viewName, $data = array())
    {
        // Kiểm tra file gọi đến có tồn tại hay không?
        $view_file = str_replace('controllers', '', __DIR__) . 'views/' . ((!is_null($this->folder)) ? ($this->folder . '/' . $viewName . '.php') : ($viewName . '.php'));
        if (is_file($view_file)) {
            // if (!is_null($data)) {
            //     extract($data);
            //     require_once($view_file);
            // } else {
            //     require_once($view_file);
            // }

            ob_start();
            if (!is_null($data)) {
              extract($data);
            }
            // include 
            include $view_file;
            $output = ob_get_contents();
            ob_end_clean();
            echo $output;
        }
    }
    abstract function index();
}
