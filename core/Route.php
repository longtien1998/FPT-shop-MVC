<?php

namespace core;

class Route
{
    private array $routes; // danh sách tất cả router
    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action; // routes['get']['home'] = [homeController::class, 'index']; routes['post']['studentCreate'] = [];
        return $this;
    }
    public function get(string $route, callable|array $action) // get('home', [homeController::class, 'index'])
    {
        return $this->register('get', $route, $action); //register('get', 'home', [homeController::class, 'index'])
    }
    public function post(string $route, callable|array $action)
    {
        return $this->register('post', $route, $action);
    }
    // Xử lý các request thông qua routes
    public function resolve(string $requestUrl, string $requestMethod)
    {
        session_start();
        $arr = explode("?", $requestUrl); // url của mình là 1 chuỗi string . Cú pháp : index.php?tên router. Ví dụ: index.php?home. Hàm explode trả về mảng từ 1 string
        // nếu có sẽ là $arr[0] = trước dấu ? và $arr[1] = sau dấu hỏi
        if(count($arr) > 1) {
            if(str_contains($requestUrl, "&")) { // kiểm tra "&" có trong chuổi url k
                $param = explode("&", $arr[1])[1]; //sau dấu &
                $route = explode("&", $arr[1])[0]; // trước dấu &
            } else {
                $route = $arr[1];
            }
        } else {
            if(str_contains($requestUrl, 'admin')){
                
                if(isset($_SESSION['email-admin'])){
                    $route = 'dashboard';
                } else {
                    $route = 'login';
                }
            } else {
                $route = 'home'; //// kiểm tra "admin" có trong chuổi url k
            }
        }
        $action = $this->routes[$requestMethod][$route] ?? null; // routes['get']['home']
        if (is_null($action)) {
            new RouteNotFoundException();
        }
        if (is_array($action)) { // Routes[get][cartdestroy] =[get][cartController::class, 'destroy']
            [$class, $method] = $action; // [$class, $method] = [homeController::class, 'index'];
            if (class_exists($class)) {
                $class = new $class(); // $class = new homeController();
                if (method_exists($class, $method)) {
                    // return $class->$method();
                    return (isset($param) ? call_user_func_array([$class, $method], [$param]) : call_user_func_array([$class, $method], [])); // callable
                }
            }
        }
    }
}
