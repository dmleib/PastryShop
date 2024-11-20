<?php
/**
 * Author: Deirdre Leib
 * Date: 11/15/24
 * File: dispatcher.class.php
 * Description:
 */
class Dispatcher
{
    public function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($uri, '/'));

        // Parse controller and method
        $controllerName = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'WelcomeController';
        $methodName = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        // Include the controller file and instantiate the controller
        $controllerClass = "PastryShop\\Controllers\\$controllerName";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                http_response_code(404);
                echo "Method $methodName not found!";
            }
        } else {
            http_response_code(404);
            echo "Controller $controllerName not found!";
        }
    }
}
