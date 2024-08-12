<?php
namespace core;
class RouteNotFoundException {
    public function __construct() {
        include '404.php';
    }
}
